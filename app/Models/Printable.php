<?php

namespace App\Models;

/**
 * Las interfaces son como contratos, donde se declaran (pero no se definen) los métodos que han
 * de implementar las clases que IMPLEMENTEN dicha interfaz
 * 
 * Todos los metodos deben ser publicos 
 */
interface Printable {
    public function getDescription();
}