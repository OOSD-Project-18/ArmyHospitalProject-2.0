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
    <title>Drug Issue Request</title>
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
          <?php
          statusCheck::check("status");
          ?>

            <form action="../handlers/drugIssueRequest.inc.php" method="post" class="card p-3">
                <div class="text-center">
                    <h2>Drug Issue Request</h2>
                </div>
                <hr>
                <fieldset disabled>
                    <div class="form-group">
                        <label for="nic">NIC</label>
                        <?php
                        $nic = $_SESSION['nic'];
                        echo '<input type="text" id="nic" class="form-control" placeholder="' . $nic . '">';
                        ?>
                    </div>
                </fieldset>
                <label for="prescription">Prescription</label>
                <textarea id='prescription' name="prescription" rows="8" cols="80" class="form-control" required></textarea>
                <div class="form-group text-right">
                    <button type="submit" name="button" class="btn btn-primary">Submit</button>
                    <a href="patientProfile.php" role="button" class="btn btn-primary">Cancel</a>
                </div>

            </form>


        </div>

    </main>


</body>

</html>
