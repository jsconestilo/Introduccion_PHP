<?php

/**
 * Debido a que estamos usando composer, y este esta supervisando algunos espacios de nombres para la carga
 * automatica de clases, entonces solo requerimos el archivo autoload.php generado por composer
 */
require_once 'vendor/autoload.php';

/**
 * Estas clases se encuentran dentro de los espacios de nombres supervisados, por ello ya no es necesario requerirlos,
 * ya que se hace con el autoload anterior
 */
//require_once 'app/Models/Job.php';
//require_once 'app/Models/Project.php';
//require_once 'libs-terceros/Project.php';

/**
 * Ahora cuando se detecta el "use", composer pone a disposición de este script la carga de la clase necesaria.
 * todo ello gracias al autoload anterior
 */
use App\Models\{Job, Project};

use Libsxpsmart\Project as NewProject;

/**
 * Generamos instancias (objetos independientes) de nuestra clase Job
 */
$job1 = new Job('Desarrollador PHP Junior', 'Experiencia detallada trabajando con PHP');
$job1->logros = ['Sistema clínico dental', 'Sistema bolsa de trabajo', 'Sistema de punto de venta'];
$job1->meses = 15;

$job2 = new Job('Desarrollador Python', 'Narración experiencia con desarrollos utilizando el lenguaje de programación Python');
$job2->logros = ['GUI de escritorio', 'Videojuego de plataformas', 'Plataforma educativa IUEM'];
$job2->meses = 7;

$job3 = new Job('Desarrollador FrontEnd', 'Experiencia desarrollando con herramientas del lado del cliente');
$job3->logros = ['Sitio Web Barbacoa Don Ramón', 'Sitio Web PSEDUCA', 'Sitio Web Compudigital', 'Sitio Web XPSmart', 'Sitio Web Pastelería Susan'];
$job3->meses = 9;

$job4 = new Job();
$job4->logros = ['Sistema de base de datos para clínica médica la santa fe'];
$job4->meses = 5;

$job5 = new Job('Docente de Informática', 'Impartir catedra a estudiantes de bachillerato');
$job5->logros = ['Docente', 'Tutor académico'];
$job5->visible = false;
$job5->meses = 98;

/**
 * Generamos instancias de nuestra clase Project
 */
$project1 = new Project('Proyecto A', 'Descripción detallada del proyecto identificado como A');
$project2 = new Project('Proyecto B', 'Descripción detallada del proyecto identificado como B');
$project3 = new Project('Proyecto c', 'Descripción detallada del proyecto identificado como C');

/**
 * Generamos una instancia de la clase de terceros (cuyo nombre es identico a Project)
 * 
 * Esto ocasiona problemas, por ello durante la instanciación debemos anteponer el nombre del namespaces\nombreClase
 * o en su defecto declarar un "use" y como hay nombres de clases identicas a usar..
 * nombrarlas con un alias "as"
 */
//$lib_project = new Libsxpsmart\Project();
$lib_project = new NewProject();

/**
 * Ahora este es un arreglo de objetos de tipo Job
 */
$jobs = [
    $job1,
    $job2,
    $job3,
    $job4,
    $job5,
  ];

//Arreglo de objetos de tipo Project
$projects = [$project1, $project2, $project3];