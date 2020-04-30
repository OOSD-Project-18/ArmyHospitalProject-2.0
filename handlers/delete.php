<?php
require_once '../core/initfromhandlers.php';

$user = new User();
if (!$user->isLoggedIn()) {
    Redirect::to('../index.php');
} else {
    $data = $user->data();
    $uid = $data->user_uid;
    $fileName= "profileimg$uid" . ".jpg" ;
    try {
        unlink('../staffprofileimgs/' . $fileName);
    } catch (Exception $e) {
        Redirect::to('../views/update.php');
    };
    $user->removeUser();
    Redirect::to('../index.php');
}
