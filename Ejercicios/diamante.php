<?php
function imprimirDiamante($n) {
    if (!is_numeric($n) || $n <= 0 || $n % 2 == 0) {
        echo "Por favor, ingrese un número entero positivo e impar.\n";
        return;
    }

    $espacios = $n / 2;
    for ($i = 1; $i <= $n; $i += 2) {
        echo str_repeat(" ", $espacios) . str_repeat("*", $i) . "\n";
        $espacios--;
    }
    
    $espacios = 1;
    for ($i = $n - 2; $i > 0; $i -= 2) {
        echo str_repeat(" ", $espacios) . str_repeat("*", $i) . "\n";
        $espacios++;
    }
}

if (isset($argv[1])) {
    imprimirDiamante((int)$argv[1]);
} else {
    echo "Uso: php diamante.php <número impar>\n";
}
?>
