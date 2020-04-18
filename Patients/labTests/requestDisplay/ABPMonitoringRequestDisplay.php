<?php
  session_start();
  include_once "../../classes/patientview.class.php";
  include_once "../classes/ABPMonitoringRequest.class.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ABP Monitoring Request</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../css/labTestRequests.css">
  </head>
  <body>
    <div class="form-style">
      <h1>CARDIAC INVESTIGATION UNIT</h1>
      <h2>ABP Monitoring Request</h2>
      <?php
        $nic = '982753295V';  // this should be given by a session object
        $patientViewObject = new PatientView();

        $results = $patientViewObject->showLabTestsRequests($nic);

        $serializedABPMonitoringRequest = $results[0]['serializedABPMonitoringRequest'];

        $ABPMonitoringRequestObject = unserialize($serializedABPMonitoringRequest);
      ?>

      <div class="section"><span>1</span>Date</div>
      <div class="inner-wrap">
        <?php echo $ABPMonitoringRequestObject->getProperty('dateOfRequest'); ?><br><br>
      </div>

      <div class="section"><span>2</span>Personal Info</div>
      <div class="inner-wrap">
          <label>Service No : </label><?php echo $ABPMonitoringRequestObject->getProperty('force_id'); ?><br><br><label>NIC : </label><?php echo $ABPMonitoringRequestObject->getProperty('nic'); ?><br><br><label>Rank : </label><?php echo $ABPMonitoringRequestObject->getProperty('rank'); ?>
          <br><br><label>Name : </label><?php echo $ABPMonitoringRequestObject->getProperty('first_name')." ".$ABPMonitoringRequestObject->getProperty('last_name'); ?>
          <br><br><label>Unit : </label><?php echo $ABPMonitoringRequestObject->getProperty('unit'); ?><br><br>


        <label>Age : </label><?php echo $ABPMonitoringRequestObject->getProperty('age'); ?><br><br>

        <?php
          echo "<label>Gender : </label>".$ABPMonitoringRequestObject->getProperty('gender')."<br><br>";
        ?>

        <?php
          echo "<label>Date of Birth : </label>".$ABPMonitoringRequestObject->getProperty('dob');
        ?>

        <br><br><label>Height : </label><?php echo $ABPMonitoringRequestObject->getProperty('height'); ?>
        <br><br><label>Weight : </label><?php echo $ABPMonitoringRequestObject->getProperty('weight'); ?>

        <?php
          echo '<br><br><label>Contact No : </label><input type="number" name="contact" value='.$ABPMonitoringRequestObject->getProperty('mobile').'>';
         ?>
      </div>

      <div class="section"><span>3</span>Medical Info</div>
      <div class="inner-wrap">
        <label>Ward No : </label><?php echo $ABPMonitoringRequestObject->getProperty('ward_no'); ?><br><br>
        <label>Blood Pressure : </label><?php echo $ABPMonitoringRequestObject->getProperty('bp'); ?><br><br>
        <label>Short History of case : </label><?php echo $ABPMonitoringRequestObject->getProperty('shortHistory'); ?></textarea><br><br><br>

      </div>

      <div class="section"><span>4</span>Doctor's Info</div>
      <div class="inner-wrap">
        <?php
          echo "<label>Name of Consultant/MO : </label>".$ABPMonitoringRequestObject->getProperty('consMOName')."<br><br><label> NIC of Consultant/MO : </label>".$ABPMonitoringRequestObject->getProperty('consMOID');

        ?>
      </div>

      <br><br><label>Appointed Date : </label><?php echo $ABPMonitoringRequestObject->getProperty('appointedDate'); ?>
      <br><br><label>Time : </label><?php echo $ABPMonitoringRequestObject->getProperty('time'); ?>

    </div>

  </body>
</html>
