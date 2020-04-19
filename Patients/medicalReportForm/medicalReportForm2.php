<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Medical Report</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/medicalReport2.css">
  </head>
  <body>
    <div class="medical-report">
      <h1>Medical Report</h1><br><br>
      <div class="section"><span>4</span>Treatments at a Hospital</div>
      <div class="inner-wrap">
        <form action="medicalReportForm2.php" method="post">
          <label>Enter number of rows needed :</label> <input type="number" name="rows"><br><br>
          <div class="button-section">
            <button type="submit" name="next">Enter</button>
          </div>
        </form>
        <br><br>
        <form action="includes/form2.inc.php" method="post">
          <div class="table">
            <?php

              if (isset($_POST['rows'])){
                echo "<table>";

                echo "<tr>
                <th>Nature of Illness, Operation or Injury</th><th>Name of Hospital</th><th>In or Out Patient</th><th>Approx.Dates and Period</th>
                </tr>";

                $rows = $_POST['rows'];
                while ($rows>0){
                  echo "<tr><td><textarea rows = '1' cols = '50' name = 'nature[]'></textarea></td><td><textarea rows = '1' cols = '25' name = 'hospital[]'></textarea></td><td><textarea rows = '1' cols = '20' name = 'inout[]'></textarea></td><td><textarea rows = '1' cols = '30' name = 'dates[]'></textarea></td></tr>";
                  $rows--;
                }

                echo '</table><br><br>
                <div class="button-section">
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
