<?php
  session_start();
  include_once "../../classes/patientview.class.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Immunoassay Request</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../css/labTestRequests.css">
  </head>
  <body>
    <div class="form-style">
      <h1>Army Hospital</h1>
      <h2>Immunoassay Request</h2>
      <?php
        $nic = '982753295V';  // this should be given by a session object
        $patientViewObject = new PatientView();

        $results = $patientViewObject->showPatientInfo($nic);

        $patientInfo = $results[0];
      ?>

      <form action="../includes/immunoassayRequest.inc.php" method="post">
        <div class="section"><span>1</span>Date and Lab No</div>
        <div class="inner-wrap">
          <label>Date : </label><input type="date" name="date"><br><br>
          <label>Lab No : </label><input type="number" name="labNo"><br><br>
        </div>

        <div class="section"><span>2</span>Personal Info</div>
        <div class="inner-wrap">
          <?php
            echo "<label>Service No : </label>".$patientInfo['force_id']."<br><br><label>NIC : </label>".$patientInfo['nic']."<br><br><label>Rank : </label>".$patientInfo['rank']."
            <br><br><label>Name : </label>".$patientInfo['first_name']." ".$patientInfo['last_name']."
            <br><br><label>Unit : </label>".$patientInfo['regiment']."<br><br>

            <label>Age : </label><input type='number' name='age' placeholder='Ex: 30'><br><br>";

            if ($patientInfo['gender'] == 'male') {
              $gender  = 'Male';
            }else {
              $gender = 'Female';
            }
            echo "<label>Gender : </label>".$gender."<br><br>

            <label>Tel. No : </label><input type='number' name='contact' value='.$mobile.'><br><br>";
          ?>

        </div>

        <div class="section"><span>3</span>Medical Info</div>
        <div class="inner-wrap">
          <div class="table">
            <label>Sample Collection : </label>

            <table>
              <tr>
                <th>Date</th><th>Time</th>
              </tr>
              <tr>
                <td><input type="date" name="dates[]"></td><td><input type="time" name="times[]"></td>
              </tr>
              <tr>
                <td><input type="date" name="dates[]"></td><td><input type="time" name="times[]"></td>
              </tr>
            </table><br><br>
          </div>

          <label>Ward : </label><input type="number" name="ward"><br><br>

          <label>Test Requested :</label><br>  <div class="section"><span>*</span></div> <textarea name="reqTests[]" rows="1" cols="50"></textarea><br>
          <div class="section"><span>*</span></div> <textarea name="reqTests[]" rows="1" cols="50"></textarea><br>
          <div class="section"><span>*</span></div> <textarea name="reqTests[]" rows="1" cols="50"></textarea><br><br><br>

          <label>Relevent Clinic Notes : </label><textarea name="clinicNotes" rows="5" cols="50"></textarea><br><br>
          <label>Diagnosis : </label><textarea name="diagnosis" rows="3" cols="50"></textarea><br><br>
          <label>Current Treatment : </label><textarea name="currentTreatment" rows="3" cols="50"></textarea><br><br>

          <div class="table">
            <table>
              <tr>
                <th>For Follow - up patients only</th><td><textarea name="tableData[]" rows="1" cols="50"></textarea></td>
              </tr>
              <tr>
                <th>Special Serial No. of patients</th><td><textarea name="tableData[]" rows="1" cols="50"></textarea></td>
              </tr>
              <tr>
                <th>Previous test results</th><td><textarea name="tableData[]" rows="1" cols="50"></textarea></td>
              </tr>
            </table>

            <table>
              <tr>
                <th>Test</th><th>Value</th><th>Date</th>
              </tr>
              <tr>
                <td><textarea name="test[]" rows="1" cols="50"></textarea></td><td><textarea name="value[]" rows="1" cols="50"></textarea></td><td><input type='date' name='date[]'></td>
              </tr>
              <tr>
                <td><textarea name="test[]" rows="1" cols="50"></textarea></td><td><textarea name="value[]" rows="1" cols="50"></textarea></td><td><input type='date' name='date[]'></td>
              </tr>
            </table><br><br>
          </div>
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
            $_SESSION['gender'] = $gender;
            $_SESSION['consMOName'] = $consMOName;
            $_SESSION['designation'] = $designation;
            $_SESSION['consMOID'] = $consMOID;

          ?>
        </div>

        <br><br><br>

        <div class="button-secton">
          <input type="submit" name="confirm">
        </div>

      </form>
    </div>
  </body>
</html>
