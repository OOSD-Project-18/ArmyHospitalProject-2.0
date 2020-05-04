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
    $className=($className);
    $path="../classes/";
    $ext=".class.php";
    $fullPath=$path.$className.$ext;
    require_once $fullPath;
}

require_once '../functions/sanitize.php';
