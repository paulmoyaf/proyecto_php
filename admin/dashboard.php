<!DOCTYPE html>
<html>

<head>
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body class="container">
    <div class="row">
        <div class="py-5 col-md-6 col-12 custom-dashboard">
            <div class="d-flex justify-content-between">
                <img class="card-img-top logo" src="../src/img/logo/logo.png" alt="Title">
                <h1 class="h3 text-black-50 text-end">Menu - Administrador</h1>
                <button class="btn btn-warning" onclick="window.location.href='logout.php'">Log Out</button>
            </div>
            <hr>
            <div class="card bg-light">
                <img class="card-img-top" src="../src/img/portadas/camisetasBannerHorizontal.jpg" alt="Portada_Dashboard">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title text-uppercase text-center">List Items</h4>
                        <button class="btn btn-outline-dark" onclick="window.location.href='../admin/add/add-page.php'">Add New Item</button>                    </div>
                    <hr>
                    <div class="">
                            <div class="card-products">
                                <?php foreach ($productos as $producto) : ?>
                                    <div class="card">
                                            <a href="../admin/view/view-page.php?id=<?= $producto->getId() ?>">
                                            <img class="card-img-top" src=<?= $producto->getImagenURL()?>>
                                            <div class="card-body">
                                                <h4 class="card-title"><?= $producto->getNombre() ?></h4>
                                                <p class="card-text text-price"><?= $producto->getDescripcion() ?></p>
                                                <p class="card-text text-price"><?= $producto->getPrecio() ?> €</p>
                                            </a>
                                                <span class="">[<a class="text-success" href='../admin/edit/edit-page.php?id=<?= $producto->getId()?>'>Edit</a>]</span>
                                                <span class="">[<a class="text-danger"  href='../admin/remove/remove-page.php?id=<?= $producto->getId() ?>'>Delete</a>]</span>                      
                                            </div>
                                        
                                    </div>
                                    <?php endforeach; ?>

                            </div>
                        
                    </div>
                        <div class="d-flex flex-column gap-5 pt-3">
                            <!-- <button class="btn btn-outline-dark" onclick="window.location.href='../admin/add/add-page.php'">Add New Item</button> -->
                            <!-- <button class="btn btn-outline-danger" onclick="window.location.href='logout.php'">Cerrar Sesion</button> -->
                        </div>
                    </div>
                </div>
                <!-- <button class="btn btn-danger w-100" onclick="window.location.href='logout.php'">Log Out</button> -->
            </div>
        </div>
    </div>
</body>

</html>