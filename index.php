<?php
  //Con esto se cargaría automáticamente nuestro Manager de Eloquent
  require_once 'vendor/autoload.php';

  /**
   * Configuración necesarioa para trabajar con la librería de tercenros Eloquent
   */
  use Illuminate\Database\Capsule\Manager as Capsule;
  $capsule = new Capsule;
  $capsule->addConnection([
      'driver'    => 'mysql',
      'host'      => 'localhost',
      'database'  => 'curso_php',
      'username'  => 'root',
      'password'  => '',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
  ]);
  // Make this Capsule instance available globally via static methods... (optional)
  $capsule->setAsGlobal();
  // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
  $capsule->bootEloquent();


  $name = 'Alejandro González Reyes';
  //Limit para mostrar las experiencias de trabajo menores o iguales a 20 meses
  $limiteMeses = 400;
  
  require_once('jobs.php');
  require_once('functionJobs.php');
  
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

  <title>Resume</title>
</head>

<body>
  <div class="container">
    <div id="resume-header" class="row">
      <div class="col-3">
        <img id="profile-picture" src="https://ui-avatars.com/api/?name=John+Doe&size=255" alt="">
      </div>
      <div class="col">
        <!-- Colocar código PHP en línea o embebido dentro de un documento html
        Para ello es importante que el archivo tenga extensión .php de lo contrario el interprete de PHP
        no lo podra procesar -->
        <h1><?php echo $name; ?></h1>
        <h2>PHP Developer</h2>
        <ul>
          <li>Mail: hector@mail.com</li>
          <li>Phone: 1234567890</li>
          <li>LinkedIn: https://linkedin.com</li>
          <li>Twitter: @hectorbenitez</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <h2 class="border-bottom-gray" >Carrer Summary</h2>
        <p>
          <?php
            //usando un objeto de una librería de terceros cuyo nombre por defecto entra en conflicto con otra de nuestras clases
            //Para evitarlo se emplean namespaces 
            echo $lib_project->getNombre(); 
          ?>
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div>
          <h3 class="border-bottom-gray" >Work Experience</h3>
          <ul>
          <?php
            
            $num_elementos = count($jobs);
            
            //Inicializar el acumuluador de meses de experiencias en los trabajos registrados.
            $totalMeses = 0;

            for($contador = 0; $contador < $num_elementos; $contador++) {

              $totalMeses += $jobs[$contador]->meses;

              if($totalMeses > $limiteMeses) {
                break;
              }
              //Invocar la función para que imprima los detalles del trabajo actual en el arreglo, 
              //así como la suma total de meses de experiencia
              
              //En este caso pasamos el objeto localizado en esta posición actual en el arreglo
              imprimirDetalles($jobs[$contador]);
            }
            ?>
          </ul>
        </div>
        <div>
            <h3 class="border-bottom-gray">Projects</h3>
            <ul>
            <?php
              /**
               * En el archivo functionJobs se añadió otra función que espera un objeto de la clase
               * Project, con la finalidad de imprimir sus detalles a nivel de vista
               * $projects = array de objetos Project
               */
              foreach ($projects as $project) {
                imprimirDetallesProject($project);
              }
            ?>
            </ul>
          </div>
      </div>
      <div class="col-3">
        <h3 class="border-bottom-gray" >Skills & Tools</h3>
        <h4>Backend</h4>
        <ul>
          <li>PHP</li>
        </ul>
        <h4>Frontend</h4>
        <ul>
            <li>HTML</li>
            <li>CSS</li>
        </ul>
        <h4>Frameworks</h4>
        <ul>
          <li>Laravel</li>
          <li>Bootstrap</li>
        </ul>
        <h3 class="border-bottom-gray" >Languages</h3>
        <ul>
          <li>Spanish</li>
          <li>English</li>
        </ul>
      </div>
    </div>
    <div id="resume-footer" class="row">
      <div class="col">
          Designed by @hectorbenitez
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
    crossorigin="anonymous"></script>
</body>

</html>