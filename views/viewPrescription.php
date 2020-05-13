<?php
require_once('../core/initfromviews.php');
$user = new User();
if (!$user->isLoggedIn()) {
    Redirect::to('../index.php');
}

$nic = $_SESSION['nic'];
// $doa = $_SESSION['doa'];
$patientObj = new PatientView();
$currentPrescription = $patientObj->showCurrentPrescription($nic);
$allPrescriptions = $patientObj->showAllPrescriptions($nic);


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Prescriptions</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>
    <?php include_once('_header.php') ?>
    <main id="main">
        <?php include_once('_sideNav.php') ?>
        <div class="container py-4">
            <div class="card p-3">
                <div class="text-center">
                    <h2>Prescriptions</h2>
                </div>
                <hr>
                <div class="form ">
                    <div class="text-center">
                        <h4>Current Prescription</h4>
                    </div>
                    <?php
                    if (empty($currentPrescription)) {
                        echo "<h6> No unissued prescriptions <h6>";
                    } else {
                        echo "<table class='table table-striped' id='prescription-table'>
                          <form action='../handlers/viewPrescription.inc.php' method='post'>
                          <thead>
                            <tr>
                              <th scope='col'>Date</th><th scope='col'>Prescripton</th><th scope='col'>Click when issued</th>
                            </tr>
                          </thead>
                          <tbody>";
                        $x = 0;
                        foreach ($currentPrescription as $result) {
                            $prescriptionObj = unserialize($result['Prescription']);
                            $_SESSION['prescription-' . $x] = $result['Prescription'];
                            $prescription = $prescriptionObj->getPrescription();
                            $date = $result['doa'];
                            echo "<tr><td>$date</td><td>$prescription</td><td><button type='submit' name='button-" . $x . "'>Issue</button></td></tr>";
                            $x++;
                        }
                        $_SESSION['x'] = $x;
                        echo ("</tbody>
                         </form>
                        </table>");
                    }

                    ?>
                    <br>

                </div>

                <hr>
                <div class="form">
                    <div class="text-center">
                        <h4>Issued Prescriptions</h4>
                    </div>

                    <table class='table table-striped' id='prescription-table'>
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col table-primary">Prescripton</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($allPrescriptions as $result) {
                                $prescriptionObj = unserialize($result['Prescription']);
                                $prescription = $prescriptionObj->getPrescription();
                                $date = $result['doa'];
                                echo "<tr><td>$date</td><td>$prescription</td></tr>";
                            }

                            ?>
                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </main>
</body>

</html>