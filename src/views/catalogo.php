<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/head.php'; ?>
</head>

<body>


    <?php include '../includes/header.php'; ?>
    <?php include '../includes/nav.php';  ?>

<main class="custom-dashboard">



    <div class="container-fluid py-5" style="min-height: 100vh;">


    <div class="card text-dark bg-light p-3 mx-3">
                <p class="card-text"><?php echo $textos['buscar']; ?>:</p>
                <input type="text" class="dropdown" id="search-input" placeholder="<?php echo $textos['buscar-producto']; ?>">
            <div id="results-container"></div>
    </div> 

        <div class="p-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="display-6 text-center"><?php echo $textos['catalogo']; ?></div>
                <div class="right-side d-grid mx-3">
                    <h6 class="h6"><?php echo $textos['categorias']; ?></h6>
                    <div id="btn-categorias"></div>
                </div>
            </div>
            <hr>
        </div>

        <div class="row d-flex flex-wrap-reverse">
            <div class="col-md-8 col-12 div-productos">
                
                <div class="d-flex flex-wrap" id="lista-items">
                    <?php foreach ($productos as $producto) :
                        $nombre_tipo_producto = ProductosDB::obtenerNombreTipoProducto($producto->getTipoProductoId());
                        $nombre_tipo_categoria = ProductosDB::obtenerNombreTipoCategoria($producto->getCategoriaId());
                    ?>
                        <div class="col-lg-4 col-md-4 col-6 pb-5 px-3">

                            <div class="card bg-light text-center">
                                <a class="link-dark" href='../public/catalogo.php?id=<?= $producto->getId() ?>'>
                                    <div class="card-header"><?php echo $nombre_tipo_categoria ?></div>
                                    <div class="card-body">
                                        <img id="img-producto" src="<?php echo $producto->getImagenURL() ?>" class="img-fluid rounded-start py-3" style="width: 15em" alt="Card title">
                                        <h5 class="card-title"><?php echo $producto->getNombre() ?></h5>
                                        <p class="card-text text-muted"><?php echo $producto->getDescripcion() ?></p>
                                        <p class="card-text text-muted" id="tipo-producto"><?php echo $textos['tipo']; ?> <strong><?php echo $nombre_tipo_producto ?></strong> </p>
                                        <?php if ($producto->getTipoProductoId() == 1): ?>
                                            <div class="d-flex justify-content-center align-items-center gap-2">

                                                <div class="card-text <?php echo $producto->getTipoProductoId() == 1 ? 'text-decoration-line-through text-danger' : ''; ?>">
                                                        <?php echo $producto->getPrecio() ?>€
                                                </div>
                                                    
                                                <div class="d-flex flex-column flex-lg-row gap-1 align-items-center">
                                                    <div class="text-danger"><?php echo $textos['oferta']; ?>:
                                                    </div>
                                                    <!-- <div class="font-sm text-light rounded bg-danger">-<?php echo $producto->getTipoProductoId() == 1 ? $producto->getDescuento() . '%' : ''; ?></div> -->
                                                    <span class="badge bg-danger">
                                                        <p class="text-light m-0">-<?php echo $producto->getTipoProductoId() == 1 ? $producto->getDescuento() . '%' : ''; ?></p>
                                                    </span>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </a>
                                <div class="card-footer">
                                    <p class="card-text" style="font-size: larger;" id="price-producto"><?php echo $producto->getPrecioFinal() ?>€</p>
                                </div>
                                <!-- <button class="btn btn-warning w-100 btn-add" id="btn-add-to-car"><?php echo $textos['agregar-carrito']; ?></button> -->
                                <button class="btn btn-warning w-100 btn-add"  id="btn-add-to-car" data-descuento="<?php echo $producto->getDescuento()?>" data-nombre="<?php echo $producto->getNombre() ?>" data-imagen="<?php echo $producto->getImagenURL() ?>" data-precio="<?php echo $producto->getPrecioFinal() ?>" data-tipo="<?php echo $producto->getTipoProductoId() ?>"><?php echo $textos['agregar-carrito']; ?></button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="d-flex flex-wrap" id="lista-items-filter" style="display: none"></div>
            </div>
            <div class="col-md-4 col-12 px-3" id="div-carrito">

                <div class="d-flex justify-content-between pb-2">
                    <p class="lead font-weight-bold"><?php echo $textos['carrito']; ?></p>
                    <button class="btn btn-danger btn-small" id="btn-delete-all" style="display: none"><?php echo $textos['vaciar-carrito']; ?></button>
                </div>
                <div class="d-flex">
                    <p class="mx-2"><?php echo $textos['precio-total']; ?>: </p>
                    <p id="valor-total"></p>
                    <p>€</p>
                </div>
                
                <hr>
                
                <div id="contenedor-carrito" class="card bg-secondary p-3 mb-3 d-none">
                    <div class="card-title text-light"><?php echo $textos['carrito-titulo']; ?> ✔️</div>
                    <div class="d-flex flex-wrap" id="new-product"></div>                
                </div>

                

            </div>
        </div>
    </div>
    <?php include '../includes/footer.php';  ?>
    </main>


    <script>
        const productos = <?php echo $productosJSON; ?>;
    </script>
    <script>
        const categorias = <?php echo json_encode($categorias); ?>;
    </script>
    <script>
        const tiposProducto = <?php echo json_encode($tiposProducto); ?>;
    </script>
    <script>
        const tallas = <?php echo json_encode($tallas); ?>;
    </script>


    <script src="../assets/js/carrito.js"></script>
</body>

</html>