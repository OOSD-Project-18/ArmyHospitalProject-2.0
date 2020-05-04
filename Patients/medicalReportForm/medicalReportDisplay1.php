<?php
  // session_start();
  include_once "../includes/class-autoload.inc.php";
  include_once "classes/personalHistory.class.php";
  require_once '../includes/initFromPatients.php';
  //session_start(); This is done by above file
  $user=new User();
  if(!$user->isLoggedIn()){
      Redirect::to('../index.php');
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Medical Report</title>
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/medicalReport.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </head>
  <body>
    <?php include('_header.med.php') ?>
    <main  id=main>
        <?php include('_sideNav.med.php') ?>
    <div class="container py-4">
    <?php
      $nic = "982753195v"; // should get this from a session SplObjectStorage

      $patientViewObject = new PatientView();
      $results = $patientViewObject->showMedicalReport($nic);

      $force_id = $results[0]['force_id'];
      $date = $results[0]['date'];

      $serializedPersonalHistory = $results[0]['serializedPersonalHistory'];
      $personalHistoryObject = unserialize($serializedPersonalHistory);
      $illnessDetails = $personalHistoryObject->getIllnessDetails();

    ?>

    <div class="medical-report">
      <h1>Medical Report</h1><br><br>
      <div class="section"><span>1</span>Service No and NIC</div>
      <div class="inner-wrap">
        <label>Service No : </label> <?php echo $force_id; ?><br><br>
        <label>NIC: </label> <?php echo $nic; ?><br><br>
      </div>

      <div class="section"><span>2</span>Date</div>
      <div class="inner-wrap">
        <?php echo $date; ?><br><br>
      </div>

      <div class="section"><span>3</span>Personal History</div>
      <div class="inner-wrap">
        <div class="table">
          <table>
            <tr>
              <th>Illness</th> <th>Yes/No</th><th>If "Yes", at what age?</th>
            </tr>
            <tr> <td>Bronchitis</td><td><?php echo $illnessDetails['bronchitis'][0]; ?></td><td><?php echo $illnessDetails['bronchitis'][1]; ?></td></tr>
          <tr> <td>Asthma</td><td><?php echo $illnessDetails['asthma'][0]; ?></td><td><?php echo $illnessDetails['asthma'][1]; ?></td></tr>
            <tr> <td>Tuberculosis</td><td><?php echo $illnessDetails['tb'][0]; ?></td><td><?php echo $illnessDetails['tb'][1]; ?></td></tr>
            <tr> <td>Fits</td><td><?php echo $illnessDetails['fits'][0]; ?></td><td><?php echo $illnessDetails['fits'][1]; ?></td></tr>
            <tr> <td>Gastric Disorders</td><td><?php echo $illnessDetails['gastric'][0]; ?></td><td><?php echo $illnessDetails['gastric'][1]; ?></td></tr>
            <tr> <td>Rheumatism</td><td> <?php echo $illnessDetails['rheumatism'][0]; ?></td><td><?php echo $illnessDetails['rheumatism'][1]; ?></td></tr>
            <tr> <td>Nervous Breakdown</td><td><?php echo $illnessDetails['nervous'][0]; ?></td><td><?php echo $illnessDetails['nervous'][1]; ?></td></tr>
            <tr> <td>Mental Illness</td><td> <?php echo $illnessDetails['mental'][0]; ?></td><td><?php echo $illnessDetails['mental'][1]; ?></td></tr>
            <tr> <td>Filariasis</td><td><?php echo $illnessDetails['filariasis'][0]; ?></td><td><?php echo $illnessDetails['filariasis'][1]; ?></td></tr>
            <tr> <td>Any Other Illness</td><td><?php echo $illnessDetails['other'][0]; ?></td><td><?php echo $illnessDetails['other'][1]; ?></td></tr>
          </table><br><br>
        </div>

        <?php

          if ($illnessDetails['other'][2] != ''){
            echo "<label>Other Illness :</label>".$illnessDetails['other'][2]."<br><br>";
          }
        ?>
        <br><br>

        <?php

          $data = $personalHistoryObject->getData();

          foreach ($data as $singleData) {
            switch ($singleData) {
              case 'ears':
                echo "<div class='section'><span>*</span></div> Have had a discharge or running from ears.<br><br>";
                break;
              case 'xray':
                $xrayData = $personalHistoryObject->getReasonForXray();
                echo "<div class='section'><span>*</span></div> Have been X-Rayed his/her chest. Reason : ".$xrayData."<br><br>";
                break;
              case 'discharged':
                echo "<div class='section'><span>*</span></div> Have been discharged as medically unfit from any bramch of the services.<br><br>";
                break;
              case 'rejected':
              echo "<div class='section'><span>*</span></div> Have been rejected as medically unfit from any branch of the services.<br><br>";
                break;
              case 'disabilitypension':
                echo "<div class='section'><span>*</span></div> Have been or is in receipt of a disability pension.<br><br>";
                break;
            }
          }

          $_SESSION['results'] = $results;
       ?>
      </div>

      <br>

     <form action="medicalReportDisplay2.php" method="post">
       <br>
       <div class="button-section">
         <button type="submit" name="next">Next</button>
       </div>
     </form>

   </div>
  </body>
</html>
