<?php

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