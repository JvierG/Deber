<?php
require_once 'EulerNumerico.php';

// Definimos la ecuación diferencial y' = f(x,y), por ejemplo y' = x + y
$f = function($x, $y) {
    return $x + $y;
};

// Condiciones iniciales
$condiciones = [
    'x0' => 0,
    'y0' => 1,
];

// Parámetros para el método
$parametros = [
    'xf' => 1,
    'h'  => 0.1,
];

// Crear instancia del método Euler
$metodo = new EulerNumerico();

// Aplicar método
$solucion = aplicarMetodo($metodo, $f, $condiciones, $parametros);

// Mostrar resultados
foreach ($solucion as $x => $y) {
    echo "x = " . round($x, 2) . " => y ≈ " . round($y, 4) . "\n";
}

// Función aplicarMetodo
function aplicarMetodo(EcuacionDiferencial $metodo, callable $f, array $condiciones, array $parametros): array {
    return $metodo->resolverEuler($f, $condiciones, $parametros);
}
?>
