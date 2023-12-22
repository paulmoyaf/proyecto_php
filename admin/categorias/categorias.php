<!DOCTYPE html>
<html>

<head>
    <title>Add Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body class="container py-5">


    <div class="header-titulo">
        <img class="card-img-top logo" src="../../assets/img/logo/logo.png" alt="Title">
        <p class="h2">Add Category</p>
    </div>
    <hr>

    <div class="d-flex justify-content-between gap-3 row mx-5 mb-3">
        <a class="btn btn-outline-secondary col" href="add.php" role="button">Add Category</a>
        <a class="btn btn-outline-secondary col" href="index.php" role="button">List Categories</a>
        <a class="btn btn-outline-secondary col" href="../../admin/index.php" role="button">Regresar al Menu</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover text-center">
                                <thead class="align-middle">
                                    <tr class="table-light" >
                                        <th scope="col">Id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
            <tbody>
            <tr id="categoria-template" style="display: none;">
                    <td class="categoria-id"></td>
                    <td class="categoria-nombre"></td>
                    <td >
                        <a class="btn btn-outline-secondary btn-sm mb-1 disabled categoria-edit" href="#">Edit</a>
                        <a class="btn btn-danger btn-sm disabled categoria-delete" href="#">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="card mt-5">
    <div class="card-body">

    <form id="categoria-form" class="row g-3 needs-validation" novalidate>
    <label for="nombre" class="form-label">Añadir nueva categoria</label>
    <div class="d-flex">
        <input type="text" class="form-control" id="nombre" placeholder="Categoria Nueva" required>
        <div class="invalid-feedback">
            Ponga un nombre valido
        </div>
        <button id="btn-agregar" class="btn btn-success" type="button">Añadir Categoria</button>
    </div>
</form>

</div>


    <script>var categorias = <?php echo $categoriasJSON; ?>;</script>
    <script src="../../assets/js/categorias.js"></script>

</body>


</html>