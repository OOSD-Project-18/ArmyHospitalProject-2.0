<?php
include_once '../core/initfromhandlers.php';
$nic = $_SESSION['nic']; 
$doa = $_SESSION['doa'];
$details = $_POST['details'];

$patientObj = new PatientView();
$result = $patientObj->showDetails($nic,$doa);
// print_r($result[0]['details']);
if (empty($result[0]['details'])){
  $detailsObj = new Details($nic,$details);
} else{
  $detailsObj = unserialize($result[0]['details']);
  $detailsObj->add($details);
}

$serializedDetails = serialize($detailsObj);

$patientObj = new PatientContr();
$patientObj->addDetails($nic, $doa, $serializedDetails);

Redirect::to('../views/patientProfile.php');


 ?>
