<?php
// Clase abstracta con los métodos requeridos
abstract class MatrizAbstracta {
    protected array $matriz;

    public function __construct(array $matriz) {
        $this->matriz = $matriz;
    }

    abstract public function multiplicar(array $matriz): array;
    abstract public function inversa(): array;
}
?>
