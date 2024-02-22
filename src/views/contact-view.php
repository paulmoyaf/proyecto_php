<!DOCTYPE html>
<html lang="en">

<head>
  <?php include '../includes/head.php'; ?>

</head>

<body>

  <?php $currentPage = 'contacto'; ?>
  <?php include '../includes/header.php'; ?>
  <?php include '../includes/nav.php'; ?>




  <main class="container" style="min-height: 50vh;">
    <div class="display-6 pt-5">
      <?php echo $textos['contacto']; ?>
    </div>
    <hr>
    <!-- <div class="d-flex flex-wrap gap-3"> -->
    <div class="row py-5 justify-content-center">
      <div class="col-lg-4 col-md-12">
        <div class="card">
          <div class="card-body" style="background-color: #f5f5f5; border-radius: 15px; padding: 20px;">
            <h4 class="card-title" style="color: #333;">
              <?php echo $textos['datosContacto']; ?>
            </h4>
            <hr>
            <p class="card-text">
              <strong>
                <?php echo $textos['nombre']; ?>
              </strong>: Msc. Paul Moya
            </p>
            <p class="card-text">
              <strong>
                <?php echo $textos['Ubicacion']; ?>
              </strong>: Ondarroa, Biskaia, ES
            </p>
            <p class="card-text">
              <strong>
                <?php echo $textos['codigoPostal']; ?>
              </strong>: 48700
            </p>
            <p class="card-text">
              <strong>
                <?php echo $textos['correo']; ?>
              </strong>: paul.moyaf@gmail.com
            </p>
            <p class="card-text">
              <strong>
                <?php echo $textos['telefono']; ?>
              </strong>: +34 679034040
            </p>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-12 order-first order-lg-last pb-5">
      <!-- <div class="col-md-6"> -->
        <?php
        include '../includes/formContact.php';
        ?>
      </div>

    </div>

  </main>


  <?php include '../includes/footer.php'; ?>


  <script src="../assets/js/mensajes.js"></script>
  <script src="../assets/js/carrito.js"></script>

</body>

</html>