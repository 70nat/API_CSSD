<?php

require_once dirname(__DIR__) . '/config/Database.php';
require_once dirname(__DIR__) . '/models/Producto.php';

class ProductoController {

    private $conexion;

    public function __construct()
    {
        $db = new Database();
        $this->conexion = $db->getConnection();
    }

    // ── Registrar nuevo producto ──────────────────────────────
    public function registro(Producto $producto)
    {
        $sql  = "INSERT INTO producto (nombre, descripcion, existencia, precio)
                 VALUES (:nombre, :descripcion, :existencia, :precio)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':nombre',      $producto->getNombre());
        $stmt->bindValue(':descripcion', $producto->getDescripcion());
        $stmt->bindValue(':existencia',  $producto->getExistencia(), PDO::PARAM_INT);
        $stmt->bindValue(':precio',      $producto->getPrecio());
        return $stmt->execute();
    }

    // ── Listar todos ──────────────────────────────────────────
    public function listar()
    {
        $sql  = "SELECT * FROM producto ORDER BY id DESC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ── Obtener uno por ID  (BUG CORREGIDO: faltaba fetch) ───
    public function obtenerPorId($id)
    {
        $sql  = "SELECT * FROM producto WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // ← fix principal
    }

    // ── Eliminar ──────────────────────────────────────────────
    public function eliminar($id)
    {
        $sql  = "DELETE FROM producto WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    
    public function actualizar(Producto $producto)
    {
        $sql  = "UPDATE producto SET nombre = :nombre,descripcion = :descripcion,existencia = :existencia, precio = :precio WHERE id = :id";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':id',          $producto->getId(),          PDO::PARAM_INT);
        $stmt->bindValue(':nombre',      $producto->getNombre());
        $stmt->bindValue(':descripcion', $producto->getDescripcion());
        $stmt->bindValue(':existencia',  $producto->getExistencia(),  PDO::PARAM_INT);
        $stmt->bindValue(':precio',      $producto->getPrecio());
        return $stmt->execute();
    }


    public function buscar($termino)
    {
        $sql  = "SELECT * FROM producto WHERE nombre LIKE :termino OR descripcion LIKE :termino ORDER BY id DESC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(':termino', '%' . $termino . '%');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}