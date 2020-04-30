<?php
include_once "includes/class-autoload.inc.php";
require_once 'includes/initFromPatients.php';
//session_start(); This is done by above file
$user=new User();
if(!$user->isLoggedIn()){
    Redirect::to('../index.php');
}
$nic = $_SESSION['nic'];
$patientView = new PatientView();
$results = $patientView->showPatientInfo($nic);
$_SESSION['patientType'] = $results['type'];
$patientType = $results['type'];
$photoresults = $patientView->showProfilePic($nic, $patientType);
$photoLocation = $photoresults[0]['photo'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Patient Profile</title>
    <!--<link rel="stylesheet" href="css/patientProfile.css">-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>
    <?php include('_header.php') ?>
    <main  id=main>
        <?php include('_sideNav.php') ?>


        <div class="container py-4">
            <div class="card p-3">
                <div class="text-center">
                    <h2 class="text-cnter">
                        Patient Information
                    </h2>
                </div>
                <hr>
                <?php

                echo "<div class='text-center'>";
                if (!empty($photoLocation)) {
                    echo "<img src=" . $photoLocation . " alt='Profile pic' width='250' height='200'>";
                } else {
                    echo "<img src=profilePics/default.jpg alt='Profile pic width='250' height='200''><br>";
                }
                echo "</div>"; ?>
                <a href="uploadPhoto.php">Upload profile picture</a>
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
                        echo "<p>First Name: " . $first_name . "</p>";
                        echo "<p>Last Name: " . $last_name . "</p>";
                        echo "<p>Date of Birth: " . $dob . "</p>";
                        echo "<p>Regiment: " . $regiment . "</p>";
                        echo "<p>Rank: " . $rank . "</p>";
                        echo "<p>Height: " . $height . "</p>";
                        echo "<p>Weight: " . $weight . "</p>";
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
                        echo "<p>Force ID of family member: " . $force_id . "</p>";
                        echo "<p>Force of family member: " . $force . "</p>";
                        echo "<p>Relation to family member: " . $relation . "</p>";
                        echo "<p>First Name: " . $first_name . "</p>";
                        echo "<p>Last Name: " . $last_name . "</p>";
                        echo "<p>Date of Birth: " . $dob . "</p>";
                        echo "<p>Height: " . $height . "</p>";
                        echo "<p>Weight: " . $weight . "</p>";
                        echo "<p>Email: " . $email . "</p>";
                        echo "<p>Address: " . $address . "</p>";
                        echo "<p>Mobile: " . $mobile . "</p><br>";
                    }
                } else {
                    echo 'Unregistered patient';
                }
                ?>



            </div>

        </div>

        <?php
        //Should add coloumns for prescriptions, medical reports when the forms are made
        $visitInfo = $patientView->showCurrentVisit($nic);
        if (!empty($visitInfo)) {
            $doa = $visitInfo[0]['doa'];
            $_SESSION['doa'] = $doa;
            $reason = $visitInfo[0]['reason'];
            $history = $visitInfo[0]['history'];
            $cm = $visitInfo[0]['cm'];
            $doctor = $visitInfo[0]['doctor'];
            $ward = $visitInfo[0]['ward'];
            $discharged = $visitInfo[0]['Discharged'];
            $detailsObj = unserialize($visitInfo[0]['details']);
            $details = $detailsObj->getDetails(); ?>
            <div class="container py-1">
                <div class="card p-3 text-center">
                    <h2>Latest Visit</h2>
                    <table class="table  text-center table-bordered">
                        <thead class="thead">
                            <tr>
                                <th scope="col">Date of Admission</th>
                                <th scope="col">Reason for Admission</th>
                                <th>Medical history</th>
                                <th>Current Medications</th>
                                <th>Doctor</th>
                                <th>Ward</th>
                                <th>Details by the Doctor</th>
                                <th>Discharged</th>
                            </tr>

                            </tr>
                        </thead>
                        <tr>
                            <td><?php echo ($doa) ?></td>
                            <td><?php echo ($reason) ?></td>
                            <td><?php echo ($history) ?></td>
                            <td><?php echo ($cm) ?></td>
                            <td><?php echo ($doctor) ?></td>
                            <td><?php echo ($ward) ?></td>
                            <td><?php echo ($details) ?></td>
                            <td><?php echo ($discharged) ?></td>
                        </tr>

                    </table>


                </div>
            </div>

        <?php } else {
            echo "No Visits";
        }
        ?> </div>
        <br>
        <div class="container py-1 text-center">
            <a class="btn btn-outline-primary" href="addDetails.php" role="button">Add details to current visit</a>
            <a class="btn btn-outline-primary" href="oldVisits.php" role="button">View visit History</a>
            <a class="btn btn-outline-primary" href="medicalReportForm/medicalReportDisplay1.php" role="button">Medical Report</a>
            <a class="btn btn-outline-primary" href="drugIssueRequest.php" role="button">Issue Prescription</a>
            <a class="btn btn-outline-primary" href="viewPrescription.php" role="button">Prescriptions</a>
            <a class="btn btn-outline-primary" href="dischargeForm.php" role="button">Discharge Form</a>
            <a class="btn btn-outline-primary" href="changeDoctor.php" role="button">Change Doctor</a>
            <a class="btn btn-outline-primary" href="labtests.php" role="button">Lab Tests</a>

            <!-- Add links to prescription history, lab report history, issue drug request, discharge form -->      </div>
        <br><br><br>
    </main>
</body>

</html>
