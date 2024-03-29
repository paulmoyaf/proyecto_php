<!DOCTYPE html>
<html>

<head>
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>

<body class="container">
    <div class="row">
        <div class="py-5 col-md-6 col-12 custom-width">
            <h1 class="h3 text-black-50 text-end">Administrador</h1>              
                <div class="card mt-5">
                    <div class="card-body bg-light">
                        
                        <img class="card-img-top rounded-3 pb-5" src="../assets/img/portadas/BannerHorizontal.jpg" alt="BANNER">
                    <form action="index.php" method="post">
                        <div class="">
                            <label for="usuario" class="form-label">Usuario:</label>
                            <input type="text" class="form-control" id="usuario" name="usuario">
                        </div>
                        <div class="mb-3 pt-2">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" name="password" id="" >
                        </div>
                        <input type="submit" class="btn btn-outline-dark w-100" name="ingresar" value="Ingresar">
                    </form>
                </div>
            </div>
            <?php
            if (isset($error_message)) {
                echo "<div class=\"alert alert-warning\" role=\"alert\">
                $error_message </div> \n";
            }
            ?>
            <a href="../index.php" class="btn btn-warning w-100">Pagina Inicial</a>

        </div>
    </div>

</body>

</html>