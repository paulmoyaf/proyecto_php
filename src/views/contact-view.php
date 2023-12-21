<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contacto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="../assets/css/style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>

<body>

  <?php $currentPage = 'contacto'; ?>
  <?php include '../includes/header.php'; ?>
  <?php include '../includes/nav.php'; ?>


 

   <main class="container">
      <div class="container py-5 w-75">
               
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
              <div class="text-md-end">
                <button type="submit" id="btn-enviar" class="btn btn-outline-secondary mt-2 button-form w-lg-auto w-md-100">Enviar</button>
              </div>
              <div class="text-md-end">
                <button type="button" id="nuevo-mensaje" class="btn btn-secondary mt-2 button-form w-lg-auto w-md-100 d-none">Nuevo Mensaje</button>
              </div>
              <div class="alert alert-success text-center d-none" id="element-id"></div>
            </form>
            
          </div>
          <div id="mensaje-enviado" class="d-none"></div>
 
        

   </main>


    <?php include '../includes/footer.php'; ?>


  <script src="../assets/js/formularios.js"></script>
  <script src="../assets/js/carrito.js"></script>

</body>

</html>