<!DOCTYPE html>
<html>

<head>
    <title>Base de Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


</head>

<body class="">


    <?php require('logic.php'); ?>
    <?php include 'includes/nav.php'; ?>

    <div class="container">




        <div class="header-titulo pt-5">
            <!-- <img class="card-img-top logo" src="../src/img/logo/logo.png" alt="Title"> -->
            <p class="display-5 text-center">View Item</p>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-6 col-12 text-center p-5">

                <img class="card-img-top" src="./<?php echo $producto->getImagenURL()  ?>">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $producto->getNombre()  ?></h4>
                    <p class="card-text"><?php echo $producto->getDescripcion()  ?></p>
                </div>
            </div>

            <div class="col-md-6 col-12 p-5">
                <div class="h3">Caracteristicas</div>
                <hr>
                <ul>
                    <li>Modelo: <?php echo $producto->getDescripcion() ?></li>
                    <!-- <li><?php echo $producto->getTieneDescuento() ?></li> -->
                    <li>Tipo de Producto: <?php echo $producto->getDescuento() ?></li>
                </ul>
                <p class="display-6"><?php echo $producto->getPrecio()  ?> €</p>

                <div class="row form-group">
                    <div class="mb-3 col">
                        <select class="form-select form-select-md" name="" id="">
                            <option selected>- Seleccionar la Talla -</option>
                            <option value="">Small</option>
                            <option value="">Medium</option>
                            <option value="">Large</option>
                        </select>
                    </div>
                    <div class="form-outline col">
                        <input type="number" id="typeNumber" class="form-control form-select-md" placeholder="Cantidad" min="0" />
                        <!-- <label class="form-label" for="typeNumber">Number input</label> -->
                    </div>
                </div>

                <input type="button" class="btn btn-primary w-100" value="AGREGAR AL CARRITO">
            </div>


            <!-- <div class="table-responsive mt-5">
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
                            <td><img src="./<?php echo $producto->getImagenURL()  ?>"></td>
                            <td><?php echo $producto->getNombre()  ?></td>
                            <td><?php echo $producto->getDescripcion() ?></td>
                            <td><?php echo $producto->getCategoria() ?></td>
                            <td><?php echo $producto->getTieneDescuento() ?></td>
                            <td><?php echo $producto->getPrecio()  ?> €</td>
                        </tr>
                    </tbody>
                </table>
            </div> -->

        </div>
        </div>
        <?php include 'includes/footer.php'; ?>
</body>

</html>