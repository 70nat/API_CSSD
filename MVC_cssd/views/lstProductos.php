<?php

include_once('./template/header.php');
require_once('../controllers/controladorProducto.php');

$objProductoController = new productosController();

$rows = $objProductoController->readProductos();

?>

<div class="mx-auto p-5">

<div class="card text-center">

<div class="card-header">
    LISTADO DE PRODUCTOS
</div>
<div class="card-body">
    <table class="table table-hover table-bordered">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">PRODCUTO</th>
                <th scope="col">CANTIDAD </th>
                <th scope="col">PRECIO</th>
            </tr>
        </thead>
        <tbody>
            <?php if($rows): ?>
                <?php foreach($rows as $row): ?>

                    <tr>
                        <th><?= $row['id'] ?></th>
                        <th><?= $row['producto'] ?></th>
                        <th><?= $row['cantidad'] ?></th>
                        <th><?= $row['precio_unitario'] ?></th>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">
                            No hay productos aún.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include_once('./template/footer.php');
?>
<div class="mx-auto p-2">
    <a href="../index.php" class="btn btn-primary">REGRESAR</a>
</div>

</div>


