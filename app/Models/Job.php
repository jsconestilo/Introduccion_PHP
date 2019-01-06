<?php
/**
 * Es una buena práctica empleaar espacios de nombres en los archivos de nuestro proyecto.
 * Nada garantiza que existan clases con el mismo nombre en diferentes directorios de nuestro proyecto
 * o peeor aun, que requiramos clases de terceros que coincidan con el noombre de nuestras clases.
 * 
 * El problema viene a relucir cuando se importan clases con el mismo nombre...
 * Por convención no se pueden redeclarar las clases o funciones (error fatal)
 * 
 * Para ello se emplean los espacios de nombres. (es como indicar a PHP que las clases aunque lleven el mismo nombre
 * estas se localizan en diferentes espacios de trabajo, y de ser necesario, pueden renombrarse con un sobrenombre
 * al momento de usarlas "use")
 * 
 * Por convención se sigue la estructura de directorios donde se encuentra alojada la clase para el nomre del namespace
 * 
 * Debe ser la primera definición en el script
 */
namespace App\Models;

//Importar el archivo donde esta declarada la clase padre. Solo se puede
//requerir una sola vez una clase, el hacerlo más de una se genera un error (igual que las funciones)
require_once 'BaseElement.php';

/**
 * Esta clase hereda de la clase BaseElement
 */
class Job extends BaseElement {

    public function __construct($title = "N/D", $description = "Descripción del puesto no disponible") {
        $nuevoTitulo = "<strong>Job: </strong>" . $title;
        /**
         * Invocar a metodos declarados en la clase padre
         * parent::metodo
         */
        parent::__construct($nuevoTitulo, $description);    
    }

    /**
     * Sobrecarga u Override. = Polimorfismo
     * Al redeclarar un método definido en la clase padre en una clase extendida, podemos modificar su comportamiento
     * de tal forma que este se comporte de una manera distinta a su padre o a sus clases hermanas
     */
    public function getTiempoLaboral() {
        $leyenda = parent::getTiempoLaboral();
        return 'Experiencia laboral: ' . $leyenda;
    }
}