<?php
function jugar($jugador1, $jugador2) {
    $opciones = ["Piedra", "Papel", "Tijera", "Lagarto", "Spock"];
    if (!isset($opciones[$jugador1]) || !isset($opciones[$jugador2])) {
        echo "Valores no válidos. Usa números del 0 al 4.\n";
        return;
    }

    $reglas = [
        0 => [2, 3], // Piedra vence a Tijera y Lagarto
        1 => [0, 4], // Papel vence a Piedra y Spock
        2 => [1, 3], // Tijera vence a Papel y Lagarto
        3 => [1, 4], // Lagarto vence a Papel y Spock
        4 => [0, 2]  // Spock vence a Piedra y Tijera
    ];

    echo "Jugador 1: " . $opciones[$jugador1] . "\n";
    echo "Jugador 2: " . $opciones[$jugador2] . "\n";

    if ($jugador1 == $jugador2) {
        echo "Empate!\n";
    } elseif (in_array($jugador2, $reglas[$jugador1])) {
        echo "Gana Jugador 1!\n";
    } else {
        echo "Gana Jugador 2!\n";
    }
}

if (isset($argv[1], $argv[2])) {
    jugar((int)$argv[1], (int)$argv[2]);
} else {
    echo "Uso: php piedra_papel_tijera_lagarto_spock.php <jugador1> <jugador2>\n";
}
?>
