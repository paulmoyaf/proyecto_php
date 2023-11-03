
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

<?php require('logic.php'); ?>

        <div class="header-titulo">            
            <img class="card-img-top logo" src="../../src/img/logo/logo.png" alt="Title">
            <p class="h2 text-center">View Item</p>
        </div>
        <hr>

        <div class="table-responsive mt-5">
                <table class="table table-bordered text-center">
                    <thead class="">
                        <tr>
                            <th scope="col">Imagen</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Descuento</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <tr class="">
                            <td><img src="../<?php echo $producto->getImagenURL()  ?>"></td>
                            <td><?php echo $producto->getNombre()  ?></td>
                            <td><?php echo $producto->getDescripcion() ?></td>
                            <td><?php echo $producto->getCategoria() ?></td>
                            <td><?php echo $producto->getTieneDescuento() ?></td>
                            <td><?php echo $producto->getPrecio()  ?> €</td>
                        </tr>
                    </tbody>
                </table>
        </div>

            <div class="d-flex justify-content-between gap-3 row mx-5">
                <a class="btn btn-primary col" href='../edit/edit-page.php?id=<?= $producto->getId() ?>'>Edit</a>
                <a class="btn btn-danger col" href='../remove/remove-page.php?id=<?= $producto->getId() ?>'>Remove</a>        
                <a class="btn btn-outline-secondary col" href="../../admin/index.php" role="button">Regresar al Menu</a>
            </div>

</body>

</html>