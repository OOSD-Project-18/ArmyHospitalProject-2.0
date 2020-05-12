<?php
  //session_start();
  include_once "../../classes/patientview.class.php";
  include_once "../classes/basicECGRequest.class.php";
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
    <title>Basci ECG Request</title>
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

        $serializedBasicECGRequest= $results[0]['serializedBasicECGRequest'];
    
        if (empty($serializedBasicECGRequest)) {
          header("Location: ../noRecords.php");
        }
      ?>
  <?php include('../_header.lab.php') ?>
    <main  id=main>
        <?php include('../_sideNav.lab.php') ?>
    <div class="container py-4">
    <div class="form-style">
      <h1>CARDIAC INVESTIGATION UNIT</h1>
      <h2>Basic ECG Request</h2>
      <?php
        $basicECGRequestObject = unserialize($serializedBasicECGRequest);

        echo '<div class="section"><span>1</span>Date</div>
        <div class="inner-wrap">
          '.$basicECGRequestObject->getProperty('dateOfRequest').'
        </div>
        <br><br>';

        echo '<div class="section"><span>2</span>Personal Info</div>
        <div class="inner-wrap">
            <label>Service No : </label>'.$basicECGRequestObject->getProperty('force_id').'<br><br><label>NIC : </label>'.$basicECGRequestObject->getProperty('nic').'<br><br><label>Rank : </label>'.$basicECGRequestObject->getProperty('rank').'
            <br><br><label>Name : </label>'.$basicECGRequestObject->getProperty('first_name').' '.$basicECGRequestObject->getProperty('last_name').'
            <br><br><label>Unit : </label>'.$basicECGRequestObject->getProperty('unit').'<br>


          <br><label>Age : </label>'.$basicECGRequestObject->getProperty('age').'<br>


          <br><label>Gender : </label>'.$basicECGRequestObject->getProperty('gender').'<br>


        </div><br><br>';

      ?>
      <div class="section"><span>3</span>Medical Info</div>
      <div class="inner-wrap">
          <?php
            echo "<label>Ward No : </label>".$basicECGRequestObject->getProperty('ward_no')."<br><br>
            <label>Ward : </label>".$basicECGRequestObject->getProperty('ward')."<br><br>";

            for ($i=0; $i < count($basicECGRequestObject->getProperty('conditions')) ; $i++) {
              echo "<div class='section'><span>*</span></div><b>".($basicECGRequestObject->getProperty('conditions'))[$i]."</b><br><br>";
            }
            echo "<br>";
            for ($i=0; $i < count($basicECGRequestObject->getProperty('leads')) ; $i++) {
              if ($basicECGRequestObject->getProperty('leads')[$i] != "") {
                echo "<div class='section'><span>*</span></div><b>".($basicECGRequestObject->getProperty('leads'))[$i]."</b><br><br>";
              }
            }


            echo "<br><label>Short History of Case : </label>".$basicECGRequestObject->getProperty('shortHistory')."<br><br><br>";
          ?>
      </div><br><br>

      <div class="section"><span>4</span>Doctor's Info</div>
      <div class="inner-wrap">
        <?php

          echo "<label>Name of Consultant/MO : </label>".$basicECGRequestObject->getProperty('consMOName')."<br><br><label> NIC of Consultant/MO : </label>".$basicECGRequestObject->getProperty('consMOID');

        ?>

      </div>

    </div>
    </div>
    </main>

  </body>
</html>
