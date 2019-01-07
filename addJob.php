<?php

require_once 'vendor/autoload.php';

use App\Models\Job;

/**Configuración de Eloquent
 * 
 */
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
 * Variables superglobales que contienen la información enviada a este script
 * ya sea por get o por post
 * (generalmente desde un formulario - POST)
 * o via url (GET)
 */
//var_dump($_POST);
//var_dump($_GET);

if(isset($_POST['enviar'])) {
    $job = new Job();
    $job->title = $_POST['title'];
    $job->description = $_POST['description'];
    $job->months = $_POST['months'];
    $job->visible = $_POST['visible'];

    $job->save();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
    <title>Agregar Trabajo</title>
</head>
<body>
    <div class="container">
        <h1>Add Job</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Ingrese un titulo para el trabajo">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="20" rows="5" class="form-control" placeholder="Ingrese una descripción detallada del puesto"></textarea>
            </div>
            <div class="form-check">
                <input type="checkbox" value="1" name="visible" class="form-check-input" id="visible" >
                <label for="visible" class="form-check-label">Visible</label>
            </div>
            <div class="form-group">
                <label for="months">Months</label>
                <input type="number" name="months" min="1" class="form-control" placeholder="Ingrese el número de meses de experiencia">
            </div>
            <input type="submit" name="enviar" value="Enviar Registro" class="btn btn-primary">
        </form>
    </div>
</body>
</html>