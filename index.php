<?php 

define("BASE_URL", '/mvc');

require_once 'models/Router.php';
require_once 'controllers/HomeController.php';

$router = new Router();

$router->addRoute('GET', BASE_URL.'/home', 'HomeController', 'index');
$router->addRoute('GET', 
BASE_URL. '/info', 'HomeController', 'info');

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$handler = $router->gethandler($method, $uri);

if ($handler == null ) { 

    header ('HTTP/1.1 404 not found');
    exit();
}

$controller = new $handler['controller']();
$action = $handler['action'];
$controller->$action();