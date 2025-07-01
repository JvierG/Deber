<?php
abstract class EcuacionDiferencial {
    // Método abstracto para resolver con método Euler
    // $f = función callback f(x,y)
    // $condiciones = ['x0' => ..., 'y0' => ...]
    // $parametros = ['xf' => ..., 'h' => ...]
    abstract public function resolverEuler(callable $f, array $condiciones, array $parametros): array;
}
?>
