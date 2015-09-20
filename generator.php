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
  $numbers = 2;
  $chars = 2;
  $seperator = '-';
  $case = 'camelcase';

  # check box settings
  $numCheck = '';
  $charCheck = '';

  # random character array
  $randomChars = ['~','!','@','$','%','^','&','*','(',')','+','=','{','}','[',']','|',':',';','<','>','?'];

  # load and unserialize wordlist from file
  $words = file_get_contents('wordlist.txt');
  $words = unserialize($words);

  # the POST has taken place
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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

    $case = $_POST['case'];
    $seperator = $_POST['seperator'];
    

    if (isset($_POST['addNumber'])) {
      $numbers = $_POST['numbers'];
      $number = '';
      for ($i = 0; $i < $numbers; $i++) { 
        $number = (string)rand(0,9) . $number;
      }
      $password = $number . $seperator;
      $numCheck = 'checked';
    }
    
    # generate the word portion of the password
    # pick for words at random from the list
    for ($i = 0; $i < $numberOfWords; $i++) { 
      do {
        $index = rand(0,count($words) - 1);
        # if the word does fall between the min and max lengths pick a new one
      } while (!(strlen($words[$index]) >= $minLength AND strlen($words[$index]) <= $maxLength));

      # concatenate add word to password
      $word = setCase($words[$index], $i);

      $password = $password . $word;

      if ($i < $numberOfWords - 1) {
        $password = $password . $seperator;
      }
    }

    if (isset($_POST['addChar'])) {
      $chars = $_POST['chars'];
      $char = '';
      for ($i = 0; $i < $chars; $i++) { 
        $char = $randomChars[rand(0,count($randomChars)-1)] . $char;
      }
      $password = $password . $seperator . $char;
      $charCheck = 'checked';
    }
  }

  # functions 
  function setCase($word, $wordNumber) {
    if ($GLOBALS['case'] == 'lowercase') {
      return strtolower($word);
    } elseif ($GLOBALS['case'] == 'camelcase') {
      $word = strtolower($word);
      if ($wordNumber > 0) {
        $word = ucfirst($word);
      }
      return $word;
    } else {
      return strtoupper($word);
    }
  }
 
?>