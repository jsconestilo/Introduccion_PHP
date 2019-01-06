<?php

require_once 'Printable.php';

/**
 * Para implementar una interfaz en una clase se hace uso de la palabra reservada implements
 * Se pueden implementar muchas interfaces.
 * Una interfaz es un contrato, por tanto al implementarla en una clase, la clase está obligada a declarar y definir
 *    la lógica de los métodos mencionados en dicha interfaz
 * Cuando una clase padre implementa una interfaz, este comportamiento se hereda a sus clases hijas.
 */
class BaseElement implements Printable {
    protected $title;
    public $description;
    public $logros = [];
    public $visible;
    public $meses;
  
    public function __construct($title="N/D", $description="Descripción del puesto no disponible") {
      //Aqui pude haber llamado al metodo setTitle()
      $this->title = $title;
      $this->description = $description;
      $this->visible = true;
    }
  
    public function setTitle($title) {
      $this->title = $title;
    }
  
    public function getTitle() {
      return $this->title;
    }
  
    /**
     * Método que retorna una cadena con el formato requerido para mostrar el tiempo según la experiencia en una determinada tecnología
     * 
     * Considera formatos de tiempo en singular y plural, así como la conjunción para unir las leyendes
     * 1 mes | 2 meses | 1 año | 5 años | 1 año y 2 meses | 5 años y 10 meses
     */
    public function getTiempoLaboral() {
      $num_anios = intdiv($this->meses, 12);
      $num_meses = $this->meses % 12;
      
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
     * Cuando una clase implementa una interfaz, está obligada a declarar y
     * definir los métodos especificados por dicha interfaz.
     */
    public function getDescription()
    {
      return $this->description;
    }
}