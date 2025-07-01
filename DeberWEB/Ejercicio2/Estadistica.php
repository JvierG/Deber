<?php
declare(strict_types=1); // Obliga a que los tipos de datos sean estrictos (mayor seguridad)

// Clase abstracta que define qué métodos deben implementarse
abstract class Estadistica {
    abstract public function calcularMedia(array $valores): float;   // Calcular el promedio
    abstract public function calcularMediana(array $valores): float; // Calcular el valor central
    abstract public function calcularModa(array $valores): int;      // Calcular el número más frecuente
}

