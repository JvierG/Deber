<?php
require_once 'EulerNumerico.php';

// Definimos la ecuación diferencial: y' = f(x, y)
$f = function($x, $y) {
    return $x + $y; // ejemplo: y' = x + y
};

// Condiciones iniciales: x0 = 0, y0 = 1
$condiciones = [
    'x0' => 0,
    'y0' => 1,
];

// Parámetros del método: hasta x = 1 con paso h = 0.1
$parametros = [
    'xf' => 1,
    'h'  => 0.1,
];

// Creamos el objeto de la clase Euler
$metodo = new EulerNumerico();

// Ejecutamos el método de Euler
$solucion = aplicarMetodo($metodo, $f, $condiciones, $parametros);

// Mostramos los resultados
foreach ($solucion as $x => $y) {
    echo "x = " . round($x, 2) . " => y ≈ " . round($y, 4) . "\n";
}

// Función para aplicar el método a cualquier clase hija de EcuacionDiferencial
function aplicarMetodo(EcuacionDiferencial $metodo, callable $f, array $condiciones, array $parametros): array {
    return $metodo->resolverEuler($f, $condiciones, $parametros);
}
