<?php
require_once 'EstadisticaBasica.php'; // Importa la clase que hace los cálculos

$analizador = new EstadisticaBasica(); // Crea una instancia de esa clase

$datos = []; // Aquí se guardarán los conjuntos de datos

echo "¿Cuántos conjuntos de datos desea ingresar? ";
$num = (int) trim(fgets(STDIN)); // Pide al usuario cuántos conjuntos desea analizar

for ($i = 1; $i <= $num; $i++) {
    echo "\nIngrese el nombre del conjunto #$i: ";
    $nombre = trim(fgets(STDIN)); // Nombre del conjunto

    echo "Ingrese los datos del conjunto '$nombre' separados por comas: ";
    $linea = trim(fgets(STDIN)); // Datos como cadena (ej: 1,2,3,4)
    $valores = explode(",", $linea); // Se convierte en un array
    $datos[$nombre] = $valores; // Se guarda con su nombre
}

// Genera el informe estadístico usando los datos ingresados
$resultados = $analizador->generarInforme($datos);

// Imprime los resultados para cada conjunto
foreach ($resultados as $nombre => $estadisticas) {
    echo "\nEstadísticas para $nombre:\n";
    echo "Media: " . $estadisticas['media'] . "\n";
    echo "Mediana: " . $estadisticas['mediana'] . "\n";
    echo "Moda: " . $estadisticas['moda'] . "\n";
    echo "-----------------------------";
}
