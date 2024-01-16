<nav class="navbar navbar-expand-lg navbar-light bg-light ">

<div class="container">
  <a class="navbar-brand pt-3" href="index.php">
    <img src="../assets/img/logo/logo.png" alt="" id="logo">
    <!-- <h2>MoyaCreative</h2> -->
  </a>

  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end mr-auto text-center" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
                    <a class="nav-link <?php echo ($currentPage === 'index') ? 'active' : ''; ?>" href="../public/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($currentPage === 'nosotros') ? 'active' : ''; ?>" href="../public/nosotros.php">Sobre Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($currentPage === 'catalogo') ? 'active' : ''; ?>" href="../public/catalogo.php">Catálogo</a>
                </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="productos.php">Productos</a>
      </li> -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Servicios
        </a>
        <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Servicio 1</a>
          <a class="dropdown-item" href="#">Servicio 2</a>
          <a class="dropdown-item" href="#">Servicio 3</a>
          </div>
      </li>
      <li class="nav-item">
          <a class="nav-link <?php echo ($currentPage === 'clima') ? 'active' : ''; ?>" href="../public/weather.php" disabled>Clima</a>
      </li>
      <li class="nav-item">
          <a class="nav-link <?php echo ($currentPage === 'contacto') ? 'active' : ''; ?>" href="../public/contacto.php" disabled>Contacto</a>
      </li>
    </ul>
  </div>
</div>
</nav>