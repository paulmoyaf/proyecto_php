<!DOCTYPE html>
<html>
<head>
    <title>Base de Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body class="container pt-5">

        <div class="header-titulo">
            <img class="card-img-top logo" src="../../assets/img/logo/logo.png" alt="Title">
            <p class="h2">Add Item</p>
        </div>
        <hr>
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title text-end">New Item</h4> -->
                <!-- <p class="card-text">Add characterists of the new item</p> -->
                <form class="form-group" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group-item mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Add name" required>
                    </div>
                    <div class="form-group-item mb-3">
                        <label for="descripcion" class="form-label">Descripcion:</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control">
                    </div>
                    <div class="form-group-item mb-3">
                        <label for="categoria_id" class="form-label">Categoria:</label>
                        <select class="form-select form-select-md" name="categoria_id" id="categoria_id" class="form-control" required>
                            <option value="" selected>Seleccionar categoría</option>
                            <?php foreach ($categorias as $categoria) { ?>
                                <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group-item mb-3">
                        <label for="talla_id" class="form-label">Talla:</label>
                        <select class="form-select form-select-md" name="talla_id" class="form-control" required>
                            <option value="" selected>Seleccionar Talla</option>
                            <?php foreach ($tallas as $talla) { ?>
                                <option value="<?php echo $talla['id']; ?>"><?php echo $talla['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group-item mb-3">
                        <label for="tipo_producto_id" class="form-label">Tipo:</label>
                        <select class="form-select form-select-md" name="tipo_producto_id" class="form-control" required>
                            <option value="" selected>Seleccionar Tipo del Producto</option>
                            <?php foreach ($tipos_producto as $tipo_producto) { ?>
                                <option value="<?php echo $tipo_producto['id']; ?>"><?php echo $tipo_producto['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group-item mb-3">
                        <label for="precio" class="form-label">Precio:</label>
                        <input type="text" name="precio" id="precio" class="form-control" required>
                    </div>
                    <div class="form-group-item mb-3">
                        <label for="descuento" class="form-label">Descuento:</label>
                        <input type="text" name="descuento" id="descuento" class="form-control">
                    </div>
                    <div class="form-group-item mb-3">
                        <label for="imagen_url" class="form-label">Imagen:</label>
                        <input type="text" name="imagen_url" id="imagen_url" class="form-control" value="../assets/img/camisetas/cam(#).png">
                        <!-- <input type="file" name="imagen_url" id="imagen_url" class="form-control"> -->
                    </div>
                    <div class="row gap-3 mx-3">
                        <input name="guardar" id="" class="btn btn-primary col" type="submit" value="Save">
                        <a class="btn btn-outline-secondary col" href="../../admin/index.php" role="button">Back to Menu</a>
                    </div>
                </form>
            </div>
        </div>

</body>
</html>