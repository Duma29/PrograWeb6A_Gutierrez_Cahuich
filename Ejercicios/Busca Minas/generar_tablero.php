<?php
session_start();

$data = json_decode(file_get_contents("php://input"), true);
$filas = $data["filas"];
$columnas = $data["columnas"];
$minas = floor(($filas * $columnas) * 0.15);

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

$_SESSION["tablero"] = $tablero;

echo json_encode($tablero);
?>
