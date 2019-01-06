<?php

//Importar el archivo donde esta declarada la clase padre. Solo se puede
//requerir una sola vez una clase, el hacerlo más de una se genera un error (igual que las funciones)
require_once 'BaseElement.php';

/**
 * Esta clase hereda de la clase BaseElement
 * Al no implementar nuevas caracteristicas, la clase hija se comporta de la misma forma que la clase padre
 */
class Project extends BaseElement {

}