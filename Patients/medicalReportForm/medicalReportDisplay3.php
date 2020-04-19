<?php
  session_start();
  include_once "classes/otherMedicalTreatments.class.php";
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
      <div class="section"><span>5</span>Other Medical Treatments at Home or in a Nursing Home</div>
      <?php
        $results = $_SESSION['results'];

        $serializedOtherMedicalTreatments = $results[0]['serializedOtherMedicalTreatments'];
        $otherMedicalTreatmentsObject = unserialize($serializedOtherMedicalTreatments);

        $nature = $otherMedicalTreatmentsObject->getNature();
        $nameAndAddress = $otherMedicalTreatmentsObject->getNameAndAddress();
        $datePeriod = $otherMedicalTreatmentsObject->getDatePeriod();
      ?>

      <div class="inner-wrap">
        <div class="table">
          <?php

            echo "<table>";

            echo "<tr>
                <th>Nature of Illness, Operation or Injury</th><th>Name and Address of Doctor or Nursing Home</th><th>Approx. Date and Period</th>
              </tr>";

            $rows = count($nature);
            $index = 0;
            while ($index < $rows){
              echo "<tr><td>".$nature[$index]."</td><td>".$nameAndAddress[$index]."</td><td>".$datePeriod[$index]."</td></tr>";
              $index++;
            }

            echo "</table>";
            echo "<br><br></div><label>Any other information you wish to give about your health : </label>".$results[0]['otherInfo']."<br><br>";

            $summary = $results[0]['summary'];

            echo "<br><br><label>Medical Examiner's Summary of important points in 3 and 4 above with comments and additional information of significance : </label>
                  ".$summary."<br><br>";
           ?>

           <form action="medicalReportDisplay5.php" method="post">
             <div class="button-section">
               <button type="submit" name="next">Next</button>
             </div>
           </form>
        </div>
      </div>
    </div>
  </body>
</html>
