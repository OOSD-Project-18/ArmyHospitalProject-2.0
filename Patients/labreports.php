<?php
include_once "includes/class-autoload.inc.php";
require_once('includes/initFromPatients.php');

$user = new User();
if (!$user->isLoggedIn()) {
    Redirect::to('../index.php');
}
$nic = $_SESSION['nic'];
$patientView = new PatientView();
$reports = $patientView->showAllLabReports($nic);
// print_r($reports);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Lab Reports</title>
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
            <h4>X-Ray</h4>
            <hr>
            <?php
            $date = null;
            foreach ($reports as $report) {
              if ($report['testType'] == "xRay"){
                $date = $report['day'];
                $id = $report['id'];
                echo "<a href='reportImage.php?id=".$id."'>".$date."</a><br>";
              }
            }

            if (!isset($date)) {echo "No records found";}
            ?>
        </div>


        <div class="card p-3 text-center">
            <h4>Basic ECG</h4>
            <hr>
            <?php
            $date = null;
            foreach ($reports as $report) {
              if ($report['testType'] == "ECG"){
                $date = $report['day'];
                $id = $report['id'];
                echo "<a href='reportImage.php?id=".$id."'>".$date."</a><br>";
              }
            }
            if (!isset($date)) {echo "No records found";}
            ?>
        </div>

        <div class="card p-3 text-center">
            <h4>General Lab Test</h4>
            <hr>
            <?php
            $date = null;
            foreach ($reports as $report) {
              if ($report['testType'] == "general"){
                $date = $report['day'];
                $id = $report['id'];
                echo "<a href='reportImage.php?id=".$id."'>".$date."</a><br>";
              }
            }
            if (!isset($date)) {echo "No records found";}

            ?>
        </div>
      </div>

      <br><br><br><br>
      <div class="card-deck">

        <div class="card p-3 text-center">
            <h4>Histopathology</h4>
            <hr>
            <?php
            $date = null;
            foreach ($reports as $report) {
              if ($report['testType'] == "histopathology"){
                $date = $report['day'];
                $id = $report['id'];
                echo "<a href='reportImage.php?id=".$id."'>".$date."</a><br>";
              }
            }
            if (!isset($date)) {echo "No records found";}
            ?>
        </div>


        <div class="card p-3 text-center">
            <h4>Holter Monitoring</h4>
            <hr>
            <?php
            $date = null;
            foreach ($reports as $report) {
              if ($report['testType'] == "holterMonitoring"){
                $date = $report['day'];
                $id = $report['id'];
                echo "<a href='reportImage.php?id=".$id."'>".$date."</a><br>";
              }
            }
            if (!isset($date)) {echo "No records found";}
            ?>
        </div>

        <div class="card p-3 text-center">
            <h4>Immunoassay</h4>
            <hr>
            <?php
            $date = null;
            foreach ($reports as $report) {
              if ($report['testType'] == "immunoassay"){
                $date = $report['day'];
                $id = $report['id'];
                echo "<a href='reportImage.php?id=".$id."'>".$date."</a><br>";
              }
            }
            if (!isset($date)) {echo "No records found";}
            ?>
        </div>


        <div class="card p-3 text-center">
            <h4>ABP Monitoring</h4>
            <hr>
            <?php
            $date = null;
            foreach ($reports as $report) {
              if ($report['testType'] == "ABP"){
                $date = $report['day'];
                $id = $report['id'];
                echo "<a href='reportImage.php?id=".$id."'>".$date."</a><br>";
              }
            }
            if (!isset($date)) {echo "No records found";}
            ?>
        </div>

      </div>

      </div>
  </body>
</html>
