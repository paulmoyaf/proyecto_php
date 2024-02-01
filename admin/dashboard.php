<!DOCTYPE html>
<html>

<head>
    <title>Menu Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body class="container-admin">

    <div class="container">
        <div class="row">
            <div class="py-5 col-md-6 col-12 custom-dashboard">
                <div class="d-flex justify-content-between align-items-center">
                    <a href='../admin/index.php'>
                        <img class="card-img-top logo" src="../assets/img/logo/logo.png" alt="Logo">
                    </a>
                    <h1 class="h3 text-end">Menu - Administrador</h1>
                    <button class="btn btn-warning btn-sm " onclick="window.location.href='logout.php'" style="height: fit-content">Cerrar Sesión</button>

                </div>
                <hr>

                <div class="card mt-5">

                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 my-4">
                                <button id="btn-opciones" class="btn btn-dark" onclick="window.location.href='../admin/items/index.php'">
                                    <img src="../assets/img/iconos/stock.png" alt="Imagen del botón">
                                    Items
                                </button>
                            </div>
                            <div class="col-md-4 col-sm-12 my-4">
                                <button id="btn-opciones" class="btn btn-dark" onclick="window.location.href='../admin/categorias/index.php'">
                                    <img src="../assets/img/iconos/categorias2.png" alt="Imagen del botón">
                                    Categorias
                                </button>
                            </div>
                            <div class="col-md-4 col-sm-12 my-4">
                                <button id="btn-opciones" class="btn btn-dark" onclick="window.location.href='../admin/messages/index.php'">
                                    <img src="../assets/img/iconos/mensajes.png" alt="Imagen del botón">
                                    Mensajes
                                </button>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>
    </div>

</body>

</html>