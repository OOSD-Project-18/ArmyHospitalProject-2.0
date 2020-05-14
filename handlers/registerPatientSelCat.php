<?php
require_once('../core/initfromhandlers.php');
        if (isset($_POST["next"])){
            $type = $_POST['type'];
            if (isset($type)){
                if ($type == "forces"){
                    Redirect::to('../views/forcespatientsignup.php');
                    
                }else{
                    Redirect::to('../views/familypatientsignup.php');
                    
                }
            }
            Redirect::to('../views/home.php');
        }
    ?>