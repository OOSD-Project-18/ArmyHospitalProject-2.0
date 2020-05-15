<?php
  //session_start();
  include_once "classes/form10.class.php";
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

      $serializedForm10 = $results[0]['serializedForm10'];

      $form10Object = unserialize($serializedForm10);

      $one = $form10Object->getOne();
      $two = $form10Object->getTwo();
      $three = $form10Object->getThree();
      $four = $form10Object->getFour();
      $initials1 = $form10Object->getInitials1();
      $initials2 = $form10Object->getInitials2();
      $initials3 = $form10Object->getInitials3();
      $initials4 = $form10Object->getInitials4();

     ?>

     <div class="medical-report">
       <h1>Medical Report</h1><br>
       <form action="medicalReportDisplay11.php" method="post">
         <div class="section"><span>11</span>Each Examiner will initial here and indicate any specialist examinations or other investigations considered necessary before a final #### assessment is given</div><br>
         <div class="inner-wrap">
           <br><br><div class="section"><span>1</span></div><?php echo $one; ?><br><br><label> Initials of examiner </label><?php echo $initials1; ?><br><br>
           <br><div class="section"><span>2</span></div><?php echo $two; ?><br><br><label> Initials of examiner </label><?php echo $initials2; ?><br><br>
           <br><div class="section"><span>3</span></div><?php echo $three; ?><br><br><label> Initials of examiner </label><?php echo $initials3; ?><br><br>
           <br><div class="section"><span>4</span></div><?php echo $four; ?><br><br><label> Initials of examiner </label><?php echo $initials4; ?><br><br>
         </div>

         <div class="button-section">
           <button type="submit" name="next">Next</button>
         </div>
       </form>
     </div>
     </main>

  </body>
</html>
