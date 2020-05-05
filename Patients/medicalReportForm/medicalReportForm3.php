<?php
include_once "../includes/class-autoload.inc.php";
require_once '../includes/initFromPatients.php';
$user=new User();
if(!$user->isLoggedIn()){
    Redirect::to('../index.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Medical Report</title>
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
      <h1>Medical Report</h1><br><br>
      <div class="section"><span>5</span>Other Medical Treatments at Home or in a Nursing Home</div>
      <div class="inner-wrap">
        <form action="medicalReportForm3.php" method="post">
          <label>Enter number of rows needed :</label> <input type="number" name="rows"><br><br>
          <div class="button-section">
            <button type="submit" name="next">Enter</button>
          </div>
        </form>

        <br><br>

        <form action="includes/form3.inc.php" method="post">
          <div class="table">
          <div style="overflow-x:scroll;">
            <?php
              echo "<table>";

              if (isset($_POST['rows'])){
                echo "<tr>
                    <th>Nature of Illness, Operation or Injury</th><th>Name and Address of Doctor or Nursing Home</th><th>Approx. Date and Period</th>
                  </tr>";

                  $rows = $_POST['rows'];
                  while ($rows>0){
                    echo "<tr><td><textarea rows = '1' cols = '50' name = 'nature[]'></textarea></td><td><textarea rows = '1' cols = '60' name = 'nameAndAddress[]'></textarea></td><td><textarea rows = '1' cols = '50' name = 'datePeriod[]'></textarea></td></tr>";
                    $rows--;
                  }



                echo "</table>";
                echo "<br><br></div><label>Any other information you wish to give about your health : </label><textarea rows = '5' cols = '50' name = 'otherInfo'></textarea><br><br>";
                echo '<div class="button-section">
                  <button type="submit" name="next">Next</button>
                </div>';
              }
            ?>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
