<?php
  /**
   * Función para imprimir los detalles de un trabajo
   * recibe como parametro el trabajo actual y el total de meses de experiencia (sumatoria)
   * 
   * Cabe mencionar que recibe un objeto de tipo Job
   */
  function imprimirDetallesJob($job, $total_meses) {

    /**
     * Mostrar solo aquellas experiencias de trabajo que en el arreglo estén declaradas
     * como visibles. En caso contrario...
     * Indicar que la función debe salir de ejecucion con RETURN
     */
    if($job->visible != true) {
      return;
    }

    echo "<li class='work-position'>";
      echo "<h5>{$job->getTitle()}</h5>";
      echo "<p>$job->description</p>";
      //Invocar un método del objeto, cuya labor es mostrar una leyenda formateada con el total de tiempo de experiencia en este puesto
      //El argumento pasado a la función $total_meses ya no se usa
      //debido a que la lógica ha cambiado y ahora se muestra solo el tiempo de este puesto con formato (no la sumatoria)
      echo "<p>Tiempo en el puesto: ". $job->getTiempoLaboral() ."</p>";
      echo "<strong>Achievements:</strong>";
      echo "<ul>";
        for ($i=0; $i < count($job->logros); $i++) { 
          echo "<li>{$job->logros[$i]}.</li>";
        }
      echo "</ul>";
    echo "</li>";
  }