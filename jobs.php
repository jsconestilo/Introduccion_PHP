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

  /**
   * Constructor permite inicializar (preparar con todo lo necesario a) un objeto creado a partir
   * de la instancia de esta clase.
   * 
   * Se invoca de manera automática cuando se crea el objeto
   * Puede o no recibir parametros. (En este ejemplo son opcionales, ya que de no proporcionarlos se colocan valores por defecto en algunas propiedades)
   * 
   */
  public function __construct($title="N/D", $description="Descripción del puesto no disponible") {
    //Aqui pude haber llamado al metodo setTitle()
    $this->title = $title;
    $this->description = $description;
    $this->visible = true;
  }

  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }

  /**
   * Método que retorna una cadena con el formato requerido para mostrar el tiempo según la experiencia en una determinada tecnología
   * 
   * Considera formatos de tiempo en singular y plural, así como la conjunción para unir las leyendes
   * 1 mes | 2 meses | 1 año | 5 años | 1 año y 2 meses | 5 años y 10 meses
   */
  public function getTiempoLaboral() {
    $num_anios = intdiv($this->meses, 12);
    $num_meses = $this->meses % 12;
    
    $leyenda = '';
    $bandera_y = false;
    
    if($num_anios > 0) {
      
      $bandera_y = true;
      
      if($num_anios > 1) 
        $leyenda = "$num_anios años";
      else   
        $leyenda = "$num_anios año";
    }
    if($num_meses > 0) {
      if($num_meses > 1) 
        $leyenda .= $bandera_y ? " y $num_meses meses" : "$num_meses meses";
      else   
        $leyenda .= $bandera_y ? " y $num_meses mes" : "$num_meses mes";
    }
    return $leyenda;
  } 
}

/**
 * Generamos instancias (objetos independientes) de nuestra clase Job
 */
$job1 = new Job('Desarrollador PHP Junior', 'Experiencia detallada trabajando con PHP');
$job1->logros = ['Sistema clínico dental', 'Sistema bolsa de trabajo', 'Sistema de punto de venta'];
//No hay necesidad de declarar el valor en esta propiedad, por defecto es true
//$job1->visible = false;
$job1->meses = 15;

//Sigue trabajando igual debido a que posterormente se coloca información en las propiedades
//description y title
$job2 = new Job();
$job2->setTitle('Desarrollador Python');
$job2->description = 'Narración experiencia con desarrollos utilizando el lenguaje de programación Python';
$job2->logros = ['GUI de escritorio', 'Videojuego de plataformas', 'Plataforma educativa IUEM'];
$job2->meses = 7;

//Sigue trabajando igual debido a que posterormente se coloca información en la propiedad
//description
$job3 = new Job('Desarrollador FrontEnd');
$job3->description = 'Experiencia desarrollando con herramientas del lado del cliente';
$job3->logros = ['Sitio Web Barbacoa Don Ramón', 'Sitio Web PSEDUCA', 'Sitio Web Compudigital', 'Sitio Web XPSmart', 'Sitio Web Pastelería Susan'];
$job3->meses = 9;

$job4 = new Job();
//$job4->setTitle('Administrador de Base de Datos');
//$job4->description = 'Experiencia en la administración con bases de datos';
$job4->logros = ['Sistema de base de datos para clínica médica la santa fe'];
$job4->meses = 5;

//No se mostrará, debido a que modificamos el valor de la propiedad
//visible a falso
$job5 = new Job('Docente de Informática', 'Impartir catedra a estudiantes de bachillerato');
$job5->logros = ['Docente', 'Tutor académico'];
$job5->visible = false;
$job5->meses = 98;

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