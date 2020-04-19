<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Medical Report</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../css/medicalReport2.css">
  </head>
  <body>
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
                echo "<br><br><label>Any other information you wish to give about your health : </label><textarea rows = '5' cols = '50' name = 'otherInfo'></textarea><br><br>";
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
