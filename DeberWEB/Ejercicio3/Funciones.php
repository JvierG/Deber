<?php
// Función global para sumar dos polinomios
function sumarPolinomios(array $p1, array $p2): array {
    $resultado = $p1;

    foreach ($p2 as $grado => $coef) {
        if (isset($resultado[$grado])) {
            $resultado[$grado] += $coef;
        } else {
            $resultado[$grado] = $coef;
        }
    }

    return $resultado;
}
