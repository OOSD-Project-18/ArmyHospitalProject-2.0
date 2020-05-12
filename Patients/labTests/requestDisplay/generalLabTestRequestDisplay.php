<?php
  //session_start();
  include_once "../../classes/patientview.class.php";
  include_once "../classes/generalLabTestRequest.class.php";
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
    <title>General Lab Test Request</title>
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

        $serializedGeneralLabTestRequest = $results[0]['serializedGeneralLabTestRequest'];
        
        if (empty($serializedGeneralLabTestRequest)) {
            $_SESSION['h1'] = "ARMY HOSPITAL";
            $_SESSION['h2'] = "Request for Laboratory Examination";
            header("Location: ../noRecords.php");
        }

        $generalLabTestRequestObject = unserialize($serializedGeneralLabTestRequest);
     ?>
  <?php include('../_header.lab.php') ?>
    <main  id=main>
        <?php include('../_sideNav.lab.php') ?>
    <div class="container py-4">
    <div class="form-style">
      <h1>ARMY HOSPITAL</h1>
      <h2>Request for Laboratory Examination</h2>

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
    </div>
    </main>
  </body>
</html>
