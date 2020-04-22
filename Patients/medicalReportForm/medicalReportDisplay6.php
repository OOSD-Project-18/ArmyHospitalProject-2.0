<?php
  session_start();
  include_once "classes/earsNoseThroat.class.php";
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

      $serializedEarsNoseThroat = $results[0]['serializedEarsNoseThroat'];

      $earsNoseThroatObject = unserialize($serializedEarsNoseThroat);

      $hearing = $earsNoseThroatObject->getHearing();
      $wax = $earsNoseThroatObject->getWax();
      $diseases = $earsNoseThroatObject->getDiseases();
      $h = $earsNoseThroatObject->getH();
      $effect = $earsNoseThroatObject->getEffect();
     ?>

     <div class="medical-report">
      <h1>Medical Report</h1><br>
        <div class="section"><span>7</span>Ears, Nose, Throat</div>
        <div class="inner-wrap">
          <label>Hearing : </label>
          <table class='table'>
            <tr> <th></th> <th>Hears F.W. at </th><th>Hears C.V. at </th> </tr>
            <tr><th>Right</th><td><?php echo $hearing['rfw']; ?></td><td><?php echo $hearing['rcv']; ?></td></tr>
            <tr><th>Left</th><td> <?php echo $hearing['lfw']; ?></td><td><?php echo $hearing['lcv']; ?></td></tr>
            <tr><th>Both</th><td> <?php echo $hearing['bothfw']; ?></td><td><?php echo $hearing['bothcv']; ?></td></tr>

          </table>
          <br>
          <label>Wax : </label>
          <table class='table'>

            <tr> <th></th> <th>Present </th><th>Removed</th> </tr>

            <tr><th>Right</th><td><?php echo $wax['rpresent']; ?></td><td><?php echo $wax['rremoved']; ?></td></tr>
            <tr><th>Left</th><td> <?php echo $wax['lpresent']; ?></td><td><?php echo $wax['lremoved']; ?></td></tr>

          </table>

          <br>
          <label>Diseases, etc : </label>
          <?php echo $diseases; ?><br><br>

          <table class='table'>
          <tr><th> H </th> </tr>

          <tr><td><?php echo $h; ?></td></tr>

          </table>
          <br>
         <label>Effect on P. if any : </label><?php echo $effect; ?><br>
          <br><br>
          <div class="button-section">
            <form action="medicalReportDisplay7.php" method="post">
              <button type="submit" name="next">Next</button>
            </form>
          </div>
        </div>
     </div>
  </body>
</html>
