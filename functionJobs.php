<?php

  require_once 'app/Models/Printable.php';

/**
 * Especificamos los espacios de nombres donde se encuentran declaradas las clases, interfaces importadas en este script
 * seguido del nombre de las mismas.
 * 
 * Si existen clases con el mismo nombre, aunque en diferente namespace, se emplea un alias para nombrar
 * con otro nombre la clase conflictiva 
 */
  use App\Models\Printable;

  /**
   * Type Hinting: Determinación de tipos
   * Permite forzar a una funcion a recibir cierto tipo de datos como sus correspondientes parametros
   * Clases, arrays, interfaces, callables.
   * 
   * Como PHP es un lenguaje debilmente tipado y a su vez es de tipado dinámico, la determinación de tipos
   * es una excelente manera para forzar a esperar un determinado tipo de dato (Fuertemente utilizado en POO)
   * 
   * En este caso la función imprimirDetalles espera un objeto que implemente la interfaz Printable
   */
  function imprimirDetalles(Printable $job_or_project) {

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

      //Llamar a un método definido en el objeto, mismo que fue impuesto por la interfaz Printable
      echo "<p>". $job_or_project->getDescription() ."</p>";
      
      echo "<p>". $job_or_project->getTiempoLaboral() ."</p>";
      echo "<strong>Achievements:</strong>";
      echo "<ul>";
        for ($i=0; $i < count($job_or_project->logros); $i++) { 
          echo "<li>{$job_or_project->logros[$i]}.</li>";
        }
      echo "</ul>";
    echo "</li>";
  }