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

    <?php if (isset($_POST['guardar'])) : ?>
        <div class="table-responsive">
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
                            <td><img src="../<?php echo $imagen_url ?>"></td>
                            <td><?php echo $nombre  ?></td>
                            <td><?php echo $descripcion ?></td>
                            <td><?php echo $categoria ?></td>
                            <td><?php echo $tiene_descuento ?></td>
                            <td><?php echo $precio  ?> €</td>
                        </tr>
                    </tbody>
            </table>

        </div>

        <a class="btn btn-outline-secondary" href="../../admin/index.php" role="button">Back To Menu</a>
    <?php else : ?>

        <div class="header-titulo">
            <img class="card-img-top logo" src="../../src/img/logo/logo.png" alt="Title">
            <p class="h2">Add Item</p>
        </div>
        <hr>

        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title text-end">New Item</h4> -->
                <!-- <p class="card-text">Add characterists of the new item</p> -->

                <form class="form-group" action="" method="post" enctype="multipart/form-data" required>
                    <div class="form-group-item mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Add title">
                    </div>
                    <div class="form-group-item mb-3">
                        <label for="descripcion" class="form-label">Descripcion:</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" >
                    </div>

                    <div class="form-group-item mb-3">
                        <label for="categoria" class="form-label">Categoria:</label>
                        <select class="form-select form-select-lg" name="categoria" id="categoria">
                            <option selected>New</option>
                            <option >Used</option>
                        </select>
                    </div>
                    <div class="form-group-item mb-3">
                        <label for="tiene_descuento" class="form-label">Descuento:</label>
                        <select class="form-select form-select-lg" name="tiene_descuento"  id="tiene_descuento">
                            <option selected>Prime</option>
                            <option >Regular</option>
                        </select>
                    </div>

                    <div class="form-group-item mb-3">
                        <label for="precio" class="form-label">Precio:</label>
                        <input type="text" name="precio" id="precio" class="form-control">
                    </div>
                    <div class="form-group-item mb-3">
                        <label for="imagen_url" class="form-label">Imagen:</label>
                        <input type="text" name="imagen_url" id="imagen_url" class="form-control" value="../src/img/camisetas/cam(#).png">
                        <!-- <input type="file" name="imagen_url" id="imagen_url" class="form-control"> -->
                    </div>
                    <div class="row gap-3 mx-3">
                        <input name="guardar" id="" class="btn btn-primary col" type="submit" value="Save">
                        <a class="btn btn-outline-secondary col" href="../../admin/index.php" role="button">Back to Menu</a>
                    </div>
                </form>
            </div>
        </div>


    <?php endif; ?>

</body>

</html>