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
        if (!$userNew->exists()) {
            Redirect::to(404);
        }else{
            $data1 = $userNew->data();
        }
       
        
        
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

    <body id='main' style="width=75%">

         
    <?php include('_header.php');?>
    
    

    <div class="container" style="margin-top:3%;">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div>
                        <?php if ($data1->user_imgstatus) { 
                            $uid=$data1->user_uid;
                            $imgSource='staffprofileimgs/profileimg'.$uid.'.jpg'.'?rand=<?php echo rand();' ?>
                            
                            <img src=<?php echo $imgSource ?> alt="poflile pic" width='250px' height="250px">
                        <?php } else { ?>
                            <img src="stylesheets/defaultprofileimg.jpg" alt="profile img" width='250px' height="250px">
                        <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding:5%;">
                        <div >
                                    <h5>
                                    <?php
                                        echo($data1->user_first." ".$data1->user_last);
                                    ?> 
                                    </h5>   
                                    <br>
                                    <h6>
                                    <?php
                                        $group_num=$data1->user_group;
                                        if($group_num==1){
                                            echo("User group : Doctor");
                                        }
                                        if($group_num==2){
                                            echo("User group : Nurse");
                                        }
                                        if($group_num==3){
                                            echo("User group : Admission Officer");
                                        }
                                        if($group_num==4){
                                            echo("User group : Lab staff");
                                        }
                                           
                                    ?> 
                                    </h6>
                </div>                    
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
                    
                
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8" style="padding:5%;">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>User Id</p>
                                            </div>
                                            <div class="col-md-6 text-primary">
                                                <p><?php echo($data1->user_uid);?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Name</p>
                                            </div>
                                            <div class="col-md-6 text-primary">
                                            <p><?php echo($data1->user_first." ". $data1->user_last);?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Email</p>
                                            </div>
                                            <div class="col-md-6 text-primary">
                                                <p><?php echo($data1->user_email);?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Phone</p>
                                            </div>
                                            <div class="col-md-6 text-primary">
                                                <p><?php echo($data1->user_mobile);?></p>
                                            </div>
                                        </div>
                                        
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Date of Joining</p>
                                            </div>
                                            <div class="col-md-6 text-primary">
                                                <p><?php echo($data1->user_joined);?></p>
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