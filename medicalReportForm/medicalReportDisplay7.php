<?php
  //session_start();
  include_once "classes/upperlimbslocomotion.class.php";
  require_once '../core/initfromMedicalReport.php';

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

     </main>

  </body>
</html>
