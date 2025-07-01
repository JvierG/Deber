<?php
require_once 'EstadisticaBasica.php';

// Crear instancia de la clase concreta
$analizador = new EstadisticaBasica();

$datos = []; // Array para almacenar todos los conjuntos

// Preguntar cuántos conjuntos de datos desea ingresar
echo "¿Cuántos conjuntos de datos desea ingresar? ";
$num = (int) trim(fgets(STDIN)); // Leer número desde consola

for ($i = 1; $i <= $num; $i++) {
    echo "\nIngrese el nombre del conjunto #$i: ";
    $nombre = trim(fgets(STDIN)); // Leer nombre del conjunto

    echo "Ingrese los datos del conjunto '$nombre' separados por comas: ";
    $linea = trim(fgets(STDIN)); // Leer datos como cadena
    $valores = explode(",", $linea); // Convertir en array
    $datos[$nombre] = $valores;
}

// Generar el informe de estadísticas
$resultados = $analizador->generarInforme($datos);

// Mostrar el informe en consola
foreach ($resultados as $nombre => $estadisticas) {
    echo "\nEstadísticas para $nombre:\n";
    echo "Media: " . $estadisticas['media'] . "\n";
    echo "Mediana: " . $estadisticas['mediana'] . "\n";
    echo "Moda: " . $estadisticas['moda'] . "\n";
    echo "-----------------------------";
}
?>
