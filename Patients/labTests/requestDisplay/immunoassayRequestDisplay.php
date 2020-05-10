<?php
  //session_start();
  include_once "../../classes/patientview.class.php";
  include_once "../classes/immunoassayRequest.class.php";
  include_once "../../includes/class-autoload.inc.php";
  require_once '../../includes/initFromPatients.php';
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

        $results = $patientViewObject->showLabTestsRequests($nic);

        $serializedImmunoassayRequest = $results[0]['serializedImmunoassayRequest'];

        $immunoassayRequestObject = unserialize($serializedImmunoassayRequest);

        $details= $immunoassayRequestObject->getProperty('details');

      ?>

      <div class="section"><span>1</span>Date and Lab No</div>
      <div class="inner-wrap">
        <label>Date : </label><?php echo $details[0]; ?><br><br>
        <label>Lab No : </label><?php echo $details[1]; ?><br><br>
      </div>

      <div class="section"><span>2</span>Personal Info</div>
      <div class="inner-wrap">

        <label>Service No : </label><?php echo $immunoassayRequestObject->getProperty('force_id'); ?><br><br><label>NIC : </label><?php echo $immunoassayRequestObject->getProperty('nic'); ?><br><br><label>Rank : </label><?php echo $immunoassayRequestObject->getProperty('rank'); ?>
        <br><br><label>Name : </label><?php echo $immunoassayRequestObject->getProperty('first_name')." ".$immunoassayRequestObject->getProperty('last_name'); ?>
        <br><br><label>Unit : </label><?php echo $immunoassayRequestObject->getProperty('unit'); ?><br><br>

        <label>Age : </label><?php echo $immunoassayRequestObject->getProperty('age'); ?><br><br>

        <label>Gender : </label><?php echo $immunoassayRequestObject->getProperty('gender'); ?><br><br>

        <label>Tel. No : </label><?php echo $immunoassayRequestObject->getProperty('telNo'); ?><br><br>


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
              <td><?php echo $details[2][0]; ?></td><td><?php echo $details[3][0]; ?></td>
            </tr>
            <tr>
              <td><?php echo $details[2][1]; ?></td><td><?php echo $details[3][1]; ?></td>
            </tr>
          </table><br><br>
        </div>

        <label>Ward : </label><?php echo $immunoassayRequestObject->getProperty('ward'); ?><br><br>

        <label>Test Requested :</label><br>  <div class="section"><span>*</span></div><?php echo $details[7][0]; ?><br><br>
        <div class="section"><span>*</span></div> <?php echo $details[7][1]; ?><br><br>
        <div class="section"><span>*</span></div> <?php echo $details[7][2]; ?><br><br><br>

        <label>Relevent Clinic Notes : </label><?php echo $details[4]; ?><br><br>
        <label>Diagnosis : </label><?php echo $details[5]; ?><br><br>
        <label>Current Treatment : </label><?php echo $details[6]; ?><br><br>

        <div class="table">
          <table>
            <tr>
              <th>For Follow - up patients only</th><td><?php echo $details[8][0]; ?></td>
            </tr>
            <tr>
              <th>Special Serial No. of patients</th><td><?php echo $details[8][1]; ?></td>
            </tr>
            <tr>
              <th>Previous test results</th><td><?php echo $details[8][2]; ?></td>
            </tr>
          </table>

          <table>
            <tr>
              <th>Test</th><th>Value</th><th>Date</th>
            </tr>
            <tr>
              <td><?php echo $details[9][0]; ?>></td><td><?php echo $details[10][0]; ?></td><td><?php echo $details[11][0] ?></td>
            </tr>
            <tr>
              <td><?php echo $details[9][1]; ?></td><td><?php echo $details[10][1]; ?></td><td><?php echo $details[11][1]; ?></td>
            </tr>
          </table><br><br>
        </div>
      </div>

      <div class="section"><span>4</span>Doctor's Info</div>
      <div class="inner-wrap">

        <label>Name of Consultant/MO : </label><?php echo $immunoassayRequestObject->getProperty('consMOName'); ?><br><br><label> Designation of Consultant/MO : </label><?php echo $immunoassayRequestObject->getProperty('designation'); ?><br><br><label> NIC of Consultant/MO : </label><?php echo $immunoassayRequestObject->getProperty('consMOID'); ?>

      </div>
    </div>
    </div>
    </main>

  </body>
</html>
