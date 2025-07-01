<?php
// Clase abstracta que define la estructura base de cualquier polinomio
abstract class PolinomioAbstracto {
    protected array $terminos;

    // Constructor que recibe un array asociativo donde la clave es el grado y el valor el coeficiente
    public function __construct(array $terminos) {
        $this->terminos = $terminos;
    }

    // Método abstracto para evaluar el polinomio dado un valor de x
    abstract public function evaluar(float $x): float;

    // Método abstracto para obtener la derivada del polinomio
    abstract public function derivada(): array;

    // Método accesor para obtener los términos del polinomio
    public function obtenerTerminos(): array {
        return $this->terminos;
    }
}
