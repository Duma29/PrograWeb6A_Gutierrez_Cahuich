<?php
require_once "Usuario.php";
require_once "UsuarioDAO.php";

$usuarioDAO = new UsuarioDAO();

// Insertar un usuario
$nuevoUsuario = new Usuario(null, "Bugs Bunny", "bugs@example.com");
$usuarioDAO->insertar($nuevoUsuario);

// Mostrar todos los usuarios
print_r($usuarioDAO->buscarTodos());
?>
