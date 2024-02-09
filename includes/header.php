<header class="header">
  <a href="../public/" aria-label="Ir a la página de inicio">
    <img src="../assets/img/logo/logo2.png" alt="Logo de MoyaCreative que lleva a la página de inicio" id="logo-header">
  </a>
  <div class="d-flex align-items-center gap-3">
    <div class="button-idiomas">
    <a href="?idioma=es" class="btn btn-warning btn-small" id="es">ES</a>
    <a href="?idioma=eus" class="btn btn-success btn-small" id="eus">EUS</a>
    <a href="?idioma=en" class="btn btn-primary btn-small" id="en">EN</a>
      <!-- <button class="btn btn-primary" id="en" onclick="cambiarIdioma(this.id)">EN</button> -->
    </div>
  <button type="button" class="btn btn-black position-relative" onclick="window.location.href = '../public/carrito.php';" aria-label="Ir al carrito de compras">
    <img src="../assets/img/carrito.png" alt="Imagen del Carrito" id="carrito">
    <span class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-secondary" id="contador">
      <!-- <span class="visually-hidden">unread messages</span> -->
    </span>
  </button>
  </div>
</header>