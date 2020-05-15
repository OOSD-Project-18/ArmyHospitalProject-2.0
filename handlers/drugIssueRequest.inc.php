<?php
require_once('../core/initfromhandlers.php');
$nic = $_SESSION['nic'];
$doa = $_SESSION['doa'];
$prescription = $_POST['prescription'];

$prescriptionObj = new Prescription($nic, $prescription);
$serializedPrescription = serialize($prescriptionObj);

$patientObj = new PatientContr();
$patientObj->addPrescription($nic, $doa, $serializedPrescription);


Redirect::to('../views/patientProfile.php?status=success');
