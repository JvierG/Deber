<?php
require_once 'SistemaLineal.php';

// Mostrar mensaje inicial
echo "Ingrese las ecuaciones lineales en el formato Ax = B\n";

// Solicitar cuántas variables tendrá el sistema
echo "¿Cuántas variables tiene el sistema? ";
$numVars = (int) trim(fgets(STDIN));

// Array para almacenar las ecuaciones
$ecuaciones = [];

for ($i = 0; $i < $numVars; $i++) {
    echo "\nIngrese el nombre de la variable (ej: x, y, z): ";
    $variable = trim(fgets(STDIN));

    // Validar que no se repita una variable ya ingresada
    if (array_key_exists($variable, $ecuaciones)) {
        echo "La variable '$variable' ya fue ingresada. Intenta con una nueva.\n";
        $i--;
        continue;
    }

    // Pedir el coeficiente A de la variable
    echo "Ingrese el coeficiente de {$variable}: ";
    $coef = (float) trim(fgets(STDIN));

    // Pedir el término independiente B
    echo "Ingrese el término independiente para {$variable}: ";
    $indep = (float) trim(fgets(STDIN));

    // Guardamos como [coeficiente, independiente]
    $ecuaciones[$variable] = [$coef, $indep];
}

// Crear el solucionador
$solucionador = new SistemaLineal();

try {
    // Llamar a solverSistema para resolver
    $soluciones = $solucionador->solverSistema($ecuaciones);

    // Mostrar los resultados
    echo "\n=== RESULTADO DEL SISTEMA ===\n";
    foreach ($soluciones as $var => $valor) {
        echo "$var = $valor\n";
    }
} catch (Exception $e) {
    // Mostrar errores si los hay
    echo "Error: " . $e->getMessage() . "\n";
}
