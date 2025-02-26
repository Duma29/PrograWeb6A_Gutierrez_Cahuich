<?php
interface IDao {
    public function insertar($obj);
    public function actualizar($obj);
    public function eliminar($id);
    public function buscarTodos();
    public function buscar($id);
}
?>
