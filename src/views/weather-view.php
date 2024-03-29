<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $title = "Clima";
  include '../includes/head.php';
  ?>

</head>

<body>

  <?php $currentPage = 'clima'; ?>
  <?php include '../includes/header.php'; ?>
  <?php include '../includes/nav.php'; ?>


  <main class="container">
  <div class="py-5 w-100 d-flex flex-column" style="min-height: 100vh;">

      <h1 class="h4"><?php echo $textos['clima']; ?></h1>
      <hr>
      <div class="display-6 text-center mb-4"><?php echo $textos['titulo-clima']; ?> 😎</div>
      
      <div class="row">

        <div class="col">

          <div class="form-group-item mb-3">
            <label for="city" class="form-label"><?php echo $textos['ciudad']; ?></label>
            <input type="text" name="city" id="city" class="form-control">
          </div>

          <div class="text-md-end">
            <button type="submit" id="btn-pronostico" class="btn btn-outline-secondary mt-2 button-form w-lg-auto w-md-100"><?php echo $textos['pronostico']; ?></button>
            <button type="submit" id="btn-ubicacion" class="btn btn-outline-secondary mt-2 button-form w-lg-auto w-md-100"><?php echo $textos['pronostico-actual']; ?></button>
          </div>
        </div>


        <div class="col">
          <div id="card-datos" class="card d-none">
            <div class="card-body">
              <div class="d-flex">
                <h5 id="city-name" class="card-title"></h5>
                <img id="city-icon" class="card-img-top" src="" alt="icon-image">
              </div>
              <p id="city-temp" class="card-text"></p>
              <p id="city-description" class="card-text"></p>
              <p id="city-humidity" class="card-text"></p>
              <p id="city-wind" class="card-text"></p>
              <p id="city-sunrise" class="card-text"></p>
              <p id="city-sunset" class="card-text"></p>
              <p id="city-weather" class="card-text"></p>
            </div>
          </div>
        </div>

      </div>

    </div>



  </main>


  <?php include '../includes/footer.php'; ?>


  <script src="../assets/js/weather.js"></script>
  <script src="../assets/js/carrito.js"></script>

</body>

</html>