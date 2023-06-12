<?php

session_start();

require_once('core/includes.php');

$controller = isset($_REQUEST['c']) ? $_REQUEST['c'] : 'Index';
$controller .= 'Controller';
$method = isset($_REQUEST['m']) ? $_REQUEST['m'] : 'index';
if(!isset($_SESSION['user'])) {
    $controller = "IndexController";
    $method = "index";
}

$file = $controller.".php";

ob_start();
if(file_exists('controller/'.$file)) {
    require_once('controller/'.$file);
    if(method_exists($controller,$method)) {
        $instance = new $controller();
        if($_REQUEST['action']) {
            $content = $instance->$method($_REQUEST);
        } else {
            $content = $instance->$method();
        }
    } else {
        die("La méthode appelée n'est pas définie.");
    }
} else {
    die("La classe appelée n'est pas définie.");
}
$content = ob_get_clean();

if(!isset($_REQUEST['ajax'])) {
    include_once('views/partial/header.php');
}
if(isset($_SESSION['user'])) {
    include_once('views/partial/nav.php');
}
echo $content;
if(!isset($_REQUEST['ajax'])) {
    include_once('views/partial/footer.php');
}