<?php
    require_once '../../core/initfromMedicalReportInner.php';
    $nic = $_SESSION['nic'];
    $nature = $_POST['nature'];
    $hospital = $_POST['hospital'];
    $inout = $_POST['inout'];
    $dates = $_POST['dates'];

    $hospitalTreatments = new HospitalTreatments($nic, $nature, $hospital, $inout, $dates);
    $serializedHospitalTreatments = serialize($hospitalTreatments);

    $_SESSION['serializedHospitalTreatments'] = $serializedHospitalTreatments;

    header("Location: ../medicalReportForm3.php")
 ?>
