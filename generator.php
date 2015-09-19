<?php
  $password='';

  $words = file_get_contents('wordlist.txt');
  $words = unserialize($words);

  # pick for words at random from the list
  for ($i=1; $i <= 4 ; $i++) { 
    $index = rand(0,count($words));
    $password = $password . $words[$index];
    
    # do not add a hyphen after last word
    if ($i < 4) {  
    $password = $password . '-';;
    }
  }
?>