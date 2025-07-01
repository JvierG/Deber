<?php
require_once 'SistemaEcuaciones.php'; // Carga la clase base

// Clase que implementa cómo resolver un sistema lineal
class SistemaLineal extends SistemaEcuaciones {

    // Verifica que cada ecuación esté bien formada (tenga dos números)
    public function validarConsistencia(array $ecuaciones): bool {
        foreach ($ecuaciones as $var => $data) {
            if (count($data) !== 2 || !is_numeric($data[0]) || !is_numeric($data[1])) {
                return false; // Error si no hay 2 valores numéricos
            }
        }
        return true; // Todo correcto
    }

    // Resuelve cada ecuación usando x = B / A
    public function calcularResultado(array $ecuaciones): array {
        $resultados = [];
        foreach ($ecuaciones as $variable => $coef) {
            list($a, $b) = $coef; // Descompone en A y B
            if ($a == 0) {
                // Si A = 0, el resultado puede ser infinito o no tener solución
                $resultados[$variable] = ($b == 0) ? 'Infinitas soluciones' : 'Sin solución';
            } else {
                $resultados[$variable] = $b / $a; // Resuelve x = B / A
            }
        }
        return $resultados;
    }

    // Método que une validación y resolución
    public function solverSistema(array $ecuaciones): array {
        if (!$this->validarConsistencia($ecuaciones)) {
            throw new InvalidArgumentException("Sistema inconsistente o mal formado.");
        }
        return $this->calcularResultado($ecuaciones); // Si todo está bien, resuelve
    }
}
