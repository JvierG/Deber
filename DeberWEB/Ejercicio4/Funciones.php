<?php
function determinante(array $matriz): float {
    $n = count($matriz);

    if ($n == 2 && count($matriz[0]) == 2) {
        return $matriz[0][0] * $matriz[1][1] - $matriz[0][1] * $matriz[1][0];
    }

    echo "Solo se puede calcular el determinante de matrices 2x2.\n";
    return 0;
}

function imprimirMatriz(array $matriz): void {
    foreach ($matriz as $fila) {
        foreach ($fila as $valor) {
            echo str_pad($valor, 8, " ", STR_PAD_LEFT);
        }
        echo "\n";
    }
}
?>
