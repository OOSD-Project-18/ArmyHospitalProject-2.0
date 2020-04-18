<?php
  session_start();
  include_once "../../classes/patientview.class.php";
  include_once "../classes/generalLabTestRequest.class.php";
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

        $results = $patientViewObject->showLabTestsRequests($nic);

        $serializedGeneralLabTestRequest = $results[0]['serializedGeneralLabTestRequest'];

        $generalLabTestRequestObject = unserialize($serializedGeneralLabTestRequest);
      ?>

      <label>LABY. REPORT No. : </label><?php echo $generalLabTestRequestObject->getProperty('labyReportNo'); ?><br><br>
      <label>SENDER'S No. : </label><?php echo $generalLabTestRequestObject->getProperty('sendersNo'); ?><br><br>

      <div class="section"><span>1</span>Personal Info</div>
      <div class="inner-wrap">
        <label>Service No : </label><?php echo $generalLabTestRequestObject->getProperty('force_id'); ?><br><br><label>NIC : </label><?php echo $generalLabTestRequestObject->getProperty('nic'); ?><br><br><label>Rank : </label><?php echo $generalLabTestRequestObject->getProperty('rank'); ?>
        <br><br><label>Name : </label><?php echo $generalLabTestRequestObject->getProperty('first_name')." ".$generalLabTestRequestObject->getProperty('last_name'); ?>
        <br><br><label>Unit : </label><?php echo $generalLabTestRequestObject->getProperty('unit'); ?><br><br>

        <label>Age : </label><?php echo $generalLabTestRequestObject->getProperty('age'); ?><br><br>

        <label>Gender : </label><?php echo $generalLabTestRequestObject->getProperty('gender'); ?><br><br>

      </div>

      <div class="section"><span>2</span>Medical Info</div>
      <div class="inner-wrap">
        <label>Ward : </label><?php echo $generalLabTestRequestObject->getProperty('ward'); ?><br><br>

        <label>Accompanying Specimen of : </label><?php echo $generalLabTestRequestObject->getProperty('specimen'); ?><br><br>
        <label>Examination Required : </label><?php echo $generalLabTestRequestObject->getProperty('exam'); ?><br><br>
        <label>Points Requiring Special Investigation : </label><?php echo $generalLabTestRequestObject->getProperty('spPoints'); ?><br><br>
        <div class="section"><span>*</span></div><b><?php echo $generalLabTestRequestObject->getProperty('at')."</b> To Officer i/c Laboratory."; ?><br><br>
      </div>

      <div class="section"><span>3</span>Diagnosis</div>
      <div class="inner-wrap">
        <label>Short statement of case, including treatement and progress and references to any previous laboratory reports</label><br><br>
        <?php echo $generalLabTestRequestObject->getProperty('diagnosis'); ?><br><br>
      </div>

      <div class="section"><span>4</span>Doctor's Info</div>
      <div class="inner-wrap">

      <label>Name of Consultant/MO : </label><?php echo $generalLabTestRequestObject->getProperty('consMOName'); ?><br><br><label> Designation of Consultant/MO : </label><?php echo $generalLabTestRequestObject->getProperty('designation'); ?><br><br><label> NIC of Consultant/MO : </label><?php echo $generalLabTestRequestObject->getProperty('consMOID'); ?>

      </div>

      <label>Station : </label><?php echo $generalLabTestRequestObject->getProperty('station'); ?><br><br>

      <label>Date : </label><?php echo $generalLabTestRequestObject->getProperty('dateOfRequest'); ?><br><br>
      <label>Time : </label><?php echo $generalLabTestRequestObject->getProperty('time'); ?><br><br>

    </div>
  </body>
</html>
