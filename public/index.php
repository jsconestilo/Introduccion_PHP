<?php

/**
 * FrontController
 * Es un tipo de patrón de diseño de programación, en la que su función principal es servir de puerta de entrada en nuestra aplicación.
 * Dicho módulo ayudará a levantar los servicios necesarios (base de datos, loggers, etc), así como repartir las peticiones que lleguen a nuestra aplicación.
 * Este patrón es muy usado en lenguajes como PHP para evitar la redundancia de código, o el concepto DRY (Don’t Repeat Yourself)
 */

//Mostrar o activar los errores en php
ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

//Configuración necesaria para trabajar con la librería de tercenros Eloquent
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'curso_php',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

/**
 * Configuración librería diactoros para mensajes http (request / response)
 * compatible con PSR7
 */
$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

/**
 * Configuración de Router compatible con PSR7
 */
use Aura\Router\RouterContainer;

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

$map->get('index', '/', [
    'controller' => 'App\Controllers\IndexController',
    'action' => 'index'
]);
$map->get('createJobs', '/jobs/add', [
    'controller' => 'App\Controllers\JobController',
    'action' => 'create'
]);
$map->post('storeJobs', '/jobs/add', [
    'controller' => 'App\Controllers\JobController',
    'action' => 'store'
]);

$map->get('createProjects', '/projects/add', [
    'controller' => 'App\Controllers\ProjectController',
    'action' => 'create'
]);
$map->post('storeProjects', '/projects/add', [
    'controller' => 'App\Controllers\ProjectController',
    'action' => 'store'
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if(!$route) {
    echo "Error 404, página no localizada";
} else {
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $controller = new $controllerName;
    $response = $controller->$actionName($request);
    
    echo $response->getBody();
}