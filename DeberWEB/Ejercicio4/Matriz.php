<?php
require_once "MatrizAbstracta.php";

class Matriz extends MatrizAbstracta {
    // Multiplicación de matrices
    public function multiplicar(array $otraMatriz): array {
        $resultado = [];
        $filasA = count($this->matriz);
        $columnasA = count($this->matriz[0]);
        $filasB = count($otraMatriz);
        $columnasB = count($otraMatriz[0]);

        if ($columnasA !== $filasB) {
            echo "No se pueden multiplicar las matrices.\n";
            return [];
        }

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

    // Retorna la matriz inversa (solo para 2x2)
    public function inversa(): array {
        if (count($this->matriz) !== 2 || count($this->matriz[0]) !== 2) {
            echo "Solo se admite la inversa de matrices 2x2.\n";
            return [];
        }

        $a = $this->matriz[0][0];
        $b = $this->matriz[0][1];
        $c = $this->matriz[1][0];
        $d = $this->matriz[1][1];
        $det = $a * $d - $b * $c;

        if ($det == 0) {
            echo "La matriz no tiene inversa.\n";
            return [];
        }

        return [
            [ $d / $det, -$b / $det ],
            [ -$c / $det, $a / $det ]
        ];
    }
}
?>
