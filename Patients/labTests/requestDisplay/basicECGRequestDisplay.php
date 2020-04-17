<?php
  session_start();
  include_once "../../classes/patientview.class.php";
  include_once "../classes/basicECGRequest.class.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Basci ECG Request</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../css/labTestRequests.css">
  </head>
  <body>
    <div class="form-style">
      <h1>CARDIAC INVESTIGATION UNIT</h1>
      <h2>Basic ECG Request</h2>
      <?php
        $nic = '982753295V';  // this should be given by a session object
        $patientViewObject = new PatientView();

        $results = $patientViewObject->showLabTestsRequests($nic);

        $serializedBasicECGRequest= $results[0]['serializedBasicECGRequest'];

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

  </body>
</html>
