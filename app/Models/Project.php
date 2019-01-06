<?php

namespace App\Models;

/**
 * No se requiere mas los scripts necesarios en esta clase o archivo debido a que son cargados automáticamente
 * por el estandar PSR-4.
 * Todo ello gracias a composer
 * 
 * Para que lo anterior funcione es importante que las clases existan en un espacio de nombres.
 * en este caso. App\Models;
 * en el archivo composer.json se le indico que autoload debe buscar todo lo que se "use" en el espacio de nombres que
 * comienza por "App\\", y a nivel de archivos esto se encuentra en "app/"
 * entonces BaseElement.php como se encuentra dentro de un subnamespace se carga en automático cuando 
 * se le encuentra declarado en el código
 */
//require_once 'BaseElement.php';

/**
 * Esta clase hereda de la clase BaseElement
 * Al no implementar nuevas caracteristicas, la clase hija se comporta de la misma forma que la clase padre
 */
class Project extends BaseElement {

}