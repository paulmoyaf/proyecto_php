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
                <div class="display-6 text-center"><?php echo $textos['carrito']; ?></div>
            </div>
            <hr>
        </div>
        <div class="px-3" id="items-carrito">
            <div class="d-flex justify-content-between align-items-center pb-3">
                <div class="d-flex display-6">
                    <span class="mx-3"><?php echo $textos['precio-total']; ?></span>
                    <p id="valor-total"></p>
                    <p>€</p>
                </div>
                <button class="btn btn-danger btn-small" id="btn-delete-all" style="display: none"><?php echo $textos['vaciar-carrito']; ?></button>
            </div>


            <div class="row">
                <div class="col-12 col-md-4 col-lg-4 pb-3 order-2 order-md-1">
                    <?php
                    include '../includes/formContactCar.php';
                    ?>
                </div>
                
                
                <div class="col-12 col-md-8 col-lg-8 order-1 order-md-2">
                    <div id="contenedor-carrito" class="card bg-light p-3 mb-3 d-none">
                        <div class="card-title text-dark"><?php echo $textos['productos-agregado-carrito']; ?> ✔️</div>
                        <div class="d-flex flex-wrap" id="new-product"></div>
                    </div>
                    
                    <div class="d-none text-center pb-3" id="carro-vacio">
                        <div class="alert alert-warning" role="alert"><?php echo $textos['mensaje-carro-vacio']; ?></div>
                        <img class="w-100 w-md-50 w-lg-50" src="../assets/img/varios/carro-vacio.jpg" alt="carro-vacio">
                    </div>
                </div>
            </div>


        </div>
    </div>

    <?php include '../includes/footer.php';  ?>

    <script src="../assets/js/carrito.js"></script>
    <script src="../assets/js/insertarPedido.js"></script>
</body>

</html>