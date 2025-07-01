<?php
// Función global para sumar dos polinomios
function sumarPolinomios(array $p1, array $p2): array {
    $resultado = $p1; // Copia el primer polinomio

    // Recorre el segundo polinomio y suma término a término
    foreach ($p2 as $grado => $coef) {
        if (isset($resultado[$grado])) {
            $resultado[$grado] += $coef; // Si ya existe el mismo grado, se suman los coeficientes
        } else {
            $resultado[$grado] = $coef; // Si no, se añade el término
        }
    }

    return $resultado;
}
