<?php
//EJERCICIO 1

// Escribe el código necesario para generar la cadena final usando el arreglo dado
$arreglo = [
	'keyStr1' => 'lado',
	0 => 'ledo',
	'keyStr2' => 'lido',
	1 => 'lodo',
	2 => 'ludo'
];

/**
 * Lado, ledo, lido, lodo, ludo,
 * decirlo al revés lo dudo.
 * Ludo, lodo, lido, ledo, lado,
 * ¡Qué trabajo me ha costado!
 */

foreach ($arreglo as $key => $value) {
    echo $value . ', ';
}

echo '<br/>';

foreach (array_reverse($arreglo) as $key => $value) {
    echo $value . ', ';
}

//EJERCICIO 2

//Crea un arreglo que contenga como clave los nombres de 5 países y como valor otro arreglo con 3 ciudades que pertenezcan a ese país, después utiliza un ciclo foreach, para imprimir el nombre del país seguido de las ciudades que definiste:
$paises = [
    'México'            => ['Monterrey', 'Guadalajara', 'Toluca'],
    'Colombia'          => ['Bogotá', 'Medellín', 'Cartagena'],
    'Estados Unidos'    => ['New York', 'Washington', 'San Francisco'],
    'Perú'              => ['Lima', 'Chiclayo', 'Iquitos'],
    'Brasil'            => ['Rio de Janeiro', 'Sao Paulo', 'Recife']
];

echo "<ul>";
foreach ($paises as $pais => $ciudades) {
    echo "<li>";
    echo "<b>$pais: </b>";
    foreach ($ciudades as $ciudad) {
        echo "$ciudad, ";
    }
    echo "</li>";
}
echo "</ul>";

//EJERCICIO 3

//Escribe el código necesario para encontrar los 3 números más grandes y los 3 números más bajos de la siguiente lista:
$valores = [23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61];

sort($valores);
$tres_mas_bajos = array_slice($valores, 0, 3);
echo "Los valores más pequeños en el arreglo son: ";
foreach ($tres_mas_bajos as $valor) {
    echo "$valor, ";
}

echo "<br/>"; 

rsort($valores);
$tres_mas_altos = array_splice($valores, 0, 3);
echo "Los valores más altos en el arreglo son: ";
foreach ($tres_mas_altos as $valor) {
    echo "$valor, ";
}

?>