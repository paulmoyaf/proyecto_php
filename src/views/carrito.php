<!DOCTYPE html>
<html>

<head>
    <title>Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>


    <?php include '../includes/header.php'; ?>
    <?php include '../includes/nav.php';  ?>



    <div class="container py-5">

        <div class="container pb-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="display-6 text-center">Carrito</div>
            </div>
            <hr>
        </div>
        <div class="px-3" id="items-carrito">
            <div class="d-flex justify-content-between align-items-center pb-3">
                <div class="d-flex display-6">
                    <span class="mx-3">Total Carrito: </span>
                    <p id="valor-total"></p>
                    <p>€</p>
                </div>
                <button class="btn btn-danger btn-small" id="btn-delete-all" style="display: none">Vaciar Carrito</button>
            </div>
            
            <span class="" id="new-product"></span>

            <div class="d-none text-center" id="carro-vacio">
                <div class="alert alert-warning" role="alert">Su Carro está vacio</div>
                <img class="w-50" src="../assets/img/varios/carro-vacio.jpg" alt="carro-vacio">
            </div>

        </div>
    </div>

    <?php include '../includes/footer.php';  ?>


    <!-- <script>
        const productos = <?php echo $productosJSON; ?>;
        const categorias = <?php echo json_encode($categorias); ?>;
        const tiposProducto = <?php echo json_encode($tiposProducto); ?>;
        const tallas = <?php echo json_encode($tallas); ?>;
    </script> -->


    <script src="../assets/js/carrito.js"></script>
</body>

</html>