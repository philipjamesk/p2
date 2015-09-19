<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>xkcd Password Generator</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php require('generator.php');?>
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <form action="index.php" method="POST">
          <label>Number of words (4-12): <input type="text" name="numberOfWords" value=<?=$numberOfWords?>></label><br>
          <label>Shortest words (min 4): <input type="text" name="min" value=<?=$minLength?>></label><br>
          <label>Longest words (max 12): <input type="text" name="max" value=<?=$maxLength?>></label><br>
          <input type="checkbox" name="addNumber" <?=$numCheck?>><label for="addNumber">Add a number </label><br>
          <input type="checkbox" name="addChar" <?=$charCheck?>><label for="addChar">Add a random character </label><br>
          <input type="submit" value="Generate Password">
        </form>
      </div>
      <div class="col-lg-2"></div>
    </div> <!-- end row -->

    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <div id="password">
          <p><?=$password?></p>
        </div>
      </div>
      <div class="col-lg-3"></div>
    </div> <!-- end row -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>