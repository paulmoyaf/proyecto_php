<!DOCTYPE html>
<html>
<head>
    <title>Añadir Item</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body class="container pt-5">

            <?php
            if (isset($message)) {
                echo "<div class=\"alert alert-success\" role=\"alert\"> $message </div>\n";
            }
            if (isset($messageWarning)) {
                echo "<div class=\"alert alert-warning\" role=\"alert\">$messageWarning </div>\n";
            }
            if (isset($messageError)) {
                echo "<div class=\"alert alert-danger\" role=\"alert\">$messageError </div>\n";
            }
            ?>


        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="">
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Descripcion Euskera</th>
                        <th scope="col">Descripcion Ingles</th>
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
                        <td><img src="../../<?php echo $imagen_url ?>" alt="imagen-item"></td>
                        <td><?php echo $nombre  ?></td>
                        <td class="text-truncate"><?php echo $descripcion ?></td>
                        <td class="text-truncate"><?php echo $descripcion_euskera ?></td>
                        <td class="text-truncate"><?php echo $descripcion_ingles ?></td>
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
        <a class="btn btn-outline-secondary" href="../../items/index.php" role="button">Regresar al Menu</a>

</body>
</html>