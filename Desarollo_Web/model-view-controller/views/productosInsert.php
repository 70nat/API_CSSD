<?php
    
    require_once("../controllers/controladorProductos.php");
    $producto = $_POST['txtProducto'];
    $cantidad = $_POST['txtCantidad'];
    $precio = $_POST['txtPrecio'];
//instancia del controlador
    $objController = new productosController();
    $objController->saveProducto($producto, $cantidad, $precio);
?>