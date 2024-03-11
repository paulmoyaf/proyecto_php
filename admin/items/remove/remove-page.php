<!DOCTYPE html>
<html>

<head>
    <title>Borrar Item</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../assets/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


</head>

<body class="container py-5">

    <div class="header-titulo">
    <a href='../../items/index.php' >
                <img class="card-img-top logo" src="../../../assets/img/logo/logo.png" alt="Logo">
            </a>     
        <p class="h2">Borrar Item</p>
    </div>
    <hr>

    <?php

    if (isset($messageError)) {
        echo "<div class=\"alert alert-warning\" role=\"alert\">$messageError </div>\n";
    }
    ?>

    <div class="table-responsive mt-5">

        <table class="table table-bordered text-center">
            <thead class="">
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Talla</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Descuento</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Precio Final</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                <tr class="">
                    <td><img src="../../<?php echo $producto->getImagenURL()  ?>"></td>
                    <td><?php echo $producto->getNombre()  ?></td>
                    <td><?php echo $producto->getDescripcion() ?></td>
                    <td><?php echo $nombre_tipo_categoria ?></td>
                    <td><?php echo $nombre_talla ?></td>
                    <td><?php echo $nombre_tipo_producto ?></td>
                    <td><?php echo $producto->getDescuento()  ?>%</td>
                    <td><?php echo $producto->getPrecio()  ?> €</td>
                    <td><?php echo $producto->getPrecioFinal()  ?> €</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row gap-3 m-3">
        <form action="" method="post" class="col">
            <input type="hidden" name="eliminar" value="<?php echo $producto->getId() ?>">
            <input type="submit" value="Borrar Item" class="btn btn-danger btn-sm w-100">
        </form>
        <button class="btn btn-outline-secondary col btn-sm w-100" onclick="window.location.href='../../items/index.php'">Regresar al Menú</button> 
    </div>

</body>

</html>