<?php
  //session_start();
  include_once "classes/earsNoseThroat.class.php";
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
     </div>
     </main>
  </body>
</html>
