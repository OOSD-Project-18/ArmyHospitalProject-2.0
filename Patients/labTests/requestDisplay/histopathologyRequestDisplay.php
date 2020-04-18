<?php
  session_start();
  include_once "../../classes/patientview.class.php";
  include_once "../classes/histopathologyRequest.class.php";
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

        $results = $patientViewObject->showLabTestsRequests($nic);

        $serializedHistopathologyRequest = $results[0]['serializedHistopathologyRequest'];

        $histopathologyRequestObject = unserialize($serializedHistopathologyRequest);

        $details = $histopathologyRequestObject->getProperty('details');

      ?>

      <div class="section"><span>1</span>Date</div>
      <div class="inner-wrap">
        <?php echo $details[12]; ?>
      </div>

      <div class="section"><span>2</span>Personal Info</div>
      <div class="inner-wrap">
        <label>Regt No : </label><?php echo $histopathologyRequestObject->getProperty('force_id'); ?><br><br><label>NIC : </label><?php echo $histopathologyRequestObject->getProperty('nic'); ?><br><br><label>Rank : </label><?php echo $histopathologyRequestObject->getProperty('rank'); ?>
        <br><br><label>Name : </label><?php echo $histopathologyRequestObject->getProperty('first_name')." ".$histopathologyRequestObject->getProperty('last_name'); ?>
        <br><br><label>Unit : </label><?php echo $histopathologyRequestObject->getProperty('unit'); ?><br><br>


        <label>Age : </label><?php echo $histopathologyRequestObject->getProperty('age'); ?><br><br>

        <label>Family Name : </label><?php echo $histopathologyRequestObject->getProperty('familyName'); ?><br><br>

        <label>Gender : </label><?php echo $histopathologyRequestObject->getProperty('gender'); ?><br><br>

        <label>Tel. No : </label><?php echo $histopathologyRequestObject->getProperty('telNo'); ?><br><br>

      </div>

      <div class="section"><span>3</span>Medical Info</div>
      <div class="inner-wrap">
        <label>Ward : </label><?php echo $histopathologyRequestObject->getProperty('ward'); ?><br><br>

        <label>Specimen type & site : </label><br><?php echo $details[0]; ?><br><br>
        <label>Relevent clinical history (duration etc.) & finding. : </label><br><?php echo $details[1]; ?><br><br>
        <label>Relevent investigations : </label><br><?php echo $details[2]; ?><br><br>
        <label>Relevent radiological findings (Including USS/CT/MRI/Mammography) : </label><br><?php echo $details[3]; ?><br><br>
        <label>Probe diagnosis / Differential diagnosis : </label><br><?php echo $details[4]; ?><br><br>
        <label>If a previous biopsy was done (including FNAC/PAP/Ytru cut etc.) give details diagnosis : </label><br><?php echo $details[5]; ?><br><br>
        <label>If done at Army Hospital, reference number of pathology report : </label><br><?php echo $details[6]; ?><br><br>
        <label>Pre.Op.chemotherapy given : </label><?php echo $details[7]; ?><br><br>
        <label>Radiotherapy given : </label> <?php echo $details[8]; ?><br><br>
        <label>Relevent opertative findings / endoscopic findings and orientation of the specimen : </label><br><?php echo $details[9]; ?><br><br>
        <label>Details of the Consultant / MO to be contacted for further details regarding the surgery/ procedure : </label><br><?php echo $details[10]; ?><br><br>
      </div>

      <div class="section"><span>4</span>Doctor's Info</div>
      <div class="inner-wrap">

        <label>Name of Consultant/MO : </label><?php echo $histopathologyRequestObject->getProperty('consMOName'); ?><br><br><label> Designation of Consultant/MO : </label><?php echo $histopathologyRequestObject->getProperty('designation'); ?><br><br><label> NIC of Consultant/MO : </label><?php echo $histopathologyRequestObject->getProperty('consMOID'); ?>

      </div>


      <br><br><label>Contact No : </label><?php echo $details[11]; ?><br><br>

      <label>Extension No Histopathology : </label><?php echo $details[13]; ?><br><br><label> Extension No Reporting Room : </label><?php echo $details[14]; ?>


    </div>
  </body>
</html>
