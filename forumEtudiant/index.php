<?php
session_start();
require_once 'config/config.php';
require_once 'lib/core.php';

// module = controlleur
$module = isset($_REQUEST['module'])? safe($_REQUEST['module']):$config['default_module'];

//echo $module;
//action = fonction dedans le controlleur
$action = isset($_REQUEST['action'])? safe($_REQUEST['action']):$config['default_action'];
//echo $action;

//http://localhost/web21622/mvc/?module=user&action=abc

$controller_file = 'controllers/'.ucfirst($module).'Controller.php';

//echo $controller_file;

if(!file_exists($controller_file)){
    trigger_error('Invalid Controller');
    exit;
}
require_once($controller_file);

$function = strtolower($module).'_controller_'.$action;

//echo $function;
if(!function_exists($function)){
    trigger_error('Invalid Function');
    exit;
}

call_user_func($function, $_REQUEST); // $_REQUEST c'est le post et le get


?>



<!--e2295160.webdev.cmaisonneuve.qc.ca/index
webdev.cmaisonneuve.qc.ca/phpmyadmin
.my.cnf
user : 
Password: [mysql]
user=e2295160
host=localhost
password=J5CXwPUvSABTdMlcGf97
socket=/run/mysqld/mysqld.sock

lib/connex.php éditer
$con =mysqli_connect("localhost", "e2295160", "J5CXwPUvSABTdMlcGf97", "e2295160")
-->

