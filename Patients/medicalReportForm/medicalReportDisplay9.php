<?php
  session_start();
  include_once "classes/mentalCapacity.class.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Medical Report</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/medicalReport.css">
  </head>
  <body>
    <?php
      $results = $_SESSION['results'];

      $serializedMentalCapacity = $results[0]['serializedMentalCapacity'];

      $mentalCapacityObject = unserialize($serializedMentalCapacity);

      $speech = $mentalCapacityObject->getSpeech();
      $mentalBackwardness = $mentalCapacityObject->getMentalBackwardness();
      $emotionalInstability = $mentalCapacityObject->getEmotionalInstability();
      $m = $mentalCapacityObject->getM();
      $s = $mentalCapacityObject->getS();
      $effect= $mentalCapacityObject->getEffect();

     ?>

     <div class="medical-report">
       <h1>Medical Report</h1><br>

       <form action="medicalReportDisplay10.php" method="post">
         <div class="section"><span>10</span>Mental Capacity and Emotional stability</div><br>
         <div class="inner-wrap">
           <div class="section"><span>a</span><p><b>Speech</b></p></div><br>
           <?php echo $speech; ?><br><br>

           <div class="section"><span>b</span><p><b>Evidence Suggesting</b></p></div><br>
           <label> Mental Backwardness :</label>
           <?php echo $mentalBackwardness; ?><br><br>
           <label> Emotional Instability :</label>
           <?php echo $emotionalInstability; ?><br><br>


           <table class='table'>
           <tr><th> M </th> <th> S </th> </tr>
           <tr><td> <?php echo $m; ?></td><td><?php echo $s; ?></td></tr>
           </table><br><br>
           <label> Effect on P. if any :</label><?php echo $effect; ?><br><br>

           <div class="button-section">
             <button type="submit" name="next">Next</button>
           </div>
         </div>
       </form>
     </div>
  </body>
</html>
