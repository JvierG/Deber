<?php
abstract class PolinomioAbstracto {
    protected array $terminos; // Almacena los términos del polinomio (grado => coeficiente)

    public function __construct(array $terminos) {
        $this->terminos = $terminos; // Guarda los términos recibidos
    }

    // Método abstracto: debe calcular el valor del polinomio dado x
    abstract public function evaluar(float $x): float;

    // Método abstracto: debe calcular la derivada
    abstract public function derivada(): array;

    // Devuelve los términos actuales del polinomio
    public function obtenerTerminos(): array {
        return $this->terminos;
    }
}
