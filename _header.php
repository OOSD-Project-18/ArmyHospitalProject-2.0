<?php
require_once 'core/init.php';
$user = new User();

if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
} else {

    if (!$user->exists()) {
        Redirect::to(404);
    } else {
        $data = $user->data();
    }
?>
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
                                $imgSource = 'staffprofileimgs/profileimg' . $uid . '.jpg'; ?>
                                <!--only allow jpg-->
                                <!--profile pic-->
                                <img src=<?php echo $imgSource ?> width="25" height="25" class="d-inline-block align-top rounded-circle" alt="profile pic">
                            <?php } else { ?>
                                <img src="stylesheets/defaultprofileimg.jpg" width="25" height="25" class="d-inline-block align-top rounded-circle" alt="options">
                            <?php } ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="viewupdate.php">Edit profile </a>
                            <a class="dropdown-item" href="viewupdate.php">Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="controllerlogout.php">Log out</a>
                        </div>
                    </li>
                </ul>
            </div>
    </header>
<?php } ?>