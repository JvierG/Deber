<?php
require_once 'PolinomioAbstracto.php';

class Polinomio extends PolinomioAbstracto {

    // Evalúa el polinomio para un valor dado de x
    public function evaluar(float $x): float {
        $resultado = 0;
        foreach ($this->terminos as $grado => $coeficiente) {
            $resultado += $coeficiente * pow($x, $grado); // Aplica la fórmula coef*x^grado
        }
        return $resultado;
    }

    // Calcula la derivada del polinomio
    public function derivada(): array {
        $derivada = [];
        foreach ($this->terminos as $grado => $coeficiente) {
            if ($grado > 0) {
                $derivada[$grado - 1] = $coeficiente * $grado; // Regla: n*x^(n-1)
            }
        }
        return $derivada;
    }

    // Devuelve el polinomio como una cadena tipo: 2x^0 + 3x^2
    public static function imprimirPolinomio(array $terminos): string {
        ksort($terminos); // Ordenar por grado (menor a mayor)
        $expresion = [];
        foreach ($terminos as $grado => $coef) {
            if ($coef != 0) {
                $expresion[] = "{$coef}x^{$grado}";
            }
        }
        return implode(" + ", $expresion); // Une todo con “ + ”
    }
}
