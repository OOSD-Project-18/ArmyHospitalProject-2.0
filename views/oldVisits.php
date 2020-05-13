<?php
require_once('../core/initfromviews.php');
$user = new User();
if (!$user->isLoggedIn()) {
    Redirect::to('../index.php');
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Visit History</title>
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


     </section-->
            <form class="card p-3">
                <div class="text-center">
                    <h2>Visit History</h2>
                </div>
                <hr>


                <table class='table table-hover table-bordered border border-primary'>
                    <thead class="table-primary">

                        <tr>
                            <th scope="col">Date of Admission</th>
                            <th scope="col">Reason for admission</th>
                            <th>Medical History</th>
                            <th scope="col">Current medications</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Ward</th>
                            <th scope="col">Details by the Doctor</th>
                            <th scope="col">Date of Discharge</th>
                            <th scope="col">Summary upon Discharge</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $nic = $_SESSION['nic'];
                        $patientView = new PatientView();
                        $results = $patientView->showAllVisits($nic);

                        foreach ($results as $result) {
                            $doa = $result['doa'];
                            $reason = $result['reason'];
                            $history = $result['history'];
                            $cm = $result['cm'];
                            $doctor = $result['doctor'];
                            $ward = $result['ward'];
                            $dischargeDate = $result['discharge_date'];
                            $dischargeSummary = $result['discharge_summary'];
                            $detailsObj = unserialize($result['details']);
                            if (!empty($detailsObj)) {
                                $details = $detailsObj->getDetails();
                            } else {
                                $details = null;
                            }
                            echo "<tr>
            <td>$doa</td><td>$reason</td><td>$history</td><td>$cm</td><td>$doctor</td><td>$ward</td><td>$details</td><td>$dischargeDate</td><td>$dischargeSummary</td>
          </tr>";
                        }
                        ?>

                    </tbody>

                </table>
                
            </form>
    </main>

</body>

</html>