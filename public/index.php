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
 */
$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

var_dump($request->getUri()->getPath());

/**
 * Verificamos que página solicita el usuario a través de una cadena de consulta
 * esto es un minirouter
 */
$route = $_GET['route'] ?? '/';

if($route == '/') {
    require_once '../index.php';
}
elseif($route == 'addJob') {
    require_once '../addJob.php';
}