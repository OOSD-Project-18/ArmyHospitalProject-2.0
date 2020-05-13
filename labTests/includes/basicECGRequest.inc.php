<?php
  require_once '../../core/initfromLabTestsInner.php';

  $nic = $_SESSION['nic'];
  $dateOfRequest = $_POST['dateOfRequest'];
  $force_id = $_SESSION['force_id'];
  $rank = $_SESSION['rank'];
  $first_name = $_SESSION['first_name'];
  $last_name = $_SESSION['last_name'];
  $unit = $_SESSION['unit'];
  $age = $_POST['age'];
  $gender = $_SESSION['gender'];
  $ward_no = $_POST['ward_no'];
  $ward = $_POST['ward'];
  $conditions = $_POST['conditions'];
  $leads = $_POST['leads'];
  $shortHistory = $_POST['shortHistory'];
  $consMOName = $_SESSION['consMOName'];
  $consMOID = $_SESSION['consMOID'];

  $basicECGRequestObject = new BasicECGRequest($nic, $dateOfRequest, $force_id, $rank, $first_name, $last_name, $unit, $age, $gender, $ward_no, $ward, $conditions, $leads, $shortHistory, $consMOName, $consMOID);

  $serializedBasicECGRequest = serialize($basicECGRequestObject);

  $patientContrObject = new PatientContr();

  $patientContrObject->createBasicECGRequest($nic, $serializedBasicECGRequest);

  echo "successful!";
?>
