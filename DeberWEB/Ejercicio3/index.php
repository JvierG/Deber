<?php
require_once 'Polinomio.php';
require_once 'Funciones.php';

// Función para capturar datos desde la consola
function ingresarPolinomio(): array {
    echo "Ingrese el número de términos del polinomio: ";
    $n = (int)trim(fgets(STDIN));
    $terminos = [];

    for ($i = 1; $i <= $n; $i++) {
        echo "Grado del término #$i: ";
        $grado = (int)trim(fgets(STDIN));

        echo "Coeficiente del término de grado $grado: ";
        $coef = (float)trim(fgets(STDIN));

        // Si el grado ya existe, sumamos los coeficientes
        if (isset($terminos[$grado])) {
            $terminos[$grado] += $coef;
        } else {
            $terminos[$grado] = $coef;
        }
    }

    return $terminos;
}

// ===== PROGRAMA PRINCIPAL =====

echo "=== Ingreso del primer polinomio ===\n";
$pol1Array = ingresarPolinomio();
$pol1 = new Polinomio($pol1Array);

echo "\n=== Ingreso del segundo polinomio ===\n";
$pol2Array = ingresarPolinomio();
$pol2 = new Polinomio($pol2Array);

// Evaluación
echo "\nIngrese el valor de x para evaluar los polinomios: ";
$x = (float)trim(fgets(STDIN));

echo "P1($x) = " . $pol1->evaluar($x) . "\n";
echo "P2($x) = " . $pol2->evaluar($x) . "\n";

// Derivadas
echo "\nDerivada de P1:\n";
echo Polinomio::imprimirPolinomio($pol1->derivada()) . "\n";

echo "\nDerivada de P2:\n";
echo Polinomio::imprimirPolinomio($pol2->derivada()) . "\n";

// Suma
$suma = sumarPolinomios($pol1->obtenerTerminos(), $pol2->obtenerTerminos());
echo "\nSuma de P1 + P2:\n";
echo Polinomio::imprimirPolinomio($suma) . "\n";
