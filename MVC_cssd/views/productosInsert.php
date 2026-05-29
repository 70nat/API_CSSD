<?php
    require_once("../controllers/controladorProducto.php");
    $producto = $_POST['txtProducto'];
    $cantidad = $_POST['txtCantidad'];
    $precio = $_POST['txtPrecio'];

    $objController = new productosController();
    $objController->saveProducto($producto, $cantidad, $precio);
?>
