<?php
require_once (__DIR__ . '/../config/DataBase.php');

    class modeloProductos {
        
        public $PDO;

        public function __construct()
        {
            $conection = new DataBase();

            $this->PDO = $conection->connect();
        }

        public function insert($producto, $cantidad, $precio_unitario) {
            $statement = $this->PDO->prepare("INSERT INTO productos VALUES(null, :producto, :cantidad, :precio_unitario)");

            $statement->bindParam(":producto", $producto);
            $statement->bindParam(":cantidad", $cantidad);
            $statement->bindParam(":precio_unitario",$precio_unitario);

            return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
        }

        public function read() {
            $statement = $this->PDO->prepare("SELECT * FROM productos");
            return ($statement->execute()) ? $statement->fetchAll() : false;
        }
    }
?>