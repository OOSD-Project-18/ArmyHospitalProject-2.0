<?php
require_once('../core/initfromhandlers.php');
$doctor = $_POST['newDoctor'];
$doa = $_SESSION['doa'];
$nic = $_SESSION['nic'];
$patientController = new PatientContr();

$patientController->changeDoctor($nic, $doctor, $doa);
Redirect::to('../views/patientprofile.php');
