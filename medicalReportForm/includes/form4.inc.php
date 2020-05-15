<?php
    require_once '../../core/initfromMedicalReportInner.php';
    $nic = $_SESSION['nic'];
    $summary = $_POST['summary'];


    $_SESSION['summary'] = $summary;

    header("Location: ../medicalReportForm5.php")
 ?>
