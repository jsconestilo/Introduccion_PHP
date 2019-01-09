<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Para decirle a Eloquent que considere esta clase para mapearla contra una tabla de la base de datos
 * es necesario especificar que hereda de MODEL
 */
class Project extends Model {
    
    /**
     * Indicamos que tabla va a estar vinculada
     * así como si hay campos en esa tabla para el registro de los timestamp (created_at, updated_at)
     */
    protected $table = 'projects';
    public $timestamps = false;

    /**
     * Esta función se declara a nivel de Clase, su intensión es que nos retorne un arreglo con las
     * tecnologías empleadas en cada proyecto que la invoque. (cuando se registra un proyecto, estos datos se encuentran
     * registrados en una cadena, donde cada tecnologia aparece separada por una coma)
     */
    public function tecnologiesAsArray() {
        //Por tanto cortamos esa cadena a partir del separador indicado (,) y nos retorna un array de cadenas
        $techs = explode(",", $this->technologies);
        //Ahora recorremos todo ese array y en cada elemento le hacemos un trim para no tener espacios vacios antes y al final
        return array_map('trim', $techs);
    }

    public function imprimirDetalles() {
        echo '<div class="project">';
          echo '<h5>'. $this->title .'</h5>';
          echo '<div class="row">';
              echo '<div class="col-3">';
                  echo '<img id="profile-picture" src="https://ui-avatars.com/api/?name=John+Doe&size=255" alt="">';
                echo '</div>';
                echo '<div class="col">';
                  echo '<p>'. $this->description .'</p>';
                  echo '<strong>Technologies used:</strong>';
                  /**
                   * Esta función se declaró a nivel de Clase, su intensión es que nos retorne un arreglo con las
                   * tecnologías empleadas en este proyecto. (cuando se registra un proyecto, estos datos se encuentran
                   * registrados en una cadena, donde cada tecnologpia aparece separada por una coma)
                   */
                  foreach ($this->tecnologiesAsArray() as $technology) {
                    echo '<span class="badge badge-secondary">'. $technology .'</span> ';
                  }
                echo '</div>';
          echo '</div>';
        echo '</div>';
    }

}