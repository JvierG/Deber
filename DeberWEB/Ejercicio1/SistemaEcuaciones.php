<?php
declare(strict_types=1); // Modo estricto: los tipos de datos deben coincidir

// Clase base (abstracta), no se puede usar directamente
abstract class SistemaEcuaciones {
    
    // Método obligatorio: cada clase hija debe definir cómo calcular
    abstract public function calcularResultado(array $ecuaciones): array;

    // Método obligatorio: debe validar si las ecuaciones tienen formato correcto
    abstract public function validarConsistencia(array $ecuaciones): bool;
}
