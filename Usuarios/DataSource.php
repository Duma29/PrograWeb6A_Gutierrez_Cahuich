<?php
class DataSource {
    private $conexion;
    private $cadenaParaConexion;

    public function __construct() {
        $this->cadenaParaConexion = "mysql:host=localhost;dbname=prueba;charset=utf8";
        try {
            $this->conexion = new PDO($this->cadenaParaConexion, "root", "");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function ejecutarConsulta($sql, $params = []) {
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ejecutarActualizacion($sql, $params = []) {
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    }
}
?>
