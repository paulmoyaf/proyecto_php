<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../includes/head.php';?>

</head>

<body>

  <?php $currentPage = 'nosotros'; ?>
  <?php include '../includes/header.php'; ?>
  <?php include '../includes/nav.php'; ?>


  <main class="w-100">

    <div class="container pt-2">

      <div class="display-6 text-center p-5"><?php echo $textos['nosotros']; ?></div>

      <div class="row d-flex flex-column-reverse flex-md-row pb-5">

        <div class="col-12 col-md-6 texto-nosotros">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eius, esse. Laborum qui, natus tempore dolorum illum accusantium aspernatur repudiandae quia, minus, ab blanditiis delectus deleniti!
            Quae quaerat molestias sint non!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, esse. Laborum qui, natus tempore dolorum illum accusantium aspernatur repudiandae quia, minus, ab blanditiis delectus deleniti!
            Quae quaerat molestias sint non!
          </p><br>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eius, esse. Laborum qui, natus tempore dolorum illum accusantium aspernatur repudiandae quia, minus, ab blanditiis delectus deleniti!
            Quae quaerat molestias sint non!
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eius, esse. Laborum qui, natus tempore dolorum illum accusantium aspernatur repudiandae quia, minus, ab blanditiis delectus deleniti!
            Quae quaerat molestias sint non!
          </p>
        </div>

        <img src="../assets/img/portadas/camisetasFoto.jpg" class="img-fluid col-12 col-md-6 rounded-top pb-5" alt="">
        
      </div>
    </div>
      
    <div class="">

      <div class="p-5">
        <figure class="text-center">
        <img src="../assets/img/portadas/BannerHorizontal.jpg" class="figure-img img-fluid rounded grayscale-filter" alt="">
          <blockquote class="blockquote">
            <p>«<?php echo $textos['frase']; ?>»</p>
          </blockquote>
          <figcaption class="blockquote-footer">
            Jean-Luc Godard
          </figcaption>
        </figure>
      </div>
      
      <div class="container">
        <section class="row py-5 text-center" id="servicios">

          <div class="display-6 text-uppercase pb-4 text-black-50"><?php echo $textos['titulo-nosotros']; ?></div>
  
          <div class="col-md-3 col-6 card p-sm-3">
            <div class="card-body">
              <img class="card-img-top img-nosotros" src="../assets/img/nosotros/price.png" alt="Title">
              <h4 class="card-title titulo-img-nosotros"><?php echo $textos['mejor-precio']; ?></h4>  
              <p class="card-text pt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              <!-- <a href="#" class="btn btn-outline-dark">Ver más...</a> -->
            </div>
          </div>
  
          <div class="col-md-3 col-6 card p-sm-3">
            <div class="card-body">
              <img class="card-img-top img-nosotros" src="../assets/img/nosotros/devs.png" alt="Title">
              <h4 class="card-title titulo-img-nosotros"><?php echo $textos['para-devs']; ?></h4>
              <p class="card-text pt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              <!-- <a href="#" class="btn btn-outline-dark">Ver más...</a> -->
            </div>
          </div>
  
          <div class="col-md-3 col-6 card p-sm-3">
            <div class="card-body">
              <img class="card-img-top img-nosotros" src="../assets/img/nosotros/free.png" alt="Title">
              <h4 class="card-title titulo-img-nosotros"><?php echo $textos['envio-gratis']; ?></h4>
              <p class="card-text pt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              <!-- <a href="#" class="btn btn-outline-dark">Ver más...</a> -->
            </div>
          </div>
  
          <div class="col-md-3 col-6 card p-sm-3">
            <div class="card-body">
              <img class="card-img-top img-nosotros" src="../assets/img/nosotros/quality.png" alt="Title">
              <h4 class="card-title titulo-img-nosotros"><?php echo $textos['mejor-calidad']; ?></h4>
              <p class="card-text pt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              <!-- <a href="#" class="btn btn-outline-dark">Ver más...</a> -->
            </div>
          </div>
        </section>
      </div>


    </div>
    </dl>






  </main>

  <?php include '../includes/footer.php'; ?>

  <script src="../assets/js/carrito.js"></script>

</body>

</html>