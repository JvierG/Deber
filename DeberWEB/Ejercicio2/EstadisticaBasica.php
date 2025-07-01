<?php
require_once 'Estadistica.php';

// Clase que implementa los métodos de cálculo estadístico
class EstadisticaBasica extends Estadistica {

    // Calcula la media (promedio)
    public function calcularMedia(array $valores): float {
        $valores = array_map('floatval', $valores); // Asegura que todos sean números
        return array_sum($valores) / count($valores);
    }

    // Calcula la mediana
    public function calcularMediana(array $valores): float {
        $valores = array_map('floatval', $valores);
        sort($valores); // Ordenar valores
        $n = count($valores);
        $mitad = (int) ($n / 2);

        if ($n % 2 == 0) {
            // Si cantidad es par, promedio entre los dos del centro
            return ($valores[$mitad - 1] + $valores[$mitad]) / 2;
        } else {
            // Si cantidad es impar, devuelve el valor del centro
            return $valores[$mitad];
        }
    }

    // Calcula la moda
    public function calcularModa(array $valores): int {
        $valores = array_map('intval', $valores); // Convertir a enteros
        $frecuencias = array_count_values($valores); // Cuenta repeticiones
        arsort($frecuencias); // Ordena por frecuencia descendente
        $moda = array_key_first($frecuencias); // Toma el primero (más frecuente)
        return $moda;
    }

    // Genera un informe con media, mediana y moda para cada conjunto
    public function generarInforme(array $datos): array {
        $resultado = [];

        foreach ($datos as $nombre => $valores) {
            $resultado[$nombre] = [
                'media' => $this->calcularMedia($valores),
                'mediana' => $this->calcularMediana($valores),
                'moda' => $this->calcularModa($valores),
            ];
        }

        return $resultado;
    }
}
?>
