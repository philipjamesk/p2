<?php
  # The world began with 10000 common English word with American spellings
  # from here https://github.com/first20hours/google-10000-english/blob/master/google-10000-english-usa.txt

  $words = file('google-10000-english-usa.txt');

  echo "<p>Before cleaning the list now contains " . count($words) . " words.</p>";

  foreach ($words as $key => $value) {
    if (strlen($value) < 5 OR strlen($value) > 13) {
      # if the word is less than four or more than 12 letters remove it
      unset($words[$key]);
    } else {
      # otherwise remove trailing space from word
      $words[$key]=substr($words[$key], 0, -1);
    }
  }

  $words = array_values($words);
  
  echo "<p>After cleaning the list now contains " . count($words) . " words.</p>";
  
  $serializedWords = serialize($words);
  
  file_put_contents('wordlist.txt', print_r($serializedWords, true));