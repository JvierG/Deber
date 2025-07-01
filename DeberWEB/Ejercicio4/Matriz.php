<?php
require_once "MatrizAbstracta.php";

class Matriz extends MatrizAbstracta {

    // Multiplica esta matriz con otra
    public function multiplicar(array $otraMatriz): array {
        $resultado = [];
        $filasA = count($this->matriz);      // Filas de la primera
        $columnasA = count($this->matriz[0]); // Columnas de la primera
        $filasB = count($otraMatriz);        // Filas de la segunda
        $columnasB = count($otraMatriz[0]);  // Columnas de la segunda

        if ($columnasA !== $filasB) {
            echo "No se pueden multiplicar las matrices.\n";
            return [];
        }

        // Realiza la multiplicación clásica de matrices
        for ($i = 0; $i < $filasA; $i++) {
            for ($j = 0; $j < $columnasB; $j++) {
                $suma = 0;
                for ($k = 0; $k < $columnasA; $k++) {
                    $suma += $this->matriz[$i][$k] * $otraMatriz[$k][$j];
                }
                $resultado[$i][$j] = $suma;
            }
        }
        return $resultado;
    }

    // Calcula la inversa de la matriz si es 2x2
    public function inversa(): array {
        if (count($this->matriz) !== 2 || count($this->matriz[0]) !== 2) {
            echo "Solo se admite la inversa de matrices 2x2.\n";
            return [];
        }

        // Elementos de la matriz
        $a = $this->matriz[0][0];
        $b = $this->matriz[0][1];
        $c = $this->matriz[1][0];
        $d = $this->matriz[1][1];

        $det = $a * $d - $b * $c; // Fórmula del determinante

        if ($det == 0) {
            echo "La matriz no tiene inversa.\n"; // No se puede si el determinante es 0
            return [];
        }

        // Fórmula de la inversa para 2x2
        return [
            [ $d / $det, -$b / $det ],
            [ -$c / $det, $a / $det ]
        ];
    }
}
