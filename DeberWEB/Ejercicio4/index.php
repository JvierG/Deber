<?php
require_once "Matriz.php";
require_once "Funciones.php";

// Pide al usuario los datos de la primera matriz
echo "Ingrese los elementos de la primera matriz (2x2):\n";
$matriz1 = [];
for ($i = 0; $i < 2; $i++) {
    echo "Fila $i (2 valores separados por espacio): ";
    $matriz1[$i] = array_map('floatval', explode(" ", trim(fgets(STDIN))));
}

// Pide la segunda matriz
echo "Ingrese los elementos de la segunda matriz (2x2):\n";
$matriz2 = [];
for ($i = 0; $i < 2; $i++) {
    echo "Fila $i (2 valores separados por espacio): ";
    $matriz2[$i] = array_map('floatval', explode(" ", trim(fgets(STDIN))));
}

// Crea un objeto de tipo Matriz con la primera
$m = new Matriz($matriz1);

// Multiplica la primera por la segunda
echo "\n== Multiplicación de matrices ==\n";
$resMultiplicacion = $m->multiplicar($matriz2);
imprimirMatriz($resMultiplicacion);

// Calcula la inversa de la primera matriz
echo "\n== Inversa de la primera matriz ==\n";
$inversa = $m->inversa();
imprimirMatriz($inversa);

// Calcula el determinante de la primera matriz
echo "\n== Determinante de la primera matriz ==\n";
$det = determinante($matriz1);
echo "Determinante = $det\n";
