<?php
require_once 'PolinomioAbstracto.php';

class Polinomio extends PolinomioAbstracto {

    // Evalúa el polinomio para un valor dado de x
    public function evaluar(float $x): float {
        $resultado = 0;
        foreach ($this->terminos as $grado => $coeficiente) {
            $resultado += $coeficiente * pow($x, $grado);
        }
        return $resultado;
    }

    // Calcula la derivada del polinomio como nuevo array asociativo
    public function derivada(): array {
        $derivada = [];
        foreach ($this->terminos as $grado => $coeficiente) {
            if ($grado > 0) {
                $derivada[$grado - 1] = $coeficiente * $grado;
            }
        }
        return $derivada;
    }

    // Retorna los términos del polinomio en formato legible: 2x^1 + 3x^2
    public static function imprimirPolinomio(array $terminos): string {
        ksort($terminos); // Ordenar por grado
        $expresion = [];
        foreach ($terminos as $grado => $coef) {
            if ($coef != 0) {
                $expresion[] = "{$coef}x^{$grado}";
            }
        }
        return implode(" + ", $expresion);
    }
}
