<?php
session_start();
$data = json_decode(file_get_contents("php://input"), true);
$fila = $data["fila"];
$columna = $data["columna"];
$tablero = $_SESSION["tablero"];

if ($tablero[$fila][$columna] === "*") {
    echo json_encode(["mina" => true]);
} else {
    echo json_encode(["mina" => false, "valor" => $tablero[$fila][$columna]]);
}
?>
