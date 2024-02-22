<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/head.php'; ?>
</head>

<body>


    <?php include '../includes/header.php'; ?>
    <?php include '../includes/nav.php';  ?>



    <div class="container py-5" style="min-height: 100vh;">

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
            
            <div class="d-flex d-md-block flex-wrap" id="new-product"></div>

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