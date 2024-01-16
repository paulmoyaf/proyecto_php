<!DOCTYPE html>
<html>

<head>
    <title>View Message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


</head>

<body class="container py-5">

    <div class="header-titulo">
    <a href='../../admin/index.php' >
                <img class="card-img-top logo" src="../../assets/img/logo/logo.png" alt="Logo">
            </a>     
        <p class="h2 text-center">View Users</p>
    </div>
    <hr>


    <p class="display mb-3">Modo recreativo =)</p>
    <div class="card text-dark bg-light p-3 mb-5">
        <div class="row">
            <div class="col">
                <p class="card-text">Seleccione Usuario:</p>
                <input type="text" id="search-input" placeholder="Buscar por Primer Nombre">
            </div>
            <div class="col">
                <p class="card-text">Resultados:</p>
                <hr>
                <div id="results-container"></div>
            </div>
        </div>
    </div>







    <div class="d-flex justify-content-between gap-3 row mx-5">

        <a class="btn btn-outline-secondary col" href="../../admin/index.php" role="button">Regresar al Menu</a>
    </div>

    <script src="../../assets/js/users.js"></script>
</body>

</html>