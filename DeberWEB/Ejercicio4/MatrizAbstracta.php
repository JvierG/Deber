<?php
abstract class MatrizAbstracta {
    protected array $matriz; // Guarda la matriz original

    public function __construct(array $matriz) {
        $this->matriz = $matriz; // Se guarda al crear el objeto
    }

    // Métodos obligatorios que las clases hijas deben implementar
    abstract public function multiplicar(array $matriz): array;
    abstract public function inversa(): array;
}
