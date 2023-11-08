<!DOCTYPE html>
<html>

<head>
    <title>Base de Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">

</head>

<body class="container pt-5">
    <?php require('logic.php'); ?>

    <?php if (isset($_POST['editar'])) :
        $nombre_categoria_nuevo = ProductosDB::obtenerNombreTalla($categoria_id); 
        $nombre_talla_nuevo = ProductosDB::obtenerNombreTalla($talla_id); 
        $nombre_tipo_nuevo = ProductosDB::obtenerNombreTalla($tipo_producto_id); 
        ?>
        <div class="table-responsive">

            <table class="table table-bordered text-center">
                <thead class="">
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Talla</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Descuento</th>
                        <th scope="col">Precio Final</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <tr class="">
                        <td><img src="../<?php echo $imagen_url ?>"></td>
                        <td><?php echo $nombre  ?></td>
                        <td><?php echo $descripcion ?></td>
                        <td><?php echo $nombre_categoria_nuevo ?></td>
                        <td><?php echo $nombre_talla_nuevo ?></td>
                        <td><?php echo $nombre_tipo_nuevo ?></td>
                        <td><?php echo $precio  ?> €</td>
                        <td><?php echo $descuento ?>%</td>
                        <td><?php echo $producto->getPrecioFinal() ?>€</td>
                    </tr>
                </tbody>
            </table>


        </div>
        <a class="btn btn-outline-secondary" href="../../admin/index.php" role="button">Regresar al Menú</a>
    <?php else : ?>

        <div class="header-titulo">
            <img class="card-img-top logo" src="../../assets/img/logo/logo.png" alt="Logo">
            <p class="h2">Edit Item</p>
        </div>
        <hr>

        <div class="card">
            <div class="card-body">
                <form class="form-group" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group-item mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $producto->getNombre() ?>" placeholder="Add title" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion:</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" value="<?php echo $producto->getDescripcion() ?>">
                    </div>

                    <div class="form-group-item mb-3">
                        <label for="categoria_id" class="form-label">Categoria:</label>
                        <select class="form-select form-select-md" name="categoria_id" id="categoria_id" class="form-control">
                            <?php foreach ($categorias as $categoria) { ?>
                                <option value="<?php echo $categoria['id']; ?>" <?php if ($categoria['nombre'] == $nombre_tipo_categoria) echo 'selected'; ?>><?php echo $categoria['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group-item mb-3">
                        <label for="talla_id" class="form-label">Talla:</label>
                        <select class="form-select form-select-md" name="talla_id">
                            <?php foreach ($tallas as $talla) { ?>
                                <option value="<?php echo $talla['id']; ?>" <?php if ($talla['nombre'] == $nombre_talla) echo 'selected'; ?>><?php echo $talla['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="form-group-item mb-3">
                        <label for="tipo_producto_id" class="form-label">Tipo:</label>
                        <select class="form-select form-select-md" name="tipo_producto_id">
                            <?php foreach ($tipos_producto as $tipo_producto) { ?>
                                <option value="<?php echo $tipo_producto['id']; ?>" <?php if ($tipo_producto['nombre'] == $nombre_tipo_producto) echo 'selected'; ?>><?php echo $tipo_producto['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="descuento" class="form-label">Descuento:</label>
                        <input type="text" name="descuento" id="descuento" class="form-control" value="<?php echo $producto->getDescuento() ?>">
                    </div>

                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio:</label>
                        <input type="text" name="precio" id="precio" class="form-control" value="<?php echo $producto->getPrecio() ?>">
                    </div>

                    <div class="form-group-item mb-3">
                        <label for="imagen_url" class="form-label">Imagen:</label>
                        <div class="d-flex gap-3">
                            <img class="form-control w-25" src="../<?php echo $producto->getImagenURL() ?>" alt="">
                            <input style="height: 3em" type="text" name="imagen_url" id="imagen_url" class="form-control" value="<?php echo $producto->getImagenURL() ?>">
                        </div>
                        <!-- <input type="file" name="imagen_url" id="imagen_url" class="form-control"> -->
                    </div>
                    <div class="row gap-3 mx-3">
                        <input class="btn btn-success col" name="editar" type="submit" value="Update">
                        <a class="btn btn-outline-secondary col" href="../../admin/index.php" role="button">Back to Menu</a>
                    </div>
                </form>

            </div>
        </div>

    <?php endif; ?>
</body>

</html>