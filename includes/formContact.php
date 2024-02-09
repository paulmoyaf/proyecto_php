<form id="form-contacto" class="formulario">
    <h1 class="h4"><?php echo $textos['titulo-contacto']; ?></h1>
    <hr>
    <p class="pb-3 text-muted"><?php echo $textos['descripcion-contacto']; ?></p>

    <div class="row">

        <div class="col-6 form-group">
            <label for="name"><?php echo $textos['nombre']; ?></label>
            <input type="text" class="form-control" id="name" placeholder="Paul Moya">
        </div>
        <div class="col-6 form-group">
            <label for="phone"><?php echo $textos['telefono']; ?></label>
            <input type="tel" class="form-control" id="phone" placeholder="679123123">
        </div>
    </div>
    <div class="form-group">
        <label for="email"><?php echo $textos['correo']; ?></label>
        <input type="email" class="form-control" id="email" placeholder="<?php echo $textos['ejemplo-correo']; ?>">
    </div>
    <div class="form-group">
        <label for="message"><?php echo $textos['mensaje']; ?></label>
        <textarea class="form-control" id="message" rows="6"></textarea>
    </div>
    <div id="alerta-mensaje"></div>
    <div class="text-md-end">
        <button type="submit" id="btn-enviar" class="btn btn-secondary mt-2 button-form w-lg-auto w-md-100"><?php echo $textos['enviar']; ?></button>
    </div>
    <div class="text-md-end">
        <button type="button" id="nuevo-mensaje" class="btn btn-secondary mt-2 button-form w-lg-auto w-md-100 d-none"><?php echo $textos['nuevo-mensaje']; ?></button>
    </div>
</form>