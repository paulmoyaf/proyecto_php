<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../includes/head.php'; ?>

</head>

<body>

  <?php $currentPage = 'contacto'; ?>
  <?php include '../includes/header.php'; ?>
  <?php include '../includes/nav.php'; ?>




  <main class="container">
    <div class="container py-5 w-75"  style="min-height: 100vh;">

      <?php
      include '../includes/formContact.php';
      ?>

    </div>

  </main>


  <?php include '../includes/footer.php'; ?>


  <script src="../assets/js/mensajes.js"></script>
  <script src="../assets/js/carrito.js"></script>

</body>

</html>