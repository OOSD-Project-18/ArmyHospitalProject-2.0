<?php
require_once '../core/initfromhandlers.php';
//If super user is set, throw a 404 error
$superUser = new SuperUser();
$id = $superUser->getId();
if ($superUser->find('admin')){
  Redirect::to('../index.php');
}
else {

    try {
        $superUser->createSuperUser(array(
            'user_first' => 'No record found',
            'user_last' => 'No record found',
            'user_pwd' => Hash::make('admin123'),
            'user_uid' => 'admin',
            'user_joined' => date('Y-m-d H:i:s'),
            'user_group' => $id,
            'user_imgstatus'=>0,
            'user_email' => 'No record found',
            'user_mobile' => 0,

        ));
        Redirect::to('../index.php');
    } catch (Exception $e) {
        Redirect::to('../index.php','database error');
    }
}









 ?>
