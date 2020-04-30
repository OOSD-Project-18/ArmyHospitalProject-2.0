<?php
require_once('includes/initFromPatients.php');
$user = new User();
if (!$user->isLoggedIn()) {
    Redirect::to('../index.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lab tests</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </head>
  <body>
    <?php include('_header.php') ?>
    <main  id=main>
        <?php include('_sideNav.php') ?>
    <div class="container py-4">
      <div class="card-deck">
        <div class="card p-3 text-center">
          <!-- <div class="card-header"> -->
            <h4 class='card-title'> Request lab tests </h4>
            <hr>
            <a class='card-link' href="labTests/labTestsRequests/ABPMonitoringRequest.php">ABP Monitoring</a>
            <a class='card-link' href="labTests/labTestsRequests/basicECGRequest.php">Basic ECG</a>
            <a class='card-link' href="labTests/labTestsRequests/generalLabTestRequest.php">General Lab Test</a>
            <a class='card-link' href="labTests/labTestsRequests/histopathologyRequest.php">Histopathology</a>
            <a class='card-link' href="labTests/labTestsRequests/holterMonitoringRequest.php">Holter Monitoring</a>
            <a class='card-link' href="labTests/labTestsRequests/immunoassayRequest.php">Immunoassay</a>
            <a class='card-link' href="labTests/labTestsRequests/xRayRequest.php">X-Ray</a>
        </div>
        <div class="card p-3 text-center">
          <h4 class='card-title'> View requested lab tests </h4>
          <hr>
          <a class='card-link' href="labTests/requestDisplay/ABPMonitoringRequestDisplay.php">ABP Monitoring</a>
          <a class='card-link' href="labTests/requestDisplay/basicECGRequestDisplay.php">Basic ECG</a>
          <a class='card-link' href="labTests/requestDisplay/generalLabTestRequestDisplay.php">General Lab Test</a>
          <a class='card-link' href="labTests/requestDisplay/histopathologyRequestDisplay.php">Histopathology</a>
          <a class='card-link' href="labTests/requestDisplay/holterMonitoringRequestDisplay.php">Holter Monitoring</a>
          <a class='card-link' href="labTests/requestDisplay/immunoassayRequestDisplay.php">Immunoassay</a>
          <a class='card-link' href="labTests/requestDisplay/xRayRequestDisplay.php">X-Ray</a>
        </div>
      <div class="card p-3 text-center">
        <h4>Upload Lab Test Report</h4>
        

      </div>



      </div>





  </body>
</html>