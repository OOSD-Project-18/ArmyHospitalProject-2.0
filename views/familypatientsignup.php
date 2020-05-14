<?php
require_once('../core/initfromviews.php');
$user = new User();
if (!$user->isLoggedIn()) {
    Redirect::to('../index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registration for patients of family members of military personnel</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>

    <?php include('_header.php'); ?>

    <main id="main">
        
        <div class="container py-3">

            <form action="../handlers/familypatientsignup.inc.php" method="post" class="card p-3">
                <div class="text-center">
                    <h2>Registration for patients of family members of military personnel</h2>
                    <hr>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="force" class="form-control" placeholder="Force of family member"><br>
                    </div>
                    <div class="col">
                        <!--Put a dropdown menu with the list of forces -->
                        <input type="text" name="force_id" class="form-control" placeholder='Force ID of family member'><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">

                        <input type="text" name='relation' class="form-control" placeholder='Relationship to family member'><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="first" class="form-control" placeholder="First Name"><br>
                    </div>
                    <div class="col">
                        <input type="text" name="last" class="form-control" placeholder="Last Name"><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="nic" class="form-control" placeholder="NIC"><br>
                    </div>
                    <div class="col">
                        <input type="date" name="dob" class="form-control" placeholder="Date of Birth"><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="email" class="form-control" placeholder="E-mail"><br>
                    </div>
                    <div class="col">
                        <input type="text" name="address" class="form-control" placeholder="Address"><br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="height" class="form-control" placeholder="Height"><br>
                    </div>
                    <div class="col">
                        <input type="text" name="weight" class="form-control" placeholder="Weight"><br>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <input type="text" name="mobile" class="form-control" placeholder="Mobile"><br>
                    </div>
                    <div class="col">
                        <input type="text" name="gender" class="form-control" placeholder="Gender"><br>
                    </div>
                </div>


                <button type="submit" name="submit" class="btn btn-primary">Register</button><br>
            </form>

            <?php
            statusCheck::check("signup");
            ?>
        </div>
        </div>



</body>

</html>