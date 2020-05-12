<?php
  //session_start();
  include_once "../../classes/patientview.class.php";
  include_once "../classes/xRayRequest.class.php";
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
    <title>X Ray Request</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../css/labTestRequests.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </head>
  <body>
    <?php
        $nic = '982753295V';  // this should be given by a session object
        $patientViewObject = new PatientView();

        $results = $patientViewObject->showLabTestsRequests($nic);

        $serializedXRayRequest = $results[0]['serializedXRayRequest'];
    
        if (empty($serializedBasicECGRequest)) {
          $_SESSION['h1'] = "Army Hospital";
          $_SESSION['h2'] = "X Ray Request";
          header("Location: ../noRecords.php");
        }

        $xRayRequestObject = unserialize($serializedXRayRequest);

      ?>
  <?php include('../_header.lab.php') ?>
    <main  id=main>
        <?php include('../_sideNav.lab.php') ?>
    <div class="container py-4">
    <div class="form-style">
      <h1>Army Hospital</h1>
      <h2>X Ray Request</h2>

      <div class="section"><span>1</span>Date</div>
      <div class="inner-wrap">
        <?php echo $xRayRequestObject->getProperty('dateOfRequest'); ?><br><br>
      </div>

      <div class="section"><span>2</span>Personal Info</div>
      <div class="inner-wrap">

        <label>Service No : </label><?php echo $xRayRequestObject->getProperty('force_id'); ?><br><br><label>NIC : </label><?php echo $xRayRequestObject->getProperty('nic'); ?><br><br><label>Rank : </label><?php echo $xRayRequestObject->getProperty('rank'); ?>
        <br><br><label>Name : </label><?php echo $xRayRequestObject->getProperty('first_name')." ".$xRayRequestObject->getProperty('last_name'); ?>
        <br><br><label>Unit / Ship / A.F.Stn. : </label><?php echo $xRayRequestObject->getProperty('unit'); ?><br><br>


        <label>Age : </label><?php echo $xRayRequestObject->getProperty('age'); ?><br><br>
      </div>

      <div class="section"><span>3</span>Medical Info</div>
      <div class="inner-wrap">
        <label>Part to be X-Rayed : </label><?php echo $xRayRequestObject->getProperty('xRayPart'); ?><br><br>
        <label>Short History of Case (To be completed by M.O.I. / c case) : </label><?php echo $xRayRequestObject->getProperty('shortHistory'); ?><br><br>
      </div>

      <div class="section"><span>4</span>Doctor's Info</div>
      <div class="inner-wrap">

        <label>Name of Consultant/MO : </label><?php echo $xRayRequestObject->getProperty('consMOName'); ?><br><br><label> Designation of Consultant/MO : </label><?php echo $xRayRequestObject->getProperty('designation'); ?><br><br><label> NIC of Consultant/MO : </label><?php echo $xRayRequestObject->getProperty('consMOID'); ?>

      </div>
    </div>
    </div>
    </main>

  </body>
</html>
