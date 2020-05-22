<?php
require_once '../core/initfromviews.php';
$error_msg = Input::get('error_msg');
$error_msg_pwd = Input::get('error_msg_pwd');
$user = new User();

if (!$user->isLoggedIn()) {
    Redirect::to('../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Info</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>

<body style="font-family: 'Lato',sans-serif;">
    <?php include_once('_header.php'); ?>
    <main>
        <div class="container py-4">

            <form action="../handlers/profileimg.php" method="post" enctype="multipart/form-data" class="card p-3 border border-primary">
                <h2 class="text-center">Change Profile Picture</h2>
                <hr>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="profile_img" name="profile_img" required onchange="">
                    <label class="custom-file-label text left" for="profle_img">Select img</label>
                </div>

                <br>
                <div class="text-right">
                    <input type="submit" id="submit_profileimg" name="submit_profileimg" class="btn btn-primary" value='Save changes and upload' data-toggle="tooltip" data-placement="bottom" title="Upload profile picture">
                </div>

                <?php if ($user->data()->user_imgstatus) {
                    $uid = $user->data()->user_uid;
                    $imgSource = '../staffprofileimgs/profileimg' . $uid . '.jpg' . '?rand=<?php echo rand();' ?>

                    <img src=<?php echo $imgSource ?> alt="poflile pic" width='200px' height="200px" id="profile-img-tag">
                <?php } else { ?>
                    <img src="../stylesheets/defaultprofileimg.jpg" alt="profile img" width='200px' height="200px" id="profile-img-tag">
                <?php } ?>
            </form>
        </div>
        <script>
            // Show file Name
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>
        <script type="text/javascript">
            //render selected image
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#profile-img-tag').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#profile_img").change(function() {
                readURL(this);
            });
        </script>
        <a name='updateInfo'></a>
        <div class='container py-4 mt-3'>

            <form action="../handlers/update.php" method="post" class="card p-3 border border-primary">
                <h2 class="text-center">Edit Information</h2>
                <hr>
                <?php if ($error_msg) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo ($error_msg); ?>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label for='user_first'>First Name</label>
                    <input type='text' name='user_first' value="<?php echo escape($user->data()->user_first); ?>" placeholder="First Name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for='user_last'>Last Name</label>
                    <input type='text' name='user_last' value="<?php echo escape($user->data()->user_last); ?>" placeholder="Last Name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for='user_email'>Email</label>
                    <input type='email' name='user_email' value="<?php echo escape($user->data()->user_email); ?>" placeholder="Email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for='user_mobile'>Mobile Number</label>
                    <input type='text' name='user_mobile' value="0<?php echo escape($user->data()->user_mobile); ?>" placeholder="Mobile" class="form-control" required>
                </div>
                <div class="text-right">
                    <input type="submit" value='Update' class="btn btn-primary">
                </div>
            </form>
        </div>

        <a name='changePassword'></a>
        <div class='container py-4 mt-3'>

            <form action="../handlers/updatepassword.php" method="POST" class="card p-3 border border-primary">
                <h2 class="text-center">Change Password</h2>
                <hr>
                <?php if ($error_msg_pwd) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo ($error_msg_pwd); ?>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label for='user_pwd'>Current Password</label>
                    <input type='password' name='user_pwd' id="user_pwd" class="form-control">
                </div>
                <div class="form-group">
                    <label for='user_pwd_new'>New Password</label>
                    <input type='password' name='user_pwd_new' id="user_pwd_new" class="form-control">
                </div>
                <div class="form-group">
                    <label for='password'>Confirm New Password</label>
                    <input type='password' name='user_pwd_again' id="user_pwd_again" class="form-control">
                </div>
                <div class="text-right">
                    <input type="submit" value='Change' class="btn btn-primary">
                </div>
            </form>
        </div>

        <div class="container py-1 mt-3">
            <div class="card p-3 text-center" style="color:maroon">
                <h3>Delete My Account</h3>
                <p>Once you have deleted your account there is no way of recovering..</p>
                <div>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                        Delete My Account
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete account</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    All the data will be lost and no recovery possible
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a class="btn btn-danger" href="../handlers/delete.php" role="button">Delete Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>





    </main>

</body>

</html>
