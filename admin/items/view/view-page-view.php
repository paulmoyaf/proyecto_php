
<!DOCTYPE html>
<html>

<head>
    <title>Ver Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


</head>

<body class="container py-5">

        <div class="header-titulo">       
            <a href='../../admin/index.php' >
                <img class="card-img-top logo" src="../../../assets/img/logo/logo.png" alt="Logo">
            </a>     

            <p class="h2 text-center">Ver Item</p>
        </div>
        <hr>

        <div class="table-responsive mt-5">
                <table class="table table-bordered text-center">
                    <thead class="">
                        <tr>
                            <th scope="col">Imagen</th>
                            <th scope="col">Nombre</th>
                            <th class="w-25" scope="col">Descripcion</th>
                            <!-- <th class="w-25" scope="col">Descripcion Eus</th>
                            <th class="w-25" scope="col">Descripcion Ing</th> -->
                            <th scope="col">Categoria</th>
                            <th scope="col">Talla</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Descuento</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Precio Final</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <tr class="">
                            <td><img src="../../<?php echo $producto->getImagenURL()  ?>" alt="imagen-item"></td>
                            <td><?php echo $producto->getNombre()  ?></td>
                            <td class="text-truncate w-25"><?php echo $producto->getDescripcion() ?></td>
                            <!-- <td class="text-truncate w-25"><?php echo $producto->getDescripcionEus() ?></td>
                            <td class="text-truncate w-25"><?php echo $producto->getDescripcionEn() ?></td> -->
                            <td><?php echo $nombre_tipo_categoria ?></td>
                            <td><?php echo $nombre_talla ?></td>
                            <td><?php echo $nombre_tipo_producto ?></td>
                            <td><?php echo $producto->getDescuento()  ?>%</td>
                            <td><?php echo $producto->getPrecio()  ?> €</td>
                            <td><?php echo $producto->getPrecioFinal()  ?> €</td>
                            <td>
                                <a class="btn btn-outline-secondary mb-2" href='../edit/index.php?id=<?= $producto->getId() ?>'>Editar</a>
                                <a class="btn btn-danger" href='../remove/index.php?id=<?= $producto->getId() ?>'>Borrar</a>        
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
        <button class="btn btn-outline-secondary my-2 btn-sm w-100" onclick="window.location.href='../../items/index.php'">Regresar al Menú</button> 

</body>

</html>
