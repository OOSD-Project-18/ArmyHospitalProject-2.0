<?php
  include_once "../../classes/patientview.class.php";
  include_once "../../includes/class-autoload.inc.php";
  require_once '../../includes/initFromPatients.php';
  //session_start(); This is done by above file
  $user=new User();
  if(!$user->isLoggedIn()){
      Redirect::to('../../index.php');
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ABP Monitoring Request</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../css/labTestRequests.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </head>
  <body>
    <?php include('../_header.lab.php') ?>
    <main  id=main>
        <?php include('../_sideNav.lab.php') ?>
    <div class="container py-4">
    <div class="form-style">
      <h1>CARDIAC INVESTIGATION UNIT</h1>
      <h2>ABP Monitoring Request</h2>
      <?php
        $nic = '982753295V';  // this should be given by a session object
        $patientViewObject = new PatientView();

        $results = $patientViewObject->showPatientInfo($nic);

        $patientInfo = $results[0];
      ?>

      <form action="../includes/ABPMonitoringRequest.inc.php" method="post">
        <div class="section"><span>1</span>Date</div>
        <div class="inner-wrap">
          <input type="date" name="dateOfRequest"><br><br>
        </div>

        <div class="section"><span>2</span>Personal Info</div>
        <div class="inner-wrap">
          <?php
            echo "<label>Service No : </label>".$patientInfo['force_id']."<br><br><label>NIC : </label>".$patientInfo['nic']."<br><br><label>Rank : </label>".$patientInfo['rank']."
            <br><br><label>Name : </label>".$patientInfo['first_name']." ".$patientInfo['last_name']."
            <br><br><label>Unit : </label>".$patientInfo['regiment']."<br><br>";
          ?>

          <label>Age : </label><input type="number" name="age" placeholder="Ex: 30"><br><br>

          <?php
            if ($patientInfo['gender'] == 'male') {
              $gender  = 'Male';
            }else {
              $gender = 'Female';
            }
            echo "<label>Gender : </label>".$gender."<br><br>";
          ?>

          <?php
            $dob = $patientInfo['date_of_birth'];
            echo "<label>Date of Birth : </label>".$dob;
          ?>

          <br><br><label>Height : </label><input type="text" name="height">
          <br><br><label>Weight : </label><input type="text" name="weight">

          <?php
            $mobile = $patientInfo['mobile'];

            echo '<br><br><label>Contact No : </label><input type="number" name="contact" value='.$mobile.'>';
           ?>
        </div>

        <div class="section"><span>3</span>Medical Info</div>
        <div class="inner-wrap">
          <label>Ward No : </label><input type="number" name="ward_no"><br><br>
          <label>Blood Pressure : </label><input type="number" name="bp"><br><br>
          <label>Short History of case : </label><textarea name="shortHistory" rows="4" cols="50"></textarea><br><br><br>

        </div>

        <div class="section"><span>4</span>Doctor's Info</div>
        <div class="inner-wrap">
          <?php
          $consMOName = "Dr. KPN Pathirana"; // should get from a session
          $consMOID = "687543545v";  // should get from a session

          echo "<label>Name of Consultant/MO : </label>".$consMOName."<br><br><label> NIC of Consultant/MO : </label>".$consMOID;

          ?>
        </div>

         <br><br><label>Appointed Date : </label><input type="date" name="appointedDate">
         <br><br><label>Time : </label><input type="time" name="time"><br><br>


        <?php

          $_SESSION['nic'] = $nic;
          $_SESSION['force_id'] = $patientInfo['force_id'];
          $_SESSION['rank'] = $patientInfo['rank'];
          $_SESSION['first_name'] = $patientInfo['first_name'];
          $_SESSION['last_name'] = $patientInfo['last_name'];
          $_SESSION['unit'] = $patientInfo['regiment'];
          $_SESSION['gender'] = $gender;
          $_SESSION['dob'] = $dob;
          $_SESSION['consMOName'] = $consMOName;
          $_SESSION['consMOID'] = $consMOID;

        ?>

        <br><br><br>
        <div class="button-section">
          <input type="submit" name="confirm"/>
        </div>

    </div>
     </form>
   </div>
  </body>
</html>
