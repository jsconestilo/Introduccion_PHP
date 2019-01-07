<?php

  //use App\Models\Printable; Ya no es necesaria, ya que la clase Job no implementa dicha interfaz (ahora hereda de MOdel)
  use App\Models\Project;

  function imprimirDetalles($job_or_project) {

    /**
     * Mostrar solo aquellas experiencias de trabajo que en el arreglo estén declaradas
     * como visibles. En caso contrario...
     * Indicar que la función debe salir de ejecucion con RETURN
     */
    if($job_or_project->visible != true) {
      return;
    }

    echo "<li class='work-position'>";
      echo "<h5>{$job_or_project->title}</h5>";

      //Llamar a un método definido en el objeto, mismo que fue impuesto por la interfaz Printable
      echo "<p>". $job_or_project->description ."</p>";
      
      echo "<p>". $job_or_project->getTiempoLaboral() ."</p>";
      echo "<strong>Achievements:</strong>";
      /*echo "<ul>";
        for ($i=0; $i < count($job_or_project->logros); $i++) { 
          echo "<li>{$job_or_project->logros[$i]}.</li>";
        }
      echo "</ul>";*/
    echo "</li>";
  }


  /**
   * Esta función mediante declaración de tipos espera un objeto de tipo Project
   * para poder mostrar sus detalles con un formato adecuado.
   */
  function imprimirDetallesProject(Project $project) {
    echo '<div class="project">';
      echo '<h5>'. $project->title .'</h5>';
      echo '<div class="row">';
          echo '<div class="col-3">';
              echo '<img id="profile-picture" src="https://ui-avatars.com/api/?name=John+Doe&size=255" alt="">';
            echo '</div>';
            echo '<div class="col">';
              echo '<p>'. $project->description .'</p>';
              echo '<strong>Technologies used:</strong>';
              /**
               * Esta función se declaró a nivel de Clase, su intensión es que nos retorne un arreglo con las
               * tecnologías empleadas en este proyecto. (cuando se registra un proyecto, estos datos se encuentran
               * registrados en una cadena, donde cada tecnologpia aparece separada por una coma)
               */
              foreach ($project->tecnologiesAsArray() as $technology) {
                echo '<span class="badge badge-secondary">'. $technology .'</span> ';
              }
            echo '</div>';
      echo '</div>';
    echo '</div>';
  }