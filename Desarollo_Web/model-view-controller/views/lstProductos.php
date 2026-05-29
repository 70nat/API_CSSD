<?php
    include_once("template/header.php");
    include_once("../controllers/controladorProductos.php");
    //ininstanciamos controlador para ejecutar la consulta.
    $objProductosController = new productosController();
    //capturamos los registros de la tabla en "filas".
    $rows = $objProductosController->readProductos();
?>
<div class="mx-auto p-5">
    <div class="card-text-center">
        <div class="card-header">
            LISTADO DE PRODUCTOS
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">PRODUCTO</th>
                        <th scope="col">CANTIDAD</th>
                        <th scope="col">PRECIO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($rows): ?>
                        <?php foreach ($rows as $row): ?>
                            <tr>
                                <th><?= $row['id'] ?></th>
                                <th><?= $row['producto'] ?></th>
                                <th><?= $row['cantidad'] ?></th>
                                <th><?= $row['precio_unitario'] ?></th>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan ="3" class="text-center">No hay productos registrados</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>