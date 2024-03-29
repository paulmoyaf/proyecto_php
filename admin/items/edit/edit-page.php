<!DOCTYPE html>
<html>

<head>
    <title>Editar Item</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../../../assets/css/style.css">

</head>

<body class="container py-5">

        <div class="header-titulo">       
            <a href='../../admin/index.php' >
                <img class="card-img-top logo" src="../../../assets/img/logo/logo.png" alt="Logo">
            </a>     
            <p class="h2 text-center">Editar Item</p>
        </div>
        <hr>

        <?php 
                    if (isset($messageWarning)) {
                        echo "<div class=\"alert alert-warning\" role=\"alert\">$messageWarning </div>\n";
                    }
                    if (isset($messageError)) {
                        echo "<div class=\"alert alert-warning\" role=\"alert\">$messageError </div>\n";
                    }
        ?>

        <div class="card">
            <div class="card-body">
                <form class="form-group" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group-item mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $nombre ?>" placeholder="Add name">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion:</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" value="<?php echo $descripcion ?>">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion Euskera:</label>
                        <input type="text" name="descripcion_euskera" id="descripcion_euskera" class="form-control" value="<?php echo $descripcion_euskera ?>">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion Ingles:</label>
                        <input type="text" name="descripcion_ingles" id="descripcion_ingles" class="form-control" value="<?php echo $descripcion_ingles ?>">
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
                        <label for="precio" class="form-label">Precio:</label>
                        <input type="text" name="precio" id="precio" class="form-control" value="<?php echo $precio  ?>">
                    </div>

                    <div class="mb-3">
                        <label for="descuento" class="form-label">Descuento:</label>
                        <input type="text" name="descuento" id="descuento" class="form-control" value="<?php echo $descuento ?>">
                    </div>

                    <!-- <div class="form-group-item mb-3">
                        <label for="imagen_url" class="form-label">Imagen:</label>
                        <div class="d-flex gap-3">
                            <img class="form-control w-25" src="../../<?php echo $producto->getImagenURL() ?>" alt="imagen-item">
                            <input style="height: 3em" type="text" name="imagen_url" id="imagen_url" class="form-control" value="<?php echo $imagen_url ?>" >
                        </div>
                    </div> -->
                    <div class="form-group-item mb-3">
                        <label class="form-label">Modelos:</label>
                        <div class="d-flex flex-wrap">
                            <?php for($i = 1; $i <= 9; $i++): ?>
                                <div class="m-2 image-option">
                                    <input type="radio" id="imagen_url<?php echo $i; ?>" name="imagen_url" value="../assets/img/camisetas/cam_<?php echo $i; ?>_.webp" style="display: none;" <?php if($producto->getImagenURL() == "../assets/img/camisetas/cam_".$i."_.webp") echo 'checked'; ?>>
                                    <label for="imagen_url<?php echo $i; ?>">
                                        <img src="../../../assets/img/camisetas/cam_<?php echo $i; ?>_.webp" alt="Imagen <?php echo $i; ?>" style="width: 100px;">
                                    </label>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="row gap-3 mx-3">
                        <input class="btn btn-success col" name="editar" type="submit" value="Actualizar">
                        <a class="btn btn-outline-secondary col" href="../../items/index.php" role="button">Regresar al Menu</a>
                    </div>
                </form>

            </div>
        </div>
        <script src="../../../assets/js/botonesImg.js"></script>

</body>

</html>