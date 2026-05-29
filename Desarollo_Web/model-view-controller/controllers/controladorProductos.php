<?php

    require_once("../models/modeloProductos.php");

    class productosController {
        private $model;

        public function __construct()
        {
            $this->model = new modeloProductos();
        }

        public function saveProducto($producto, $cantidad, $precio_unitario) {
            $id = $this->model->insert($producto, $cantidad, $precio_unitario);
            return ($id!=false) ? header("Location: ../index.php") : header("Location: frmProductos.php");
        }
//metodo que manda ejewcutar la funcion read del modelo y devuelve el resultado
        public function readProductos() {
            return($this->model->read()) ? $this->model->read() : false;
        }
    }

?>