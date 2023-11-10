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
        <a class="btn btn-outline-secondary" href="../../admin/index.php" role="button">Back To Menu</a>

</body>
</html>