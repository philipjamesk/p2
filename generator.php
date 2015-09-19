<?php
  #set defaults 
  $password='';
  $numberOfWords = 8;
  $minLength = 4;
  $maxLength = 8;

  $words = file_get_contents('wordlist.txt');
  $words = unserialize($words);
  
  # the POST has taken place
  if ($_POST) {

    $numberOfWords = $_POST['numberOfWords'];
    $minLength = $_POST['min'];
    $maxLength = $_POST['max'];

    # pick for words at random from the list
    for ($i=1; $i <= $numberOfWords; $i++) { 
      do {
        $index = rand(0,count($words));
        # if the word does fall between the min and max lengths pick a new one
      } while (!(strlen($words[$index]) >= $minLength AND strlen($words[$index]) <= $maxLength));

      # concatenate add word to password
      $password = $password . $words[$index];
      
      # do not add a hyphen after last word
      if ($i < $numberOfWords) {  
      $password = $password . '-';
      }
    }
  }
?>