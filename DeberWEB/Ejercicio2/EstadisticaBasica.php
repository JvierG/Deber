<?php
require_once 'Estadistica.php'; // Importa la clase abstracta

class EstadisticaBasica extends Estadistica {

    // Calcula la media (promedio)
    public function calcularMedia(array $valores): float {
        $valores = array_map('floatval', $valores); // Asegura que todos los valores sean números
        return array_sum($valores) / count($valores); // Suma todos y divide entre la cantidad
    }

    // Calcula la mediana (el valor del medio)
    public function calcularMediana(array $valores): float {
        $valores = array_map('floatval', $valores); // Asegura que sean números
        sort($valores); // Ordena de menor a mayor
        $n = count($valores);
        $mitad = (int) ($n / 2); // Calcula el índice central

        if ($n % 2 == 0) {
            // Si hay cantidad par, devuelve el promedio de los dos del centro
            return ($valores[$mitad - 1] + $valores[$mitad]) / 2;
        } else {
            // Si hay cantidad impar, devuelve el valor del centro
            return $valores[$mitad];
        }
    }

    // Calcula la moda (el número que más se repite)
    public function calcularModa(array $valores): int {
        $valores = array_map('intval', $valores); // Convierte los valores a enteros
        $frecuencias = array_count_values($valores); // Cuenta cuántas veces aparece cada número
        arsort($frecuencias); // Ordena de mayor a menor frecuencia
        return array_key_first($frecuencias); // Devuelve el número más repetido
    }

    // Genera un informe con media, mediana y moda para varios conjuntos
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
