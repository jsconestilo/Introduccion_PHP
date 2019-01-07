<?php

/**
 * Debido a que estamos usando composer, y este esta supervisando algunos espacios de nombres para la carga
 * automatica de clases, entonces solo requerimos el archivo autoload.php generado por composer
 */
require_once 'vendor/autoload.php';

use App\Models\{Job, Project};
use Libsxpsmart\Project as NewProject;

/**
 * Hacemos una consulta a la base de datos, especificamente del tipo SELECT *
 * a las tablas jobs y projects (ELOQUENT)
 * Esto por defecto nos retorna un arreglo de objetos (que mas adelante se mostrarán en el index.php)
 */
$jobs = Job::all();
$projects = Project::all();

/**
 * Generamos una instancia de la clase de terceros (cuyo nombre es identico a Project)
 * 
 * Esto ocasiona problemas, por ello durante la instanciación debemos anteponer el nombre del namespaces\nombreClase
 * o en su defecto declarar un "use" y como hay nombres de clases identicas a usar..
 * nombrarlas con un alias "as"
 */
$lib_project = new NewProject();
