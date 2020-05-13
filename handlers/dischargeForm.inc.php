<?php
require_once('../core/initfromhandlers.php');
$nic = $_SESSION['nic'];
$doa = $_SESSION['doa'];
$dischargeDate = $_POST['dischargeDate'];
$summary = $_POST['summary'];

$patientObj = new PatientContr();
$patientObj->addDischarge($nic, $doa, $dischargeDate, $summary);

Redirect::to('../views/patientProfile.php');


 ?>
