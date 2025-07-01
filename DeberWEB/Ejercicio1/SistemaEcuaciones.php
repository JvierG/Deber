<?php
declare(strict_types=1);

// Clase abstracta base que define la estructura de un sistema de ecuaciones
abstract class SistemaEcuaciones {
    // Método abstracto que debe calcular los resultados del sistema
    abstract public function calcularResultado(array $ecuaciones): array;

    // Método abstracto que debe validar si el sistema es consistente
    abstract public function validarConsistencia(array $ecuaciones): bool;
}
