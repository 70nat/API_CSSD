<?php
class Productos {
    private $conn;
    private $tabla = "productos";

    public function __construct($db) {
        $this->conn = $db;
    }

    //obtener todos los productos
    public function getProductos() {
        $consultaSQL = "SELECT idProducto, nombreproducto, descripcion, precioCompra, precioVenta, existencia FROM " . $this->tabla;
        $stmt = $this->conn->prepare($consultaSQL);
        $stmt->execute();
        return $stmt;
    }
}
?>