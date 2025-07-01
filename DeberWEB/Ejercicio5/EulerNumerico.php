<?php
require_once 'EcuacionDiferencial.php';

class EulerNumerico extends EcuacionDiferencial {

    public function resolverEuler(callable $f, array $condiciones, array $parametros): array {
        $x0 = $condiciones['x0'];
        $y0 = $condiciones['y0'];
        $xf = $parametros['xf'];
        $h  = $parametros['h'];

        $solucion = [];
        $x = $x0;
        $y = $y0;

        // Guardar el primer punto
        $solucion[$x] = $y;

        while ($x < $xf) {
            $y = $y + $h * $f($x, $y);
            $x = round($x + $h, 10); // evitar errores flotantes
            $solucion[$x] = $y;
        }

        return $solucion;
    }
}
?>
