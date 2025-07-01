<?php
require_once 'SistemaLineal.php'; // Importa la clase que resuelve sistemas lineales

echo "Ingrese las ecuaciones lineales en el formato Ax = B\n"; // Mensaje de bienvenida

echo "¿Cuántas variables tiene el sistema? "; // Pregunta al usuario cuántas variables tiene
$numVars = (int) trim(fgets(STDIN)); // Lee la cantidad y la convierte a número

$ecuaciones = []; // Se crea un arreglo vacío donde se guardarán las ecuaciones

// Bucle para pedir los datos de cada variable
for ($i = 0; $i < $numVars; $i++) {
    echo "\nIngrese el nombre de la variable (ej: x, y, z): ";
    $variable = trim(fgets(STDIN)); // Lee el nombre de la variable

    // Evita que se repitan variables
    if (array_key_exists($variable, $ecuaciones)) {
        echo "La variable '$variable' ya fue ingresada. Intenta con una nueva.\n";
        $i--; // Repite este paso
        continue;
    }

    echo "Ingrese el coeficiente de {$variable}: ";
    $coef = (float) trim(fgets(STDIN)); // Pide el coeficiente (A)

    echo "Ingrese el término independiente para {$variable}: ";
    $indep = (float) trim(fgets(STDIN)); // Pide el término independiente (B)

    $ecuaciones[$variable] = [$coef, $indep]; // Guarda la ecuación como [A, B]
}

// Crea un objeto que resolverá el sistema
$solucionador = new SistemaLineal();

try {
    $soluciones = $solucionador->solverSistema($ecuaciones); // Intenta resolver

    echo "\n=== RESULTADO DEL SISTEMA ===\n";
    foreach ($soluciones as $var => $valor) {
        echo "$var = $valor\n"; // Muestra el resultado de cada variable
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n"; // Si hay error, se muestra
}
