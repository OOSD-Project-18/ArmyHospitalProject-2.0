<?php
session_start();

$GLOBALS['config']=array(
    'mysql'=>array(
        'host'=>'remotemysql.com',
        'username'=>'OXy65Ny57j',
        'password'=>'eYArF8fOJw',
        'dbName'=>'OXy65Ny57j'
    ),
    'remember'=>array(
        'cookie_name'=>'hash',
        'cookie_expiry'=>'604800'
    ),
    'session'=>array(
        'session_name'=>'user',
        'token_name'=>'token'
    )
);


spl_autoload_register('headerLoader');
function headerLoader($className){
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(strpos($url, 'includes') !== false || strpos($url, 'medicalReportDisplay') !== false) {
        $path = "../../classes/";
    }
    else if(strpos($url, 'medicalReportForm') !== false || strpos($url, 'labTests') !== false){
        $path = "../../../classes/";
    }

    else {$path="../classes/";}
    $className=($className);

    $ext=".class.php";
    $fullPath=$path.$className.$ext;
    require_once $fullPath;
}

$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if(strpos($url, 'includes') !== false || strpos($url, 'medicalReportDisplay') !== false ){
    require_once '../../functions/sanitize.php';
}else if (strpos($url, 'labTests') !== false){
  require_once '../../../functions/sanitize.php';
}
else{
  require_once '../functions/sanitize.php';
}
