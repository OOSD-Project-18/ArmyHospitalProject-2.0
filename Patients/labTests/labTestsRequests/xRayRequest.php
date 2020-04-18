<?php
  session_start();
  include_once "../../classes/patientview.class.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>X Ray Request</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../css/labTestRequests.css">
  </head>
  <body>
    <div class="form-style">
      <h1>Army Hospital</h1>
      <h2>X Ray Request</h2>
      <?php
        $nic = '982753295V';  // this should be given by a session object
        $patientViewObject = new PatientView();

        $results = $patientViewObject->showPatientInfo($nic);

        $patientInfo = $results[0];
      ?>

      <form action="../includes/xRayRequest.inc.php" method="post">
        <div class="section"><span>1</span>Date</div>
        <div class="inner-wrap">
          <input type="date" name="dateOfRequest"><br><br>
        </div>

        <div class="section"><span>2</span>Personal Info</div>
        <div class="inner-wrap">
          <?php
            echo "<label>Service No : </label>".$patientInfo['force_id']."<br><br><label>NIC : </label>".$patientInfo['nic']."<br><br><label>Rank : </label>".$patientInfo['rank']."
            <br><br><label>Name : </label>".$patientInfo['first_name']." ".$patientInfo['last_name']."
            <br><br><label>Unit / Ship / A.F.Stn. : </label>".$patientInfo['regiment']."<br><br>";
          ?>

          <label>Age : </label><input type="number" name="age" placeholder="Ex: 30"><br><br>
        </div>

        <div class="section"><span>3</span>Medical Info</div>
        <div class="inner-wrap">
          <label>Part to be X-Rayed : </label><textarea name="xRayPart" rows="1" cols="60"></textarea><br><br>
          <label>Short History of Case (To be completed by M.O.I. / c case) : </label><textarea name="shortHistory" rows="5" cols="60"></textarea><br><br>
        </div>

        <div class="section"><span>4</span>Doctor's Info</div>
        <div class="inner-wrap">
          <?php
            $consMOName = "Dr. KPN Pathirana"; // should get from a session
            $designation = "Brigadier"; // should get from a session
            $consMOID = "687543545v";  // should get from a session

            echo "<label>Name of Consultant/MO : </label>".$consMOName."<br><br><label> Designation of Consultant/MO : </label>".$designation."<br><br><label> NIC of Consultant/MO : </label>".$consMOID;


            $_SESSION['nic'] = $nic;
            $_SESSION['force_id'] = $patientInfo['force_id'];
            $_SESSION['rank'] = $patientInfo['rank'];
            $_SESSION['first_name'] = $patientInfo['first_name'];
            $_SESSION['last_name'] = $patientInfo['last_name'];
            $_SESSION['unit'] = $patientInfo['regiment'];
            $_SESSION['consMOName'] = $consMOName;
            $_SESSION['designation'] = $designation;
            $_SESSION['consMOID'] = $consMOID;

          ?>
        </div>

        <br><br>
        <div class="button-secton">
          <input type="submit" name="confirm">
        </div>

       </form>
    </div>
  </body>
</html>
