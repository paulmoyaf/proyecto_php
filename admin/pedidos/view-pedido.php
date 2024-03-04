<!DOCTYPE html>
<html>

<head>
    <title>Ver pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


</head>

<body class="container py-5">

    <div class="header-titulo">
        <a href='../../admin/index.php'>
            <img class="card-img-top logo" src="../../assets/img/logo/logo.png" alt="Logo">
        </a>
        <p class="h2 text-center">Ver pedido</p>
    </div>
    <hr>

    <div class="mb-3">

        <div class="d-flex align-items-top gap-5">

            <div class="pedido-view">
                <h4>Datos del Cliente:</h4>
                <div class="d-flex align-items-center gap-3">
                    <label for="" class="form-label">Fecha del Pedido:</label>
                    <input type="text" readonly class="form-control text-truncate text-center w-75 text-truncate"
                        value="<?= htmlspecialchars($cliente->getCreateDate()) ?>">
                </div>
                <div class="d-flex align-items-center gap-3">
                    <label for="" class="form-label">Nombre:</label>
                    <input type="text" readonly class="form-control text-center w-75 text-truncate"
                        value="<?= htmlspecialchars($cliente->getNombre()) ?>">
                </div>
                <div class="d-flex align-items-center gap-3">
                    <label for="" class="form-label">Email:</label>
                    <input type="text" readonly class="form-control text-center w-75 text-truncate"
                        value="<?= htmlspecialchars($cliente->getEmail()) ?>">
                </div>
                <div class="d-flex align-items-center gap-3">
                    <label for="" class="form-label">Dirección:</label>
                    <input type="text" readonly class="form-control text-center w-75 text-truncate"
                        value="<?= htmlspecialchars($cliente->getDireccion()) ?>">
                </div>
                <div class="d-flex align-items-center gap-3">
                    <label for="" class="form-label">Ciudad:</label>
                    <input type="text" readonly class="form-control text-center w-75 text-truncate"
                        value="<?= htmlspecialchars($cliente->getCiudad()) ?>">
                </div>
                <div class="d-flex align-items-center gap-3">
                    <label for="" class="form-label">Codigo Postal:</label>
                    <input type="text" readonly class="form-control text-center w-75 text-truncate"
                        value="<?= htmlspecialchars($cliente->getCodigoPostal()) ?>">
                </div>

            </div>

            <div class="w-100">
                <div>
                    <h4>Detalle del Pedido:</h4>
                    <div class="d-flex align-items-center gap-3">
                        <label for="" class="form-label w-25 text-end">Precio Total Pedido:</label>
                        <input type="text" readonly class="form-control text-center w-25 text-truncate"
                        value="<?= htmlspecialchars($cliente->getPrecioTotal()) ?> €">
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <label for="" class="form-label w-25 text-end">Cantidad de Items Comprados:</label>
                        <input type="text" readonly class="form-control text-center w-25 text-truncate"
                        value="<?= htmlspecialchars($cliente->getTotalProductos()) ?> uds.">
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <label for="" class="form-label w-25 text-end">Status:</label>
                        <input type="text" readonly class="form-control text-center w-25 text-truncate"
                        value="<?= htmlspecialchars($cliente->getEstado()) ?>">
                    </div>
                    <div class="d-flex gap-3 mt-3">
                        <button class="btn btn-warning" id="btn-enviar">Enviar Pedido</button>
                        <button class="btn btn-danger" id="btn-eliminar">Eliminar Pedido</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center mt-5">
                        <thead>
                            <tr>
                                <th scope="col">Id Item</th>
                                <th scope="col">Nombre Item</th>
                                <th scope="col">Precio Unidad</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Valor Total Compra</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <?php foreach ($pedidos as $pedido): ?>
                                <tr>
                                    <td>
                                        <?= htmlspecialchars($pedido->getId()) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($pedido->getClienteId()) ?>
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($pedido->getPrecioTotal()) ?> €
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($pedido->getCantidad()) ?> uds.
                                    </td>
                                    <td>
                                        <?= htmlspecialchars($pedido->getPrecioTotal() * $pedido->getCantidad()) ?> €
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

        <div class="d-flex justify-content-between gap-3 row mx-5">
            <a class="btn btn-outline-secondary col" href="../../admin/pedidos/" role="button">Ver Todos los pedidos</a>
        </div>

        <script src="../../assets/js/insertarPedido.js"></script>
        <script src="../../assets/js/carrito.js"></script>
</body>

</html>