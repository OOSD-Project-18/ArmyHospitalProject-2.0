<?php
  session_start();
  include_once "classes/eyes.class.php";
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

      $serializedEyes = $results[0]['serializedEyes'];

      $eyes = unserialize($serializedEyes);

      $eyeTable = $eyes->getEyeTable();
      $diseases = $eyes->getDiseases();
      $effect = $eyes->getEffect();

     ?>

     <div class="medical-report">
       <h1>Medical Report</h1>
       <form action="includes/form5.inc.php" method="post">
         <div class="section"><span>6</span>Eyes</div>
         <div class="inner-wrap">
           <table class='table'>
             <tr>
               <th></th> <th>Right</th><th>Left</th><th>CP</th>
             </tr>
             <tr><th>Without Glasses</th><td><?php echo $eyeTable['right']; ?></td><td><?php echo $eyeTable['left']; ?></td><td><?php echo $eyeTable['CP']; ?></td>

             <tr><td><?php echo $eyeTable['emptyHeading']; ?></td><td><?php echo $eyeTable['emptyRight']; ?></td><td><?php echo $eyeTable['emptyLeft']; ?></td><td><?php echo $eyeTable['emptyCP']; ?></td></tr>
           </table><br><br>

           <label>Diseases, etc : </label><?php echo $diseases; ?><br><br>

           <label>Effect on P. if any : </label><?php echo $effect; ?><br><br>

           <br>
           <div class="button-section">
             <button type="submit" name="next">Next</button>
           </div>
         </div>
       </form>
     </div>
  </body>
</html>
