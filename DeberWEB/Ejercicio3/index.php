<?php
require_once 'Polinomio.php';
require_once 'Funciones.php';

// Función que pide al usuario los términos del polinomio
function ingresarPolinomio(): array {
    echo "Ingrese el número de términos del polinomio: ";
    $n = (int)trim(fgets(STDIN)); // Cuántos términos tendrá
    $terminos = [];

    for ($i = 1; $i <= $n; $i++) {
        echo "Grado del término #$i: ";
        $grado = (int)trim(fgets(STDIN));

        echo "Coeficiente del término de grado $grado: ";
        $coef = (float)trim(fgets(STDIN));

        // Si ya existe ese grado, se suman coeficientes
        if (isset($terminos[$grado])) {
            $terminos[$grado] += $coef;
        } else {
            $terminos[$grado] = $coef;
        }
    }

    return $terminos;
}

// ========== PROGRAMA PRINCIPAL ==========

echo "=== Ingreso del primer polinomio ===\n";
$pol1Array = ingresarPolinomio(); // Primer polinomio
$pol1 = new Polinomio($pol1Array);

echo "\n=== Ingreso del segundo polinomio ===\n";
$pol2Array = ingresarPolinomio(); // Segundo polinomio
$pol2 = new Polinomio($pol2Array);

// Evaluar ambos polinomios para un valor de x
echo "\nIngrese el valor de x para evaluar los polinomios: ";
$x = (float)trim(fgets(STDIN));

echo "P1($x) = " . $pol1->evaluar($x) . "\n";
echo "P2($x) = " . $pol2->evaluar($x) . "\n";

// Derivar ambos polinomios
echo "\nDerivada de P1:\n";
echo Polinomio::imprimirPolinomio($pol1->derivada()) . "\n";

echo "\nDerivada de P2:\n";
echo Polinomio::imprimirPolinomio($pol2->derivada()) . "\n";

// Sumar ambos polinomios
$suma = sumarPolinomios($pol1->obtenerTerminos(), $pol2->obtenerTerminos());
echo "\nSuma de P1 + P2:\n";
echo Polinomio::imprimirPolinomio($suma) . "\n";
