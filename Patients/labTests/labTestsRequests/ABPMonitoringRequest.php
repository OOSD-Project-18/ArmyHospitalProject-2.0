<?php
  session_start();
  include_once "../../classes/patientview.class.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ABP Monitoring Request</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../css/labTestRequests.css">
  </head>
  <body>
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
  </body>
</html>
