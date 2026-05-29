<?php
include_once ('./template/header.php');
?>

<div class="auto-mx p-5">
    <div class="form">
        <form action="productosInsert.php" method="post">
            <div class="mx-3">
                <label for="producto" class="form-label">PRODUCTO</label>
                <input type="text" class="form-control" name="txtProducto" id="producto">
            </div>
            <div class="mx-3">
                <label for="cantidad" class="form-label">CANTIDAD</label>
                <input type="text" class="form-control" name="txtCantidad" id="cantidad">
            </div>
            <div class="mx-3">
                <label for="precio" class="form-label">PRECIO</label>
                <input type="text" class="form-control" name="txtPrecio" id="precio">
            </div>
            <div class=" col mx-3">
                <button type="submit" class="btn btn-primary">GUARDAR</button>
                <a href="../index.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<?php
    include_once ('./template/footer.php');

