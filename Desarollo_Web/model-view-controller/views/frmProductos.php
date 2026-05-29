<?php

    include_once('./template/header.php');
?>

<div class="auto-mx p-5">
    <div class="form">
        <form action="productosInsert.php" method="post">
            <div class="mb-3">
                <label for="producto" class="form-label">PRDUCTO</label>
                <input type="text" class= "form-control" name="txtProducto" id="producto"> 
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">CANTIDAD</label>
                <input type="text" name="txtCantidad" id="cantidad" class="form-control"> 
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">PRECIO</label>
                <input type="text" name="txtPrecio" id="precio" class="form-control"> 
            </div>
            <div class="col mb-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="index.php" class="btn btn-danger">Cancelar</a> 
            </div>
        </form>
    </div>
</div>

<?php
    include_once('./template/footer.php');
?>