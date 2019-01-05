<?php
/**
   * Función que retorna una cadena con el formato requerido para mostrar el tiempo según la experiencia en una determinada tecnología
   * Recibe como parametro la sumatoria de meses
   * 
   * Considera formatos de tiempo en singular y plural, así como la conjunción para unir las leyendes
   * 1 mes | 2 meses | 1 año | 5 años | 1 año y 2 meses | 5 años y 10 meses
   */
  function tiempoLaboral($meses) {
    //$num_anios = floor($meses / 12);
    $num_anios = intdiv($meses, 12);
    $num_meses = $meses % 12;
    
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
    return $leyenda;
  }


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
      //Invocar otra función cuya labor es mostrar una leyenda formateada total de tiempo de experiencia
      echo "<p>Hace ya: ". tiempoLaboral($total_meses) ."</p>";
      echo "<strong>Achievements:</strong>";
      echo "<ul>";
        for ($i=0; $i < count($job->logros); $i++) { 
          echo "<li>{$job->logros[$i]}.</li>";
        }
      echo "</ul>";
    echo "</li>";
  }