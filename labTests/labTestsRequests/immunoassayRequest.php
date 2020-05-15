<?php
  require_once '../../core/initfromLabTestsInner.php';
  $user=new User();
  if(!$user->isLoggedIn()){
      Redirect::to('../../index.php');
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Immunoassay Request</title>
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
          <label>Date : </label><input type="date" name="dateOfRequest"><br><br>
          <label>Lab No : </label><input type="number" name="labNo"><br><br>
        </div>

        <div class="section"><span>2</span>Personal Info</div>
        <div class="inner-wrap">
          <?php
            echo "<label>Service No : </label>".$patientInfo['force_id']."<br><br><label>NIC : </label>".$patientInfo['NIC']."<br><br><label>Rank : </label>".$patientInfo['rank']."
            <br><br><label>Name : </label>".$patientInfo['first_name']." ".$patientInfo['last_name']."
            <br><br><label>Unit : </label>".$patientInfo['regiment']."<br><br>

            <label>Age : </label><input type='number' name='age' placeholder='Ex: 30'><br><br>";

            if ($patientInfo['gender'] == 'male') {
              $gender  = 'Male';
            }else {
              $gender = 'Female';
            }

            $mobile = $patientInfo['mobile'];

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
