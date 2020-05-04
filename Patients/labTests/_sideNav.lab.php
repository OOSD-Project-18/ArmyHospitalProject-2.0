<?php
include_once "../../includes/class-autoload.inc.php";

$nic = $_SESSION['nic'];
$results = $_SESSION['info'];
$patientType = $results['type'];
$photoLocation = $_SESSION['photoLocation'];
$photoLocation = "../../" . $photoLocation;
?>


    <?php include('../../css/sidebar.html') ?>


    <div id="mySidebar1" class="sidebar1 text-left border-right border-primary">
        <a href="../../patientProfile.php">Profile</a>
        <a href="../../addDetails.php">Edit Current Visit</a>
        <a href="../../oldVisits.php">View Visit History</a>
        <a href="../../medicalReportForm/medicalReportDisplay1.php">Medical Report</a>
        <a href="../../drugIssueRequest.php">Issue Prescription</a>
        <a href="../../viewPrescription.php">Prescriptions</a>
        <a href="../../dischargeForm.php">Discharge Form</a>
        <a href="../../changeDoctor.php">Change Doctor</a>
        <a href="../../labtests.php">Lab Tests</a>
    </div>


            <div id="mySidebar" class="sidebar shadow text-center">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                <?php

                echo "<div class='text-center'>";
                if (!empty($photoLocation)) {
                    echo "<img src=" . $photoLocation . " alt='Profile pic' width='250px' height='250px'>";
                } else {
                    echo "<img src=profilePics/default.jpg alt='Profile pic width='250px' height='250px''><br>";
                }
                echo "<br><br></div>"; ?>

                <?php if (!empty($results[0])) {
                    if ($results['type'] == 'force') {
                        $force_id = $results[0]['force_id'];
                        $force = $results[0]['force'];
                        $first_name = $results[0]['first_name'];
                        $last_name = $results[0]['last_name'];
                        $regiment = $results[0]['regiment'];
                        $rank = $results[0]['rank'];
                        $email = $results[0]['email'];
                        $dob = $results[0]['date_of_birth'];
                        $height = $results[0]['height'];
                        $weight = $results[0]['weight'];
                        $address = $results[0]['address'];
                        $mobile = $results[0]['mobile'];

                        echo "<p>NIC: " . $nic . "</p>";
                        echo "<p>Force ID: " . $force_id . "</p>";
                        echo "<p>Force: " . $force . "</p>";
                        echo "<p>Name: " . $first_name ." " . $last_name . "</p>";
                        echo "<p>Last Name: " . $last_name . "</p>";
                        echo "<p>Date of Birth: " . $dob . "</p>";
                        echo "<p>Email: " . $email . "</p>";
                        echo "<p>Address: " . $address . "</p>";
                        echo "<p>Mobile: " . $mobile . "</p><br>";
                    } else if ($results['type'] == 'family') {
                        $force_id = $results[0]['force_id'];
                        $force = $results[0]['force'];
                        $first_name = $results[0]['first_name'];
                        $last_name = $results[0]['last_name'];
                        $relation = $results[0]['relation'];
                        $email = $results[0]['email'];
                        $dob = $results[0]['date_of_birth'];
                        $height = $results[0]['height'];
                        $weight = $results[0]['weight'];
                        $address = $results[0]['address'];
                        $mobile = $results[0]['mobile'];

                        echo "<p>NIC: " . $nic . "</p>";
                        echo "<p>Force: Civillian </p>";
                        echo "<p>Name: " . $first_name ." " . $last_name . "</p>";
                        echo "<p>Date of Birth: " . $dob . "</p>";
                        echo "<p>Email: " . $email . "</p>";
                        echo "<p>Address: " . $address . "</p>";
                        echo "<p>Mobile: " . $mobile . "</p><br>";
                    }
                }
                ?>




            </div>

            <div>
                <button class="openbtn" onclick="openNav()">☰</button>
            </div>
