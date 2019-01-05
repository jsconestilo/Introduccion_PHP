<?php
/**
 * Una buena práctica consiste en que si el archivo de PHP solo contiene código PHP
 * no es necesario cerrar el tag ?>
 */


 /**
  * Declaración de una clase (esqueleto, propiedades y métodos) del tipo Job
  */
class Job {
  private $title;
  public $description;
  public $logros;
  public $visible;
  public $meses;

  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }
}

/**
 * Generamos instancias (objetos independientes) de nuestra clase Job
 */
$job1 = new Job();
$job1->setTitle('Desarrollador PHP Junior');
$job1->description = 'Experiencia detallada trabajando con PHP';
$job1->logros = ['Sistema clínico dental', 'Sistema bolsa de trabajo', 'Sistema de punto de venta'];
$job1->visible = true;
$job1->meses = 1;

$job2 = new Job();
$job2->setTitle('Desarrollador Python');
$job2->description = 'Narración experiencia con desarrollos utilizando el lenguaje de programación Python';
$job2->logros = ['GUI de escritorio', 'Videojuego de plataformas', 'Plataforma educativa IUEM'];
$job2->visible = true;
$job2->meses = 7;

$job3 = new Job();
$job3->setTitle('Desarrollador FrontEnd');
$job3->description = 'Experiencia desarrollando con herramientas del lado del cliente';
$job3->logros = ['Sitio Web Barbacoa Don Ramón', 'Sitio Web PSEDUCA', 'Sitio Web Compudigital', 'Sitio Web XPSmart', 'Sitio Web Pastelería Susan'];
$job3->visible = true;
$job3->meses = 9;

$job4 = new Job();
$job4->setTitle('Administrador de Base de Datos');
$job4->description = 'Experiencia en la administración con bases de datos';
$job4->logros = ['Sistema de base de datos para clínica médica la santa fe'];
$job4->visible = true;
$job4->meses = 5;

/**
 * Ahora este es un arreglo de objetos de tipo Job
 */
$jobs = [
    $job1,
    $job2,
    $job3,
    $job4,
  ];