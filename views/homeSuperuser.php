<?php
require_once '../core/initfromviews.php';
$patientError = Input::get('patientError');
$user = new SuperUser();

if (!$user->isLoggedIn()) {
    Redirect::to('../index.php');
} else {

    if (!$user->exists()) {
        Redirect::to('../includes/Errors/404.php');
    } else {
        $data = $user->data();
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>

    <body id='main'>

        <?php include('_header.php'); ?>

        <main>
            <?php include('../stylesheets/sidebar.html') ?>
            <div id="mySidebar" class="sidebar shadow text-center">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                <?php if ($data->user_imgstatus) {
                    $uid = $data->user_uid;
                    $imgSource = '../staffprofileimgs/profileimg' . $uid . '.jpg' . '?rand=<?php echo rand();' ?>

                    <img src=<?php echo $imgSource ?> alt="poflile pic" width='250px' height="250px">
                <?php } else { ?>
                    <img src="../stylesheets/defaultprofileimg.jpg" alt="profile img" width='250px' height="250px">
                <?php } ?>
                <p style="font-size: 25px;font-weight:bold;"><?php echo escape($data->user_first) . " " . escape($data->user_last); ?></p>
                <p style="color: gray"><?php echo escape($data->user_uid); ?></p>
                <p><?php echo escape($data->user_email); ?></p>
                <p>+94-<?php echo escape($data->user_mobile); ?></p>



            </div>

            <div>
                <button class="openbtn" onclick="openNav()">☰</button>
            </div>
            <div class="container py-4 text-center">
              <?php
              if(Hash::verify('admin123', $data->user_pwd)) { echo '

            <div class="alert alert-danger" role="alert">
              Password has not been changed from default. <a href="update.php#changePassword" class="alert-link">Click here</a> to enter a new password.
            </div>';
          } if ($data->user_first == 'No record found' || $data->user_last == 'No record found' || $data->user_email == 'No record found') { echo '

            <div class="alert alert-warning" role="alert">
              User information has not been entered. <a href="update.php#updateInfo" class="alert-link">Click here</a> to enter information.
            </div>';
          }


          ?>
          </div>


            <div class="container py-4" >
              <div class="card-deck">
                <div class="card p-3">
                  <div class="text-center">
                      <h4>New Users waiting for verification</h4>
                  </div>
                  <hr>
                  <?php
                  $superUser = new SuperUser();
                  $allRecords = $superUser->getAllRecords();
                  if (empty($allRecords)){
                    echo '<div class="text-center"><div class="alert alert-primary" role="alert">
                          No unverified users
                          </div></div>';
                  } else {


                   ?>
                    <table class="table table-striped">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">NIC</th><th scope="col">Full Name</th><th scope="col">E-mail</th><th scope="col">Mobile</th><th scope="col">Date and Time of registration</th><th>Verify</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php

                            foreach($allRecords as $record){
                                $user_uid = $record->user_uid;
                                $firstName = $record->user_first;
                                $lastName = $record->user_last;
                                $name = $firstName. " " . $lastName;
                                $email = $record->user_email;
                                $mobile = $record->user_mobile;
                                $userjoined = $record->user_joined;

                              echo "<tr><td>$user_uid</td><td>$name</td><td>$email</td><td>$mobile</td><td>$userjoined</td>
                                    <td><form action='../handlers/verifyUser.inc.php' method=post><button type='submit' class='btn btn-success' name='verify-button'>Verify</button><input type='hidden' name='user_uid' value=$user_uid></form></td></tr>";


                            }
                          }

                         ?>

                       </tbody>
                    </table>

                  </div>
              </div>
              <br><br>






                <div class="card-deck">
                    <div class="card p-3 text-center shadow-sm">
                        <h3>Search Patient</h3>
                        <hr>
                        <?php if ($patientError) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo ($patientError); ?>
                            </div>
                        <?php } ?>

                        <form action="../functions/searchbar.php" method="post">
                            <input type="text" id="search" placeholder="Enter Patient's NIC Number" name="search" class="form-control mr-sm-2" required>
                            <br>
                            <input type="submit" id="submit" name="submit" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="bottom" title="Search ID">
                        </form>

                    </div>

                    <div class="card p-3 text-center shadow-sm ">
                        <h3>Search Staff</h3>
                        <hr>

                        <form action="profile.php" method="post">
                            <input type="text" id="searched_id" placeholder="Enter NIC of the Staff Member" name="searched_id" class="form-control mr-sm-2" required>
                            <br>
                            <input type="submit" id="submit" name="submit" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="bottom" title="Search ID">
                        </form>

                    </div>
                    <div class="card p-3 text-center shadow-sm">
                        <form action="../handlers/registerPatientSelCat.php" method="post">
                            <h3>Register Patient</h3>
                            <hr>
                            <p>Select Category</p>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id='officer' name="type" value="forces">
                                <label for="officer" id='white-text' class="form-check-label">Officer </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id='soldier' name="type" value="forces">
                                <label for="Soldier" id='white-text' class="form-check-label">Soldier </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id='family' name="type" value="family">
                                <label for="family" id='white-text' class="form-check-label">Family </label>
                            </div>
                            <div>
                                <button class="form-control btn btn-outline-primary" type="submit" name="next" data-toggle="tooltip" data-placement="bottom" title="Next Page">Next</button><br>
                            </div>

                        </form>
                    </div>

                </div>
            </div>


            <div class="container py-1 mt-3" style="width:30%">

            </div>

        </main>

    </body>

    </html>




<?php

}
