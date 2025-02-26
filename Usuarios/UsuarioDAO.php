<?php
require_once "DataSource.php";
require_once "IDao.php";

class UsuarioDAO implements IDao {
    private $dataSource;

    public function __construct() {
        $this->dataSource = new DataSource();
    }

    public function insertar($usuario) {
        $sql = "INSERT INTO usuarios (nombre, correo) VALUES (?, ?)";
        return $this->dataSource->ejecutarActualizacion($sql, [$usuario->getNombre(), $usuario->getCorreo()]);
    }

    public function actualizar($usuario) {
        $sql = "UPDATE usuarios SET nombre = ?, correo = ? WHERE id = ?";
        return $this->dataSource->ejecutarActualizacion($sql, [$usuario->getNombre(), $usuario->getCorreo(), $usuario->getId()]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        return $this->dataSource->ejecutarActualizacion($sql, [$id]);
    }

    public function buscarTodos() {
        $sql = "SELECT * FROM usuarios";
        return $this->dataSource->ejecutarConsulta($sql);
    }

    public function buscar($id) {
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        return $this->dataSource->ejecutarConsulta($sql, [$id]);
    }
}
?>
