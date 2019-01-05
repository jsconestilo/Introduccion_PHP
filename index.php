<?php
	/* Una práctica común en el pasado era declarar un bloque de PHP al inicio
	para después utilizar esa lógica generada en nuestro template HTML */
  $name = 'Alejandro González Reyes';

  //Limit para mostrar las experiencias de trabajo menores o iguales a 20 meses
  $limiteMeses = 20;
  
  $jobs = [
    [
      'title'       => 'Desarrollador PHP Junior',
      'description' => 'Experiencia detallada trabajando con PHP',
      'logros'      => ['Sistema clínico dental', 'Sistema bolsa de trabajo', 'Sistema de punto de venta'],
      'visible'     => true,
      'meses'       => 8,
    ],
    [
      'title'       => 'Desarrollador Python',
      'description' => 'Narración experiencia con desarrollos utilizando el lenguaje de programación Python',
      'logros'      => ['GUI de escritorio', 'Videojuego de plataformas', 'Plataforma educativa IUEM'],
      'visible'     => false,
      'meses'       => 2,
    ],
    [
      'title'       => 'Desarrollador FrontEnd',
      'description' => 'Experiencia desarrollando con herramientas del lado del cliente',
      'logros'      => ['Sitio Web Barbacoa Don Ramón', 'Sitio Web PSEDUCA', 'Sitio Web Compudigital', 'Sitio Web XPSmart', 'Sitio Web Pastelería Susan'],
      'visible'     => true,
      'meses'       => 9,
    ],
    [
      'title'       => 'Administrador de Base de Datos',
      'description' => 'Experiencia en la administración con bases de datoos',
      'logros'      => ['Sistema de base de datos para clínica médica la santa fe'],
      'visible'     => true,
      'meses'       => 5,
    ],
  ];
  
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
            /**
             * El ciclo for es una estructura de iterativa muy util al momento de querer recorrer el contenido de un arreglo
             * Tiene un punto incial, un punto final y un incremento
             * 
             * El operador de post-incremento incrementa el valor de la variable después de haber
             * ejecutado dicha linea.
             * variable++
             * 
             * La función count() permite saber el número de elementos que existen en un arreglo
             * 
             * Los arreglos no pueden ser declarados como cualquier variable dentro de las comillas dobles
             * PHP no los interpreta como tal, para ello hay que emplear la concatenacion o simplemente
             * encerrarlos entre llaves
             */
            $num_elementos = count($jobs);
            
            //Inicializar el acumuluador de meses de experiencias en los trabajos registrados.
            $totalMeses = 0;

            for($contador = 0; $contador < $num_elementos; $contador++) {

              //Acumulador de meses de experiencia en los trabajos registrados
              $totalMeses += $jobs[$contador]['meses'];

              /**
               * Si el total de meses de experiencia hasta el momento superan el limite 
               * registrado al inicio del script. Entonces hacemos un BREAK (paramos o detenemos)
               * al ciclo, y por tanto las siguientes iteraciones no se ejecutarían.
               * 
               * La estructura condicional IF evalua una condición lógica, en caso de ser verdadera
               * se ejecutan sus instrucciones internas, de lo contrario no se ejecutan
               */
              if($totalMeses > $limiteMeses) {
                break;
              }

              /**
               * Mostrar solo aquellas experiencias de trabajo que en el arreglo estén declaradas
               * como visibles. En caso contrario...
               * Indicar al ciclo que CONTINUE con la siguiente iteración (salta o brinca)
               */
              if($jobs[$contador]['visible'] != true) {
                continue;
              }
              
              echo "<li class='work-position'>";
                echo "<h5>{$jobs[$contador]['title']}</h5>";
                echo "<p>" . $jobs[$contador]['description'] . "</p>";
                echo "<p>Hace ya: $totalMeses meses</p>";
                echo "<strong>Achievements:</strong>";
                echo "<ul>";
                  for ($i=0; $i < count($jobs[$contador]['logros']); $i++) { 
                    echo "<li>{$jobs[$contador]['logros'][$i]}.</li>";
                  }
                echo "</ul>";
              echo "</li>";
            }
            ?>
          </ul>
        </div>
        <div>
            <h3 class="border-bottom-gray">Projects</h3>
            <div class="project">
                <h5>Project X</h5>
                <div class="row">
                    <div class="col-3">
                        <img id="profile-picture" src="https://ui-avatars.com/api/?name=John+Doe&size=255" alt="">
                      </div>
                      <div class="col">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius earum corporis at accusamus quisquam hic quos vel? Tenetur, ullam veniam consequatur esse quod cum, quam cupiditate assumenda natus maiores aperiam.</p>
                        <strong>Technologies used:</strong>
                        <span class="badge badge-secondary">PHP</span>
                        <span class="badge badge-secondary">HTML</span>
                        <span class="badge badge-secondary">CSS</span>
                      </div>
                </div>
            </div>
            <div class="project">
                <h5>Project X</h5>
                <div class="row">
                    <div class="col-3">
                        <img id="profile-picture" src="https://ui-avatars.com/api/?name=John+Doe&size=255" alt="">
                      </div>
                      <div class="col">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius earum corporis at accusamus quisquam hic quos vel? Tenetur, ullam veniam consequatur esse quod cum, quam cupiditate assumenda natus maiores aperiam.</p>
                        <strong>Technologies used:</strong>
                        <span class="badge badge-secondary">PHP</span>
                        <span class="badge badge-secondary">HTML</span>
                        <span class="badge badge-secondary">CSS</span>
                      </div>
                </div>
            </div>
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