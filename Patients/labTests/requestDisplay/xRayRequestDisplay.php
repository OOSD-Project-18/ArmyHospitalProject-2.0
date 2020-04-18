<?php
  session_start();
  include_once "../../classes/patientview.class.php";
  include_once "../classes/xRayRequest.class.php";
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

        $results = $patientViewObject->showLabTestsRequests($nic);

        $serializedXRayRequest = $results[0]['serializedXRayRequest'];

        $xRayRequestObject = unserialize($serializedXRayRequest);

      ?>

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

  </body>
</html>
