<?php
require_once 'SistemaEcuaciones.php';

// Clase concreta que implementa la lógica para resolver sistemas lineales
class SistemaLineal extends SistemaEcuaciones {

    // Verifica que cada ecuación tenga 2 elementos numéricos: coeficiente y término independiente
    public function validarConsistencia(array $ecuaciones): bool {
        foreach ($ecuaciones as $var => $data) {
            if (count($data) !== 2 || !is_numeric($data[0]) || !is_numeric($data[1])) {
                return false;
            }
        }
        return true;
    }

    // Resuelve el sistema aplicando sustitución simple: x = b/a
    public function calcularResultado(array $ecuaciones): array {
        $resultados = [];
        foreach ($ecuaciones as $variable => $coef) {
            list($a, $b) = $coef;
            if ($a == 0) {
                $resultados[$variable] = ($b == 0) ? 'Infinitas soluciones' : 'Sin solución';
            } else {
                $resultados[$variable] = $b / $a;
            }
        }
        return $resultados;
    }

    // Método general que valida y resuelve el sistema
    public function solverSistema(array $ecuaciones): array {
        if (!$this->validarConsistencia($ecuaciones)) {
            throw new InvalidArgumentException("Sistema inconsistente o mal formado.");
        }
        return $this->calcularResultado($ecuaciones);
    }
}
