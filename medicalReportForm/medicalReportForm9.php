<?php
require_once '../core/initfromMedicalReport.php';

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
      <h1>Medical Report</h1><br>

      <form action="includes/form9.inc.php" method="post">
        <div class="section"><span>10</span>Mental Capacity and Emotional stability</div><br>
        <div class="inner-wrap">
          <div class="section"><span>a</span><p><b>Speech</b></p></div><br>
          <textarea rows = "10" cols = "60" name = "speech">
          </textarea><br><br>

          <div class="section"><span>b</span><p><b>Evidence Suggesting</b></p></div><br>
          <label> Mental Backwardness :</label>
          <textarea rows = "6" cols = "60" name = "mentalBackwardness">
          </textarea><br><br>
          <label> Emotional Instability :</label>
          <textarea rows = "6" cols = "60" name = "emotionalInstability">
          </textarea><br><br>


          <table class='table'>
          <tr><th> M </th> <th> S </th> </tr>
          <tr><td>  <input type="text" name="m"></td><td>  <input type="text" name="s"></td></tr>
          </table><br><br>
          <label> Effect on P. if any :</label><input type="text" name="effect"><br><br>

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
