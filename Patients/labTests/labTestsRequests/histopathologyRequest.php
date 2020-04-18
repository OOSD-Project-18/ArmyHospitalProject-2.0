<?php
  session_start();
  include_once "../../classes/patientview.class.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Histopathology Request</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../css/histopathologyRequestStyle.css">
  </head>
  <body>
    <div class="form-style">
      <h1>DEPARTMENT OF HISTOPATHOLOGY</h1>
      <h2>Request Form for Histopathology / FNAC</h2>
      <?php
        $nic = '982753295V';  // this should be given by a session object
        $patientViewObject = new PatientView();

        $results = $patientViewObject->showPatientInfo($nic);

        $patientInfo = $results[0];
      ?>

      <form action="../includes/histopathologyRequest.inc.php" method="post">
        <div class="section"><span>1</span>Date</div>
        <div class="inner-wrap">
          <input type="date" name="date">
        </div>

        <div class="section"><span>2</span>Personal Info</div>
        <div class="inner-wrap">
          <?php
            echo "<label>Regt No : </label>".$patientInfo['force_id']."<br><br><label>NIC : </label>".$patientInfo['nic']."<br><br><label>Rank : </label>".$patientInfo['rank']."
            <br><br><label>Name : </label>".$patientInfo['first_name']." ".$patientInfo['last_name']."
            <br><br><label>Unit : </label>".$patientInfo['regiment']."<br><br>";
          ?>

          <label>Age : </label><input type="number" name="age" placeholder="Ex: 30 Yrs"><br><br>

          <?php
            echo "<label>Family Name : </label><input type='text' name='familyName' value=".$patientInfo['last_name']."><br><br>";
            if ($patientInfo['gender'] == 'male') {
              $gender  = 'Male';
            }else {
              $gender = 'Female';
            }
            echo "<label>Gender : </label>".$gender."<br><br>";

            $mobile = $patientInfo['mobile'];

            echo '<label>Tel. No : </label><input type="number" name="telNo" value='.$mobile.'><br><br>';
          ?>
        </div>

        <div class="section"><span>3</span>Medical Info</div>
        <div class="inner-wrap">
          <label>Ward : </label><input type="text" name="ward"><br><br>

          <label>Specimen type & site : </label><br><textarea name="specimen" rows="4" cols="50"></textarea><br><br>
          <label>Relevent clinical history (duration etc.) & finding. : </label><br><textarea name="clinicalHistory" placeholder="Eg; Lymphadenopathy, Hepatosplenomegaly" rows="4" cols="50"></textarea><br><br>
          <label>Relevent investigations : </label><br><textarea name="investigations" rows="4" cols="50"></textarea><br><br>
          <label>Relevent radiological findings (Including USS/CT/MRI/Mammography) : </label><br><textarea name="radio" rows="4" cols="50"></textarea><br><br>
          <label>Probe diagnosis / Differential diagnosis : </label><br><textarea name="proDiff" rows="4" cols="50"></textarea><br><br>
          <label>If a previous biopsy was done (including FNAC/PAP/Ytru cut etc.) give details diagnosis : </label><br><textarea name="prev" rows="4" cols="50"></textarea><br><br>
          <label>If done at Army Hospital, reference number of pathology report : </label><br><textarea name="reportNo" rows="4" cols="50"></textarea><br><br>
          <label>Pre.Op.chemotherapy given : </label> Yes <input type="radio" name="chemo" value="Yes"> No <input type="radio" name="chemo" value="No"><br><br>
          <label>Radiotherapy given : </label> Yes <input type="radio" name="radiotherapy" value="Yes"> No <input type="radio" name="radiotherapy" value="No"><br><br>
          <label>Relevent opertative findings / endoscopic findings and orientation of the specimen : </label><br><textarea name="findings" rows="4" cols="50"></textarea><br><br>
          <label>Details of the Consultant / MO to be contacted for further details regarding the surgery/ procedure : </label><br><textarea name="contactDoc" rows="4" cols="50"></textarea><br><br>
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


        <?php   echo '<br><br><label>Contact No : </label><input type="number" name="contact" value='.$mobile.'><br><br>' ?>

        <label>Extension No Histopathology : </label><input type='number' name='hisNo'> <label> Extension No Reporting Room : </label><input type='number' name='repRoom'>

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

        <br><br><br>

        <div class="button-secton">
          <input type="submit" name="confirm">
        </div>
      </form>
    </div>
  </body>
</html>
