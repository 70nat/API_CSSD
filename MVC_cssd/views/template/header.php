<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<?php
    $basePath = (strpos($_SERVER['PHP_SELF'], '/views/') !== false) ? '..' : '.';
?>

<body class="d-flex flex-column min-vh-100">
    <ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="<?= $basePath ?>/index.php">Inicio</a>
  </li>
 <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="<?= $basePath ?>/views/frmProductos.php">Producto</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="<?= $basePath ?>/views/lstProductos.php">Lista de productos</a>
  </li>
</ul>
<main class="flex-grow-1">
