<?php
require_once 'config/Database.php';
require_once 'controllers/ClienteController.php';
require_once 'controllers/InventarioController.php';
require_once 'controllers/CreditoController.php';
require_once 'controllers/AbonoController.php';
require_once 'controllers/DashboardController.php';
require_once 'controllers/ErrorController.php';

// Parse URL
$request_uri = str_replace('/kevincell/', '', $_SERVER['REQUEST_URI']);
$url_parts = explode('/', trim($request_uri, '/'));

// Set default controller and action
$controller_name = !empty($url_parts[0]) ? ucfirst($url_parts[0]) . 'Controller' : 'DashboardController';
$action = isset($url_parts[1]) ? $url_parts[1] : 'index';
$id = isset($url_parts[2]) ? $url_parts[2] : null;

// Store the ID in GET array if present
if ($id !== null) {
    $_GET['id'] = $id;
}

include_once 'views/layout/header.php';

// Create controller instance and handle errors
if (class_exists($controller_name)) {
    $controller = new $controller_name();
    if(method_exists($controller, $action)) {
        $controller->$action();
    } else {
        $error = new ErrorController();
        $error->notFound();
    }
} else {
    $error = new ErrorController();
    $error->notFound();
}

include_once 'views/layout/footer.php';
?>