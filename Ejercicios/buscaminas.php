<?php
function generarTablero($filas, $columnas, $minas) {
    $tablero = array_fill(0, $filas, array_fill(0, $columnas, 0));

    for ($i = 0; $i < $minas; $i++) {
        do {
            $x = rand(0, $filas - 1);
            $y = rand(0, $columnas - 1);
        } while ($tablero[$x][$y] === "*");

        $tablero[$x][$y] = "*";

        for ($dx = -1; $dx <= 1; $dx++) {
            for ($dy = -1; $dy <= 1; $dy++) {
                $nx = $x + $dx;
                $ny = $y + $dy;
                if ($nx >= 0 && $nx < $filas && $ny >= 0 && $ny < $columnas && $tablero[$nx][$ny] !== "*") {
                    $tablero[$nx][$ny]++;
                }
            }
        }
    }
    return $tablero;
}

function imprimirTablero($tablero) {
    foreach ($tablero as $fila) {
        foreach ($fila as $celda) {
            echo $celda . " ";
        }
        echo "\n";
    }
}

if (isset($argv[1], $argv[2], $argv[3])) {
    $tablero = generarTablero((int)$argv[1], (int)$argv[2], (int)$argv[3]);
    imprimirTablero($tablero);
} else {
    echo "Uso: php buscaminas.php <filas> <columnas> <minas>\n";
}
?>
