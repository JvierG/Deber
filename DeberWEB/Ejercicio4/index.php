<?php
require_once "Matriz.php";
require_once "Funciones.php";

// Entrada por consola para dos matrices 2x2
echo "Ingrese los elementos de la primera matriz (2x2):\n";
$matriz1 = [];
for ($i = 0; $i < 2; $i++) {
    echo "Fila $i (2 valores separados por espacio): ";
    $matriz1[$i] = array_map('floatval', explode(" ", trim(fgets(STDIN))));
}

echo "Ingrese los elementos de la segunda matriz (2x2):\n";
$matriz2 = [];
for ($i = 0; $i < 2; $i++) {
    echo "Fila $i (2 valores separados por espacio): ";
    $matriz2[$i] = array_map('floatval', explode(" ", trim(fgets(STDIN))));
}

// Crear objeto
$m = new Matriz($matriz1);

// Multiplicación
echo "\n== Multiplicación de matrices ==\n";
$resMultiplicacion = $m->multiplicar($matriz2);
imprimirMatriz($resMultiplicacion);

// Inversa de la primera matriz
echo "\n== Inversa de la primera matriz ==\n";
$inversa = $m->inversa();
imprimirMatriz($inversa);

// Determinante
echo "\n== Determinante de la primera matriz ==\n";
$det = determinante($matriz1);
echo "Determinante = $det\n";
?>
