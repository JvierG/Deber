<?php
declare(strict_types=1);

// ===============================
// Clase abstracta que define métodos para estadísticas básicas
// ===============================

// Definimos la clase abstracta con los métodos que deben implementarse
abstract class Estadistica {
    abstract public function calcularMedia(array $valores): float;
    abstract public function calcularMediana(array $valores): float;
    abstract public function calcularModa(array $valores): int;
}
?>

