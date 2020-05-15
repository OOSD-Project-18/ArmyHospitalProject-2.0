<?php
  //session_start();
  include_once "classes/specialistReport.class.php";
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

      $serializedSpecialistReport = $results[0]['serializedSpecialistReportObject'];

      $specialistReportObject = unserialize($serializedSpecialistReport);

      $sraroi = $specialistReportObject->getProperty('sraroi');
      $right = $specialistReportObject->getProperty('right');
      $left = $specialistReportObject->getProperty('left');
      $dateOfReport = $specialistReportObject->getProperty('dateOfReport');
      $initPulheems = $specialistReportObject->getProperty('initPulheems');
      $servicePulheems = $specialistReportObject->getProperty('servicePulheems');

     ?>

     <div class="medical-report">
       <h1>Medical Report</h1><br>
       <div class="section"><span>12</span>Specialist Reports amd Results of Investigations</div><br>
       <div class="inner-wrap">
         <form action="medicalReportDisplay11.php" method="post">
             <?php echo $sraroi; ?><br><br><br>
             <div style="overflow-x:scroll;">
             <table class='table' border="1">
               <tr>
                 <th> </th><th>Vision without glasses</th><th>Sph.</th><th>Cyl.</th><th>Axis standard notation</th><th>Vision with glasses</th>
               </tr>
               <tr>
                 <td>R</td><td><?php echo $right[0]; ?></td><td><?php echo $right[1]; ?></td><td><?php echo $right[2]; ?></td><td><?php echo $right[3]; ?></td><td><?php echo $right[4]; ?></td>
               </tr>
               <tr>
                 <td>L</td><td><?php echo $left[0]; ?></td><td><?php echo $left[1]; ?></td><td><?php echo $left[2]; ?></td><td><?php echo $left[3]; ?></td><td><?php echo $left[4]; ?></td>
             </table><br>
</div>
             <br><label>Date : </label><?php echo $dateOfReport; ?><br><br>

             <div class="section"><span>a</span><p><b>Initial PULHEEMS Assessment</b></p></div><br>
             <div style="overflow-x:scroll;">
             <table class='table'>
               <tr>
                 <th>Y.O.B</th><th>P</th><th>U</th><th>L</th><th>H</th><th>E</th><th>E</th><th>M</th><th>S</th>
               </tr>
               <tr>
                 <td><?php echo $initPulheems[0]; ?></td><td><?php echo $initPulheems[1][0]; ?></td><td><?php echo $initPulheems[1][1]; ?></td><td><?php echo $initPulheems[1][2]; ?></td><td><?php echo $initPulheems[1][3]; ?></td><td><?php echo $initPulheems[1][4]; ?></td><td><?php echo $initPulheems[1][5]; ?></td><td><?php echo $initPulheems[1][6]; ?></td><td><?php echo $initPulheems[1][7]; ?></td>
               </tr>
             </table><br><br>
</div>
             <label>Height(inches) : </label><?php echo $initPulheems[2]; ?><br><br>
             <label>CP.            : </label><?php echo $initPulheems[3]; ?><br><br>
             <label>Weight(lbs)    : </label><?php echo $initPulheems[4]; ?><br><br>

             <label>P : </label><?php echo $initPulheems[5]; ?><br><br>
             <label>U : </label><?php echo $initPulheems[6]; ?><br><br>
             <label>L : </label><?php echo $initPulheems[7]; ?><br><br>
             <label>S : </label><?php echo $initPulheems[8]; ?><br><br>

             <label>Date : </label><?php echo $initPulheems[9]; ?><br><br>

             <div class="section"><span>b</span><p><b>Service PULHEEMS Assessment</b></p></div><br>
             <div style="overflow-x:scroll;">
             <table class='table'>
               <tr>
                 <th>Y.O.B</th><th>P</th><th>U</th><th>L</th><th>H</th><th>E</th><th>E</th><th>M</th><th>S</th>
               </tr>
               <tr>
                 <td><?php echo $servicePulheems[0]; ?></td><td><?php echo $servicePulheems[1][0]; ?></td><td><?php echo $servicePulheems[1][1]; ?></td><td><?php echo $servicePulheems[1][2]; ?></td><td><?php echo $servicePulheems[1][3]; ?></td><td><?php echo $servicePulheems[1][4]; ?></td><td><?php echo $servicePulheems[1][5]; ?></td><td><?php echo $servicePulheems[1][6]; ?></td><td><?php echo $servicePulheems[1][7]; ?></td>
               </tr>
             </table><br>
</div>
             <label>Height(inches) : </label><?php echo $servicePulheems[2]; ?><br><br>
             <label>CP. : </label> <?php echo $servicePulheems[3]; ?><br><br>
             <label>Weight(lbs) : </label><?php echo $servicePulheems[4]; ?><br><br>

             <label>P : </label><?php echo $servicePulheems[5]; ?><br><br>
             <label>U : </label><?php echo $servicePulheems[6]; ?><br><br>
             <label>L : </label><?php echo $servicePulheems[7]; ?><br><br>
             <label>S : </label><?php echo $servicePulheems[8]; ?><br><br>

             <label>Date : </label><?php echo $servicePulheems[9]; ?><br><br>

             <div class="button-section">
               <button type="submit" name="finish">Finish</button>
             </div>
         </form>
       </div>
     </div>
     </main>
  </body>
</html>
