<?php
  session_start();
  include_once "classes/upperlimbslocomotion.class.php";
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

      $serializedUpperLimbsLocomotion = $results[0]['serializedUpperLimbsLocomotion'];

      $upperLimbsLocomotionObject = unserialize($serializedUpperLimbsLocomotion);

      $upperLimbs = $upperLimbsLocomotionObject->getUpperLimbs();
      $u = $upperLimbsLocomotionObject->getU();
      $effectUpperLimbs = $upperLimbsLocomotionObject->getEffectUpperLimbs();
      $locomotion = $upperLimbsLocomotionObject->getLocomotion();
      $l = $upperLimbsLocomotionObject->getL();
      $effectLocomotion = $upperLimbsLocomotionObject->getEffectLocomotion();

     ?>

     <div class="medical-report">
       <h1>Medical Report</h1><br>

       <form action="medicalReportDisplay8.php" method="post">
         <div class="section"><span>8</span>Upper Limbs and Locomotor System</div><br>

         <div class="inner-wrap">
           <label>Upper Limbs (finger, hands, wrists, elbows, shoulder girdles, cervical and dorsal vertebrae) : </label>
           <?php echo $upperLimbs; ?><br><br>
           <table class='table'>
           <tr><th> U </th> </tr>
           <tr><td> <?php echo $u; ?></td></tr>
           </table><br>
            <label>Effect on P. if any : </label> <?php echo $effectUpperLimbs; ?><br><br>

           <label>Locomotion (Hahax valgus/rigidus, flat feet, joints, pelvis, lumbar and sacral vertebrae, coccys, varicose veins) : </label>
           <?php echo $locomotion; ?><br><br>
           <table class='table'>
           <tr><th> L </th> </tr>
           <tr><td> <?php echo $l; ?></td></tr>
           </table><br>
           <label> Effect on P. if any : </label><?php echo $effectLocomotion; ?><br>

           <br><br>

           <div class="button-section">
             <button type="submit" name="next">Next</button>
           </div>

         </div>
       </form>
     </div>

  </body>
</html>
