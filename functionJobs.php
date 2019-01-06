<?php
  /**
   * Función para imprimir los detalles de un trabajo o proyecto
   * recibe como parametro el trabajo o proyecto actual
   * 
   * Cabe mencionar que recibe un objeto de tipo Job o Project
   */
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
      echo "<h5>{$job_or_project->getTitle()}</h5>";
      echo "<p>$job_or_project->description</p>";
      echo "<p>". $job_or_project->getTiempoLaboral() ."</p>";
      echo "<strong>Achievements:</strong>";
      echo "<ul>";
        for ($i=0; $i < count($job_or_project->logros); $i++) { 
          echo "<li>{$job_or_project->logros[$i]}.</li>";
        }
      echo "</ul>";
    echo "</li>";
  }