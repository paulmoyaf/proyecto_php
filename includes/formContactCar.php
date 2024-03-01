<form id="form-contacto" class="formulario-carrito">
    <h1 class="h4"><?php echo $textos['datos-cliente']; ?></h1>
    <hr>
    <p class="pb-3 text-muted"><?php echo $textos['descripcion-cliente']; ?></p>

    <div class="form-group">
        <label for="nombre"><?php echo $textos['nombre']; ?></label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Paul Moya">
    </div>
    <div class="form-group">
        <label for="email"><?php echo $textos['correo']; ?></label>
        <input type="email" class="form-control" id="email" placeholder="<?php echo $textos['ejemplo-correo']; ?>">
    </div>
    <div class="form-group">
        <label for="direccion"><?php echo $textos['direccion']; ?></label>
        <input type="text" class="form-control" id="direccion" placeholder="San Ignacio 2B - 4C">
    </div>
    <div class="form-group">
        <label for="ciudad"><?php echo $textos['ciudad']; ?></label>
        <input type="text" class="form-control" id="ciudad" placeholder="Ondarroa">
    </div>
    <div class="form-group">
        <label for="codigoPostal"><?php echo $textos['codigoPostal']; ?></label>
        <input type="text" class="form-control" id="codigoPostal" placeholder="48700">
    </div>
    <div id="alerta-mensaje"></div>
    <div class="text-md-end">
        <button type="submit" id="procesar-compra" class="btn btn-warning mt-2 button-form w-100"><?php echo $textos['realizar-pedido']; ?></button>
    </div>
</form>