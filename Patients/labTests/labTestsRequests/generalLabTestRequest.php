<?php
  session_start();
  include_once "../../classes/patientview.class.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>General Lab Test Request</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../css/labTestRequests.css">
  </head>
  <body>
    <div class="form-style">
      <h1>ARMY HOSPITAL</h1>
      <h2>Request for Laboratory Examination</h2>
      <?php
        $nic = '982753295V';  // this should be given by a session object
        $patientViewObject = new PatientView();

        $results = $patientViewObject->showPatientInfo($nic);

        $patientInfo = $results[0];
      ?>

      <form action="../includes/generalLabTestRequest.inc.php" method="post">
        <label>LABY. REPORT No. : </label><input type="text" name="labyReportNo"><br><br>
        <label>SENDER'S No. : </label><input type="text" name="sendersNo"><br><br>

        <div class="section"><span>1</span>Personal Info</div>
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
        </div>

        <div class="section"><span>2</span>Medical Info</div>
        <div class="inner-wrap">
          <label>Ward : </label><input type="number" name="ward"><br><br>

          <textarea name="at" rows="1" cols="60" placeholder="(at)"></textarea><br><label> To Officer i/c Laboratory.</label><br><br>
          <label>Accompanying Specimen of : </label><textarea name="specimen" rows="1" cols="60"></textarea><br><br>
          <label>Examination Required : </label><textarea name="exam" rows="1" cols="60"></textarea><br><br>
          <label>Points Requiring Special Investigation : </label><textarea name="spPoints" rows="3" cols="60"></textarea><br><br>
        </div>

        <div class="section"><span>3</span>Diagnosis</div>
        <div class="inner-wrap">
          <label>Short statement of case, including treatement and progress and references to any previous laboratory reports</label><br><br>
          <textarea name="diagnosis" rows="5" cols="60"></textarea><br><br>
        </div>

        <div class="section"><span>4</span>Doctor's Info</div>
        <div class="inner-wrap">
          <?php
            $consMOName = "Dr. KPN Pathirana"; // should get from a session
            $designation = "Brigadier"; // should get from a session
            $consMOID = "687543545v";  // should get from a session

            echo "<label>Name of Consultant/MO : </label>".$consMOName."<br><br><label> Designation of Consultant/MO : </label>".$designation."<br><br><label> NIC of Consultant/MO : </label>".$consMOID;

          ?>
        </div>

        <label>Station : </label><textarea name="station" rows="1" cols="60"></textarea><br><br>

        <label>Date : </label><input type="date" name="dateOfRequest"><br><br>
        <label>Time : </label><input type="time" name="time"><br><br>

        <?php
          $_SESSION['nic'] = $nic;
          $_SESSION['force_id'] = $patientInfo['force_id'];
          $_SESSION['rank'] = $patientInfo['rank'];
          $_SESSION['first_name'] = $patientInfo['first_name'];
          $_SESSION['last_name'] = $patientInfo['last_name'];
          $_SESSION['unit'] = $patientInfo['regiment'];
          $_SESSION['gender'] = $gender;
          $_SESSION['consMOName'] = $consMOName;
          $_SESSION['designation'] = $designation;
          $_SESSION['consMOID'] = $consMOID;
        ?>

        <br>

        <div class="button-secton">
          <input type="submit" name="confirm">
        </div>

       </form>
    </div>
  </body>
</html>
