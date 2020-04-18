<?php
require_once 'core/init.php';
$error_msg = Input::get('error_msg');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="stylesheets/login.css" rel="stylesheet">

</head>

<body>
    <header>
        <div class="container" align='center'>
            <img src="stylesheets/Army.png" alt="Logo" class="img-fluid w-25">
        </div>
    </header>

    <body>
        <div class="container py-4 text-center " style="width: 40%">
            <div class="card p-3 text-left">
                <form name="register" action="controllerregister.php" method="POST">
                    <div class="text-center">
                        <h1>Register</h1>
                    </div>
                    <?php if ($error_msg) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo ($error_msg); ?>
                        </div>
                    <?php } ?>

                    <hr>
                    <div class="form-group">
                        <label for="user_first">First Name</label>
                        <input type="text" name="user_first" id="user_first" class='form-control' value="<?php echo escape(Input::get('user_first')); ?>" autocomplete="off" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label for="user_last">Last Name</label>
                        <input type="text" name="user_last" id="user_last" class='form-control' value="<?php echo escape(Input::get('user_last')); ?>" autocomplete="off" placeholder="Last Name" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="user_uid">National Identity Number</label>
                            <input type="text" name="user_uid" id="user_uid" class='form-control' value="<?php echo escape(Input::get('user_uid')); ?>" autocomplete="off" placeholder="NIC Number" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="user_mobile">Mobile Number</label>
                            <input type="text" name="user_mobile" id="user_mobile" class='form-control' value="<?php echo escape(Input::get('user_mobile')); ?>" autocomplete="off" placeholder="Mobile Number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_email">Email Address</label>
                        <input type="email" name="user_email" id="user_email" class='form-control' value="<?php echo escape(Input::get('user_email')); ?>" autocomplete="off" placeholder="Email" required>
                    </div>

                    <div class="form-group ">

                        <label for="user_group">Select Category</label>
                        <select class="form-control" name='user_group' id='user_group' required>
                            <option value="1">Doctor</option>
                            <option value="2">Nurse</option>
                            <option value="3">Admission Officer</option>
                            <option value="4">Lab Staff</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user_pwd">Password</label>
                        <input type="password" name="user_pwd" class='form-control' id="user_pwd" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="user_pwd_again">Confirm Password</label>
                        <input type="password" name="user_pwd_again" class='form-control' id="user_pwd_again" placeholder="Confirm Password" required>
                    </div>

                    <input type="hidden" name="token" value="<?php echo  Token::generate(); ?>">
                    <br>
                    <div class="">
                        <input type='submit' class="btn btn-primary" value="Register">
                    </div>
                </form>
            </div>
        </div>
        <br>

    </body>

</body>

</html>