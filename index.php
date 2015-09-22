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
    <link href="css/custom.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php require('generator.php');?>
    <div class="container-fluid">
    <?php if(!$_POST): ?>
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
          <div class="panel" id="top">
            <h1>How secure is your password?</h1>
            <p>Your clever password may not be as secure as you think. See <a href="#example">the comic below</a> for more information. After that, you can use our free password generator to create an xkcd style password. The password is generated use a Google compiled list of 10,000 common English words. For added security, add a random number to the start, some random characters to the end, or switch up the seperator between words and the word case.</p>
          </div>
        </div>
        <div class="col-lg-3"></div>
      </div> <!-- end row -->
      <?php endif; ?>
      <?php if($_SERVER['REQUEST_METHOD'] == 'POST'): ?> <!-- row containing password only appears after form is submitted -->
      <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <div id="password">
            <p><?=$password?></p>
          </div>
        </div>
        <div class="col-lg-1"></div>
      </div> <!-- end row -->
      <?php endif; ?>
      <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4"><div class="well well-sm">
          <h2>Password Generator</h2>
          <h4>(invalid values will be replaced by defaults)</h4>
          <form action="index.php" method="POST">
            <div class="form-group">
              <label>Number of words (4-12):</label>
              <input type="text" name="numberOfWords" value=<?=$numberOfWords?>>
            </div>
            <div class="form-group">
              <label>Shortest words (min 4):</label>
              <input type="text" name="min" value=<?=$minLength?>>
            </div>
            <div class="form-group">
              <label>Longest words (max 12):</label>
              <input type="text" name="max" value=<?=$maxLength?>>
            </div>
            <div class="form-group">
              <input type="checkbox" name="addNumber" <?=$numCheck?>>
              <label for="addNumber">Random number
              <select name="numbers">
                <option value="1" <?php echo $numbers == '1' ? 'selected="selected"' : ''; ?>>1</option>
                <option value="2" <?php echo $numbers == '2' ? 'selected="selected"' : ''; ?>>2</option>
                <option value="3" <?php echo $numbers == '3' ? 'selected="selected"' : ''; ?>>3</option>
                <option value="4" <?php echo $numbers == '4' ? 'selected="selected"' : ''; ?>>4</option>
                <option value="5" <?php echo $numbers == '5' ? 'selected="selected"' : ''; ?>>5</option>
                <option value="6" <?php echo $numbers == '6' ? 'selected="selected"' : ''; ?>>6</option>
                <option value="7" <?php echo $numbers == '7' ? 'selected="selected"' : ''; ?>>7</option>
                <option value="8" <?php echo $numbers == '8' ? 'selected="selected"' : ''; ?>>8</option>
                <option value="9" <?php echo $numbers == '9' ? 'selected="selected"' : ''; ?>>9</option>
                <option value="10" <?php echo $numbers == '10' ? 'selected="selected"' : ''; ?>>10</option>
              </select>
              digits</label>
            </div>
            <div class="form-group">
              <input type="checkbox" name="addChar" <?=$charCheck?>>
              <label for="addChar">Random characters
              <select name="chars">
                <option value="1" <?php echo $chars == '1' ? 'selected="selected"' : ''; ?>>1</option>
                <option value="2" <?php echo $chars == '2' ? 'selected="selected"' : ''; ?>>2</option>
                <option value="3" <?php echo $chars == '3' ? 'selected="selected"' : ''; ?>>3</option>
                <option value="4" <?php echo $chars == '4' ? 'selected="selected"' : ''; ?>>4</option>
                <option value="5" <?php echo $chars == '5' ? 'selected="selected"' : ''; ?>>5</option>
                <option value="6" <?php echo $chars == '6' ? 'selected="selected"' : ''; ?>>6</option>
                <option value="7" <?php echo $chars == '7' ? 'selected="selected"' : ''; ?>>7</option>
                <option value="8" <?php echo $chars == '8' ? 'selected="selected"' : ''; ?>>8</option>
                <option value="9" <?php echo $chars == '9' ? 'selected="selected"' : ''; ?>>9</option>
                <option value="10" <?php echo $chars == '10' ? 'selected="selected"' : ''; ?>>10</option>
              </select>
              characters</label>
            </div>
            <div class="form-group">
              <label for="seperator">Chose a seperator:</label>
              <select name="seperator">
                <option value="" <?php echo $seperator == '' ? 'selected="selected"' : ''; ?>>(none) ''</option>
                <option value=" " <?php echo $seperator == ' ' ? 'selected="selected"' : ''; ?>>(space) ' '</option>
                <option value="-" <?php echo $seperator == '-' ? 'selected="selected"' : ''; ?>>hyphen '-'</option>
                <option value="." <?php echo $seperator == '.' ? 'selected="selected"' : ''; ?>>dot '.'</option>
              </select>
            </div>
            <div class="form-group">
              <label>What case would you like?</label><br>
              <label class="radio-inline">
                <input type="radio" name="case" value="lowercase" <?php echo $case == 'lowercase' ? 'checked' : ''; ?>>lowercase</label>
              <label class="radio-inline">
                <input type="radio" name="case" value="camelcase" <?php echo $case == 'camelcase' ? 'checked' : ''; ?>>camelCase</label>
              <label class="radio-inline">
                <input type="radio" name="case" value="uppercase" <?php echo $case == 'uppercase' ? 'checked' : ''; ?>>UPPERCASE</label>
            </div>
            <button class="btn btn-default center-block" type="submit"3>Generate Password</button>
          </form>
        </div></div>
        <div class="col-lg-4"></div>
      </div> <!-- end row -->
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
          <div id="example">
            <div class="comicheader">
              <h2><a href="https://xkcd.com/936/">xkcd comic</a></h2>
              <p><a href="#top">Return to top</a></p>
            </div>
            <img class="img-responsive comic" src="http://imgs.xkcd.com/comics/password_strength.png" alt="xkcd password comic">
          </div>
        </div>
      <div class="col-lg-3"></div>
      </div>
    </div> <!-- end container-fluid -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>