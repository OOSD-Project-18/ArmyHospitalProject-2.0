<?php
  //session_start();
  include_once "../../classes/patientview.class.php";
  include_once "../classes/holterMonitoringRequest.class.php";
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
    <title>Holter Monitoring Request</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <!--link rel="stylesheet" href="../../css/histopathologyRequestStyle.css"-->
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

      $serializedHolterMonitoringRequest = $results[0]['serializedHolterMonitoringRequest'];
    
      if (empty($serializedHolterMonitoringRequest)) {
        $_SESSION['h1'] = "CARDIAC INVESTIGATION UNIT";
        $_SESSION['h2'] = "Holter Monitoring Request";
        header("Location: ../noRecords.php");
      }
   ?>
  <?php include('../_header.lab.php') ?>
    <main  id=main>
        <?php include('../_sideNav.lab.php') ?>
    <div class="container py-4">
    <div class="form-style">
    <h1>CARDIAC INVESTIGATION UNIT</h1>
    <h2>Holter Monitoring Request</h2>
    <?php

      $holterMonitoringRequestObject = unserialize($serializedHolterMonitoringRequest);

      echo "<b>Date : </b>".$holterMonitoringRequestObject->getProperty('dateOfRequest')."<br><br>";

      echo "<b>Service No : </b>".$holterMonitoringRequestObject->getProperty('force_id')."<br><b>NIC : </b>".$holterMonitoringRequestObject->getProperty('nic')."<br><b>Rank : </b>".$holterMonitoringRequestObject->getProperty('rank')."
      <br><b>Name : </b>".$holterMonitoringRequestObject->getProperty('first_name')." ".$holterMonitoringRequestObject->getProperty('last_name')."
      <br><b>Unit : </b>".$holterMonitoringRequestObject->getProperty('unit')."<br><br>";

      echo "<b>Age : </b>".$holterMonitoringRequestObject->getProperty('age')."<br><br>";

      echo "<b>Gender : </b>".$holterMonitoringRequestObject->getProperty('gender')."<br><br>";

      echo "<b>Ward No : </b>".$holterMonitoringRequestObject->getProperty('ward_no')."<br><br>

      <b>Blood Pressure : </b>".$holterMonitoringRequestObject->getProperty('bp')."<br><br>";

      echo "<b>Date of Birth : </b>".$holterMonitoringRequestObject->getProperty('dob');


      echo "<br><br><b>Height : </b>".$holterMonitoringRequestObject->getProperty('height')."
      <br><br><b>Weight : </b>".$holterMonitoringRequestObject->getProperty('weight');

      echo "<br><br><b>Contact No : </b>".$holterMonitoringRequestObject->getProperty('contact');

       echo "<br><br><b>Appointed Date : </b>".$holterMonitoringRequestObject->getProperty('appointedDate')."
       <br><br><b>Time : </b>".$holterMonitoringRequestObject->getProperty('time')."<br><br>

       <b>Short History of case : </b>".$holterMonitoringRequestObject->getProperty('shortHistory')."<br><br><br>";

      echo "<b>Name of Consultant/MO : </b>".$holterMonitoringRequestObject->getProperty('consMOName')."<br><b> NIC of Consultant/MO : </b>".$holterMonitoringRequestObject->getProperty('consMOID');

    ?>
</div>
</div>
</main>
  </body>
</html>
