<?php
define('__ROOTPATH__', __DIR__);
require_once ('App/Controller/Controller.php');
require_once ('App/Controller/PageController.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register();

use App\Controller\Controller;
$controller = new Controller();
$controller->route();
?>

<!-- Reprendre au replay 4 -->