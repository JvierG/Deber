<?php
// Clase abstracta que define la estructura general para resolver ecuaciones diferenciales
abstract class EcuacionDiferencial {

    // Método abstracto: obliga a implementar un método que use Euler
    // $f: función que representa y' = f(x, y)
    // $condiciones: valores iniciales como x0 e y0
    // $parametros: valores de paso como xf y h
    abstract public function resolverEuler(callable $f, array $condiciones, array $parametros): array;
}
