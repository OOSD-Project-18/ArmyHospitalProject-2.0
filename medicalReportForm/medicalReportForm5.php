<?php
include_once "../includes/class-autoload.inc.php";
require_once '../includes/initFromPatients.php';
$user=new User();
if(!$user->isLoggedIn()){
    Redirect::to('../index.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Medical Report </title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/medicalReport.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </head>
  <body>
  <?php include('_header.med.php') ?>
    <main  id=main>
        <?php include('_sideNav.med.php') ?>
    <div class="container py-4">  
    <div class="medical-report">
      <h1>Medical Report</h1>
      <form action="includes/form5.inc.php" method="post">
        <div class="section"><span>6</span>Eyes</div>
        <div class="inner-wrap">
          <table class='table'>
            <tr>
              <th></th> <th>Right</th><th>Left</th><th>CP</th>
            </tr>
            <tr><th>Without Glasses</th><td> <input type="text" name="right"></td><td> <input type="text" name="left"></td><td> <input type="text" name="CP"></td>

            <tr><td><input type="text" name="emptyHeading"></td><td><input type="text" name="emptyRight"></td><td> <input type="text" name="emptyLeft"></td><td> <input type="text" name="emptyCP"></td></tr>
          </table><br><br>

          <label>Diseases, etc : </label><textarea rows = "5" cols = "60" name = "diseases"></textarea><br><br>

          <label>Effect on P. if any : </label><input id='short' type="text" name="effect"><br><br>

          <br>
          <div class="button-section">
            <button type="submit" name="next">Next</button>
          </div>
        </div>
      </form>
    </div>
</div>
</main>
  </body>
</html>
