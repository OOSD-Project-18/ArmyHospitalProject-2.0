<?php
    require_once '../../core/initfromMedicalReportInner.php';
    $nic = $_SESSION['nic'];

    $upperLimbs = $_POST['upperLimbs'];
    $u = $_POST['u'];
    $effectUpperLimbs = $_POST['effectUpperLimbs'];
    $locomotion = $_POST['locomotion'];
    $l = $_POST['l'];
    $effectLocomotion = $_POST['effectLocomotion'];


    $upperLimbsLocomotion = new UpperLimbsLocomotion($nic, $upperLimbs, $u, $locomotion, $effectUpperLimbs, $l, $effectLocomotion);
    $serializedUpperLimbsLocomotion = serialize($upperLimbsLocomotion);

    $_SESSION['serializedUpperLimbsLocomotion'] = $serializedUpperLimbsLocomotion;

    header("Location: ../medicalReportForm8.php")
 ?>
