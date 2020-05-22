<?php
require_once('../core/initfromhandlers.php');

if (isset($_POST['verify-button']))
    $user_uid = $_POST['user_uid'];
    $tempUser = new User();

    $tempUser->verify($user_uid);

    Redirect::to('../views/homeSuperuser.php');
 ?>
