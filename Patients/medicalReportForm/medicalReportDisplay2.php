<?php
  session_start();
  include_once "classes/hospitalTreatments.class.php"
?>
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
      <div class="section"><span>4</span>Treatments at a Hospital</div>
      <div class="inner-wrap">
        <div class="table">
          <?php
            $results = $_SESSION['results'];

            $serializedHospitalTreatments = $results[0]['serializedHospitalTreatments'];

            $hospitalTreatmentsObject = unserialize($serializedHospitalTreatments);

            $nature = $hospitalTreatmentsObject->getNature();
            $hospital = $hospitalTreatmentsObject->getHospital();
            $inout = $hospitalTreatmentsObject->getInout();
            $dates = $hospitalTreatmentsObject->getDates();

            $numOfRows = count($nature);

            echo "<table>";

            echo "<tr>
              <th>Nature of Illness, Operation or Injury</th><th>Name of Hospital</th><th>In or Out Patient</th><th>Approx.Dates and Period</th>
            </tr>";

            $index = 0;
            while ($index < $numOfRows){
              echo "<tr><td>".$nature[$index]."</td><td>".$hospital[$index]."</td><td>".$inout[$index]."</td><td>".$dates[$index]."</td></tr>";
              $index++;
            }

            echo "</table>";
           ?>
        </div>
      </div>

      <form action="medicalReportDisplay3.php" method="post">
        <div class="button-section">
          <button type="submit" name="next">Next</button>
        </div>
      </form>
    </div>
  </body>
</html>
