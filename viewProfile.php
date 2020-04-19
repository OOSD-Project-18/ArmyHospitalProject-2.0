<?php

require_once 'core/init.php';
$user_uid=$_SESSION['user_uid'];
$user = new User();

if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
} else {

    if (!$user->exists()) {
        Redirect::to(404);
    } else {
        $userNew = new User($user_uid);
        $data = $userNew->data();
       
        
        
    }
}  

?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>

    <body id='main'>

         
        <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow border-bottom border-primary ">
            <a class="navbar-brand" href="viewhome.php">
                <img src="stylesheets/Army.png" width="45" height="35" class="d-inline-block align-top" alt="">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php if ($data->user_imgstatus) {
                                $uid = $data->user_uid;
                                $imgSource = 'staffprofileimgs/profileimg' . $uid . '.jpg'.'?rand=<?php echo rand();' ?>
                                <!--only allow jpg-->
                                <!--profile pic-->
                                <img src=<?php echo $imgSource ?> width="25" height="25" class="d-inline-block align-top rounded-circle" alt="profile pic">
                            <?php } else { ?>
                                <img src="stylesheets/defaultprofileimg.jpg" width="25" height="25" class="d-inline-block align-top rounded-circle" alt="options">
                            <?php } ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="viewhome.php"> HOME</a>
                            <a class="dropdown-item" href="viewupdate.php">Edit profile </a>
                            <a class="dropdown-item" href="viewupdate.php">Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="controllerlogout.php">Log out</a>
                        </div>
                    </li>
                </ul>
            </div>
    </header>
    

    <div class="container">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div>
                        <?php if ($data->user_imgstatus) { 
                            $uid=$data->user_uid;
                            $imgSource='staffprofileimgs/profileimg'.$uid.'.jpg'.'?rand=<?php echo rand();' ?>
                            
                            <img src=<?php echo $imgSource ?> alt="poflile pic" width='250px' height="250px">
                        <?php } else { ?>
                            <img src="stylesheets/defaultprofileimg.jpg" alt="profile img" width='250px' height="250px">
                        <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div >
                                    <h5>
                                    <?php
                                        echo($data->user_first." ".$data->user_last);
                                    ?>    
                                    </h5>
                                    <h6>
                                    <?php
                                        echo("User group Number: ".$data->user_group);
                                    ?> 
                                    </h6>
                                    
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Activity</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo($data->user_uid);?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p><?php echo($data->user_first." ". $data->user_last);?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><p><?php echo($data->user_email);?></p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><p><?php echo($data->user_mobile);?></p></p>
                                            </div>
                                        </div>
                                        
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date of Joining</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo($data->user_joined);?></p>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
    
        




        
    </body>
    </html>