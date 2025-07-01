<?php
require_once 'EcuacionDiferencial.php';

// Clase concreta que implementa el método de Euler
class EulerNumerico extends EcuacionDiferencial {

    public function resolverEuler(callable $f, array $condiciones, array $parametros): array {
        $x0 = $condiciones['x0']; // valor inicial de x
        $y0 = $condiciones['y0']; // valor inicial de y
        $xf = $parametros['xf'];  // valor final de x
        $h  = $parametros['h'];   // tamaño del paso

        $solucion = [];
        $x = $x0;
        $y = $y0;

        $solucion[$x] = $y; // primer punto de la solución

        // Iteramos aplicando el método de Euler
        while ($x < $xf) {
            $y = $y + $h * $f($x, $y);           // fórmula de Euler: y(i+1) = y(i) + h*f(x(i), y(i))
            $x = round($x + $h, 10);             // evitamos errores numéricos
            $solucion[$x] = $y;
        }

        return $solucion;
    }
}
