<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../includes/head.php';?>

</head>

<body>

  <?php $currentPage = 'index'; ?>
  <?php include '../includes/header.php'; ?>
  <?php include '../includes/nav.php'; ?>


  <div class="card content" id="imagen-principal" style="background-color: rgba(128, 125, 125, 0.1);">
    <!-- <img class="card-img-top" src="holder.js/100x180/" alt="Title"> -->
    <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
      <div class="card-title">
        <div class="h2"><?php echo $textos['title-home']; ?></div>
        <!-- <div class="h2">Diseño de Camisetas Personalizadas</div> -->
        <img class="col img-fluid" src="../assets/img/gps.png" id="imgGps" alt="">
        <span>Quito, Ecuador</span>
      </div>
      <p class="card-text">
        <a type="button" class="col btn btn-secondary btn-sm " href="../public/contacto.php"><?php echo $textos['contacto']; ?></a>
      </p>
    </div>
  </div>

  <main class="">

    <div class="container pt-5" id="secServicios">

      <section class="row py-5 text-center" id="servicios">

        <div class="col-md-3 col-sm-12 card p-sm-3">
          <h4 class="card-title"><?php echo $textos['proceso-1']; ?></h4>
          <div class="card-body">
            <img class="card-img-top" src="../assets/img/iconos/open.png" alt="Title">
            <p class="card-text pt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="#" class="btn btn-outline-dark"><?php echo $textos['ver-mas']; ?></a>
          </div>
        </div>

        <div class="col-md-3 col-sm-12 card p-sm-3">
          <h4 class="card-title"><?php echo $textos['proceso-2']; ?></h4>
          <div class="card-body">
            <img class="card-img-top" src="../assets/img/iconos/devolucion.png" alt="Title">
            <p class="card-text pt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="#" class="btn btn-outline-dark"><?php echo $textos['ver-mas']; ?></a>
          </div>
        </div>

        <div class="col-md-3 col-sm-12 card p-sm-3">
          <h4 class="card-title"><?php echo $textos['proceso-3']; ?></h4>
          <div class="card-body">
            <img class="card-img-top" src="../assets/img/iconos/CORREO.png" alt="Title">
            <p class="card-text pt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="#" class="btn btn-outline-dark"><?php echo $textos['ver-mas']; ?></a>
          </div>
        </div>
        <div class="col-md-3 col-sm-12 card p-sm-3">
          <h4 class="card-title"><?php echo $textos['proceso-4']; ?></h4>
          <div class="card-body">
              <img class="card-img-top" src="../assets/img/iconos/pago_seguro.png" alt="Title">
            <p class="card-text pt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="#" class="btn btn-outline-dark"><?php echo $textos['ver-mas']; ?></a>
          </div>
        </div>
      </section>
    </div>
    



      <div class="p-5" style="background-color: rgba(0 , 0, 0,0.1);">
        <figure class="text-center">
          <!-- <img src="../assets/img/portadas/BannerHorizontal.jpg" class="figure-img img-fluid rounded grayscale-filter" alt="imgen-grayscale"> -->
          <blockquote class="blockquote">
            <p>«<?php echo $textos['frase']; ?>»</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            Jean-Luc Godard
          </figcaption>
        </figure>
      </div>

      <div class="container">

        <div class="card my-3 p-4">
          <div class="row g-3">
            <div class="col-md-4">
              <video controls poster="../assets/img/portadas/camisetas.jpg" width="100%" >
                <source src="../assets/video/video.mp4" type="video/mp4">
              </video>
              <p class="card-text"><small class="text-muted"><?php echo $textos['descripcion-video']; ?></small></p>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?php echo $textos['titulo-video']; ?></h5>
                <p class="card-text"><?php echo $textos['descripcion-audio']; ?></p>
                <audio controls>
                  <source src="../assets/audio/audio.mp3" type="audio/mpeg">
                  Your browser does not support the audio element.
                </audio>
              </div>
            </div>
          </div>
        </div>
      </div>


  <!-- <div class="logosUnis text-center" style="background-color: aqua; height: 20em"> -->
  <div class="container py-5 py-lg-5" id="logosUnis">
    <div class="h6"><?php echo $textos['titulo-tiendas']; ?></div>
    <div class="h4"><?php echo $textos['descripcion-tiendas']; ?></div>
    <hr>

    <div id="carouselIdLogo" class="carousel slide col-12 col-md-12 col-lg-12 p-2 p-lg-5" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="d-flex justify-content-around">
            <img src="../assets/img/shops/shop1.png" class="d-block mx-auto img-fluid" alt="First slide">
            <img src="../assets/img/shops/shop3.png" class="d-block mx-auto img-fluid" alt="Second slide">
            <img src="../assets/img/shops/shop6.png" class="d-block mx-auto img-fluid" alt="Third slide">
            <img src="../assets/img/shops/shop9.png" class="d-block mx-auto img-fluid" alt="Fourth slide">
          </div>
        </div>
        <div class="carousel-item">
          <div class="d-flex justify-content-around">
            <img src="../assets/img/shops/shop2.png" class="d-block mx-auto img-fluid" alt="Fifth slide">
            <img src="../assets/img/shops/shop4.png" class="d-block mx-auto img-fluid" alt="Sixth slide">
            <img src="../assets/img/shops/shop3.png" class="d-block mx-auto img-fluid" alt="Seventh slide">
            <img src="../assets/img/shops/shop8.png" class="d-block mx-auto img-fluid" alt="Eighth slide">
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselIdLogo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" id="flecha-carousel" aria-hidden="false"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselIdLogo" data-bs-slide="next">
        <span class="carousel-control-next-icon" id="flecha-carousel" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>


  </main>


    <section class="container py-5">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <!-- <div id="carouselId" class="carousel slide col-lg-6 px-5 px-lg-3" data-bs-ride="carousel"> -->
            <ol class="carousel-indicators">
              <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="First slide"></li>
              <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
              <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
            </ol>
            <div class="carousel-inner" >
              <div class="carousel-item active">
                <img src="../assets/img/portadas/camisetasFoto.jpg" class="w-100 d-block rounded-3" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                  <h3><?php echo $textos['calidad']; ?></h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="../assets/img/portadas/camisetasBanner.jpg" class="w-100 d-block rounded-3" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                  <h3><?php echo $textos['precio']; ?></h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="../assets/img/portadas/camisetasBanner2.jpg" class="w-100 d-block rounded-3" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                  <h3><?php echo $textos['descuentos']; ?></h3>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
    
    
    
        <div class="col-lg-6 col-md-12 col-sm-12 pt-5 pt-lg-2">       
          
        <?php
        include '../includes/formContact.php';
        ?> 
          
        </div>
      </div>
    </section>

    <?php include '../includes/footer.php'; ?>


  <script src="../assets/js/mensajes.js"></script>
  <script src="../assets/js/carrito.js"></script>

</body>

</html>