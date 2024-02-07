<form id="form-contacto" class="formulario">
    <h1 class="h4">Contáctanos</h1>
    <hr>
    <p class="pb-3 text-muted">Esperamos tu mensaje</p>

    <div class="row">

        <div class="col-6 form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" placeholder="Paul Moya">
        </div>
        <div class="col-6 form-group">
            <label for="phone">Telefono</label>
            <input type="tel" class="form-control" id="phone" placeholder="679123123">
        </div>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="name@example.com">
    </div>
    <div class="form-group">
        <label for="message">Mensaje</label>
        <textarea class="form-control" id="message" rows="6"></textarea>
    </div>
    <div id="alerta-mensaje"></div>
    <div class="text-md-end">
        <button type="submit" id="btn-enviar" class="btn btn-secondary mt-2 button-form w-lg-auto w-md-100">Enviar</button>
    </div>
    <div class="text-md-end">
        <button type="button" id="nuevo-mensaje" class="btn btn-secondary mt-2 button-form w-lg-auto w-md-100 d-none">Nuevo Mensaje</button>
    </div>
</form>