<?php
  //session_start();
  include_once "classes/mentalCapacity.class.php";
  include_once "classes/upperlimbslocomotion.class.php";
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
     </main>
  </body>
</html>
