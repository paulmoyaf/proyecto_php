<nav class="navbar navbar-expand-lg navbar-light bg-light ">

  <div class="container">
    <a class="navbar-brand pt-3" aria-label="Ir al Inicio" href="index.php">
      <img src="../assets/img/logo/logo.png" alt="Logo de la Empresa" id="logo">
      <div class="d-flex d-md-none d-sm-block">
          <a href="?idioma=es"  class="btn btn-small" id="es">ES</a>
          <a href="?idioma=eus" class="btn btn-small" id="eus">EUS</a>
          <a href="?idioma=en"  class="btn btn-small" id="en">EN</a>
      </div>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end mr-auto text-center" id="navbarSupportedContent">



      <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-none" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $textos['traduccion']; ?>
          </a>
          <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
          <a href="?idioma=es" class="nav-link" id="es">ES</a>
          <a href="?idioma=eus" class="nav-link" id="eus">EUS</a>
          <a href="?idioma=en" class="nav-link" id="en">EN</a>
          </div>
        </li> -->
        <li class="nav-item">
          <a id="nav-inicio" class="nav-link <?php echo ($currentPage === 'index') ? 'active' : ''; ?>" href="../public/"><?php echo $textos['inicio']; ?></a>
        </li>
        <li class="nav-item">
          <a id="nav-nosotros" class="nav-link <?php echo ($currentPage === 'nosotros') ? 'active' : ''; ?>" href="../public/nosotros.php"><?php echo $textos['nosotros']; ?></a>
        </li>
        <li class="nav-item">
          <a id="nav-catalogo" class="nav-link <?php echo ($currentPage === 'catalogo') ? 'active' : ''; ?>" href="../public/catalogo.php"><?php echo $textos['catalogo']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($currentPage === 'clima') ? 'active' : ''; ?>" href="../public/weather.php" disabled><?php echo $textos['clima']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($currentPage === 'contacto') ? 'active' : ''; ?>" href="../public/contacto.php" disabled><?php echo $textos['contacto']; ?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>