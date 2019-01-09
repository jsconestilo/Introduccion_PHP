<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Esta clase hereda de la clase Model de ELoquent
 * En esta sección vamos a trabajar con un ORM para hacer las consultas a la base
 * de datos
 */
class Job extends Model {

    protected $table = "jobs";
    public $timestamps = false;

    /*public function __construct($title = "N/D", $description = "Descripción del puesto no disponible") {
        $nuevoTitulo = "<strong>Job: </strong>" . $title;
        parent::__construct($nuevoTitulo, $description);    
    }*/

    public function getTiempoLaboral() {
        $num_anios = intdiv($this->months, 12);
        $num_meses = $this->months % 12;
        
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
        return 'Experiencia laboral: ' . $leyenda;
    }


    public function imprimirDetalles() {
        if($this->getAttribute('visible')) {
            echo "<li class='work-position'>";
                echo "<h5>{$this->title}</h5>";
                echo "<p>". $this->description ."</p>";
                echo "<p>". $this->getTiempoLaboral() ."</p>";
                echo "<strong>Achievements:</strong>";
            echo "</li>";
        }
        
    }
}