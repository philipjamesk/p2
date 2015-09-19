<?php
  # define constants
  define("DEFAULT_WORDS", "4");
  define("DEFAULT_MIN", "4");
  define("DEFAULT_MAX", "12");

  # set defaults 
  $password='';
  $numberOfWords = DEFAULT_WORDS;
  $minLength = DEFAULT_MIN;
  $maxLength = DEFAULT_MAX;

  # check box settings
  $numCheck = '';
  $charCheck = '';

  # random character array
  $randomChars = ['~','!','@','$','%','^','&','*','(',')','+','=','{','}','[',']','|',':',';','<','>','?'];

  # load and unserialize wordlist from file
  $words = file_get_contents('wordlist.txt');
  $words = unserialize($words);
  
  # the POST has taken place
  if ($_POST) {

    # check user entered values, if they are not valid the default stays
    if (is_numeric($_POST['numberOfWords']) AND ($_POST['numberOfWords'] >= 4 AND $_POST['numberOfWords'] <= 12)) {
      $numberOfWords = (int)$_POST['numberOfWords'];
    }

    if (is_numeric($_POST['min']) AND ($_POST['min'] >= DEFAULT_MIN AND $_POST['min'] <= DEFAULT_MAX)) {
      $minLength = (int)$_POST['min'];
    } 

    if (is_numeric($_POST['max']) AND ($_POST['max'] >= DEFAULT_MIN AND $_POST['max'] <= DEFAULT_MAX)) {
      $maxLength = (int)$_POST['max'];
    } 

    # if min is greater than max set them to equal
    if ($minLength > $maxLength) {
      $maxLength = $minLength;
    }

    # generate the word portion of the password
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

    if (isset($_POST['addNumber'])) {
      $password = (string)rand(0,9) . $password;
      $numCheck = 'checked';
    }

    if (isset($_POST['addChar'])) {
      $password = $password . $randomChars[rand(0,count($randomChars)-1)];
      $charCheck = 'checked';
    }

    // var_dump($_POST);
  }
?>