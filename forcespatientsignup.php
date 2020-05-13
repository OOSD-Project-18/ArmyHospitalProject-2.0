<?php include_once 'includes/class-autoload.inc.php';
include_once "includes/class-autoload.inc.php";
require_once 'includes/initFromPatients.php';
//session_start(); This is done by above file
$user=new User();
if(!$user->isLoggedIn()){
    Redirect::to('../index.php');
}?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registration for patients of the Armed Forces</title>
    <!-- <link rel="stylesheet" href="css/signup.css"> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </head>
  <body>
    <?php include('_header.php');?>

    <main id="main">
        <?php include('../stylesheets/sidebar.html') ?>
        <div id="mySidebar" class="sidebar shadow text-center">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <?php if ($data->user_imgstatus) {
                $uid=$data->user_uid;
                $imgSource='../staffprofileimgs/profileimg'.$uid.'.jpg'.'?rand=<?php echo rand();' ?>

                <img src=<?php echo $imgSource ?> alt="poflile pic" width='250px' height="250px">
            <?php } else { ?>
                <img src="../stylesheets/defaultprofileimg.jpg" alt="profile img" width='250px' height="250px">
            <?php } ?>

            <!--add profile img-->
            <p style="font-size: 25px;font-weight:bold;"><?php echo escape($data->user_first) . " " . escape($data->user_last); ?></p>
            <p style="color: gray"><?php echo escape($data->user_uid); ?></p>
            <p><?php echo escape($data->user_email);?></p>
            <p>+94-<?php echo escape($data->user_mobile);?></p>



        </div>

        <div>
            <button class="openbtn" onclick="openNav()">☰</button>
        </div>




<div class="container">


    <div class="form">
    <form action="includes/forcespatientssignup.inc.php" class="card p-3" method="post">
      <div class="text-center">
        <h2>Registration for patients of the Armed Forces</h2>
        <hr>
      </div>
          <div class="form-row">
          <div class="col">
        <input type="text" name="force" class="form-control" placeholder="Force"><br>
      </div>
  <div class="col">
        <input type="text" name="force_id" class="form-control" placeholder="Force ID"><br>
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
        <input type="text" name="regiment" class="form-control" placeholder="Regiment"><br>
      </div>
  <div class="col">
        <input type="text" name="rank" class="form-control" placeholder="Rank"><br>
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
  </body>
</html>
