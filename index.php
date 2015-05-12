<?php
//error_reporting(E_ALL);
error_reporting(0);
//ini_set('display_errors', '1');
// Need to install this app?
if(file_exists(dirname(__FILE__).'/.do_install')  and is_dir(dirname(__FILE__).'/install') ) {
    header('Location: install/');
    die;
}
 
// change the following paths if necessary
$config         = dirname(__FILE__).'/protected/config/main.php';
$configLocal    = dirname(__FILE__).'/protected/config/main-local.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
if( !file_exists($configLocal))
{
    header("ERROR", false,500);
    echo "<h1>ERROR</h1>The file <em>protected/config/main-local.php</em> doesn't exist.<br />"
        ."Please create this file and re-open this page.";
    exit();
}
$blogConfigLocal = require_once($configLocal);
require_once((string)$blogConfigLocal['params']['yiiPath'].'yiilite.php');
Yii::createWebApplication($config)->run();
