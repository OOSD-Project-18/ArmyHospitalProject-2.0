<?php
require_once('../core/initfromhandlers.php');
$doctor = $_POST['newDoctor'];
$doa = $_SESSION['doa'];
$nic = $_SESSION['nic'];
$patientController = new PatientContr();

$patientController->changeDoctor($nic, $doctor, $doa);

$patientView = new PatientView();
$visitInfo = $patientView->showCurrentVisit($nic);

if (!empty($visitInfo)) {$newdoctor = $visitInfo[0]['doctor'];}

if ($newdoctor == $doctor){
  Redirect::to('../views/patientprofile.php?status=success');
}
else{
  Redirect::to('../views/patientprofile.php?status=dberror');

}
