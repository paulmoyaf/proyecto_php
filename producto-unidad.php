<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Producto Unidad</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="assets/css/style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>

<body>

  <?php include 'includes/header.php'; ?>
  <?php include 'includes/nav.php'; ?>

  <main class="container p-lg-5 p-md-2 p-sm-2">

    <div class="display-6 text-center text-uppercase pb-5">Item  New</div>

    <div class="row">
      <div class="col-md-6 col-12 text-center p-5">
    
              <img class="card-img-top" src="assets/img/camisetas/cam(1).png">
              <div class="card-body">
                <h4 class="card-title">Delfin Rosado</h4>
                <p class="card-text">Camiseta Jungle</p>
              </div>
      </div>

      <div class="col-md-6 col-12 p-5">
        <div class="h3">Descripción</div>
        <p class="texto-nosotros mb-5">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi voluptate voluptatum nemo ea assumenda.
          Voluptatem, dignissimos consequatur. Sunt harum perferendis dolorem facere quia, quisquam maxime officiis, minima,
          ipsum asperiores dolore id voluptates sequi aliquam doloremque praesentium quos!
        </p>
        <div class="row form-group">
          <div class="mb-3 col">
            <select class="form-select form-select-md" name="" id="">
              <option selected>- Seleccionar la Talla -</option>
              <option value="">Small</option>
              <option value="">Medium</option>
              <option value="">Large</option>
            </select>
          </div>
          <div class="form-outline col">
            <input type="number" id="typeNumber" class="form-control form-select-md" placeholder="Cantidad" min="0"/>
            <!-- <label class="form-label" for="typeNumber">Number input</label> -->
        </div>
        </div>
    
        <input type="button" class="btn btn-primary w-100" value="AGREGAR AL CARRITO">
      </div>
    </div>

    <div class="pt-5" id="productos-similares">
      <div class="h6">De acuerdo a tus gustos</div>
      <div class="h4">PRODUCTOS SIMILARES</div>
      <hr>
    
      <div id="carouselCamisetas" class="carousel slide p-5 px-sm-2" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <div class="d-flex justify-content-around text-center">
    
              <a href="producto-unidad.html">
                <div class="card d-block">
                  <img class="card-img-top" src="assets/img/camisetas/cam(2).png">
                  <div class="card-body">
                    <h4 class="card-title">Camiseta</h4>
                    <p class="card-text">Jungle T-Shirt</p>
                  </div>
                </div>
              </a>
    
              <a href="producto-unidad.html">
    
                <div class="card d-block">
                  <img class="card-img-top" src="assets/img/camisetas/cam(3).png">
                  <div class="card-body">
                    <h4 class="card-title">Camiseta</h4>
                    <p class="card-text">Jungle T-Shirt</p>
                  </div>
                </div>
              </a>
    
              <a href="producto-unidad.html">
    
                <div class="card d-block">
                  <img class="card-img-top" src="assets/img/camisetas/cam(4).png">
                  <div class="card-body">
                    <h4 class="card-title">Camiseta</h4>
                    <p class="card-text">Jungle T-Shirt</p>
                  </div>
                </div>
              </a>
    
            </div>
          </div>
    
          <div class="carousel-item">
            <div class="d-flex justify-content-around text-center gap-3">
    
              <a href="producto-unidad.html">
    
                <div class="card d-block">
                  <img class="card-img-top" src="assets/img/camisetas/cam(5).png">
                  <div class="card-body">
                    <h4 class="card-title">Camiseta</h4>
                    <p class="card-text">Jungle T-Shirt</p>
                  </div>
                </div>
              </a>
    
              <a href="producto-unidad.html">
    
                <div class="card d-block">
                  <img class="card-img-top" src="assets/img/camisetas/cam(6).png">
                  <div class="card-body">
                    <h4 class="card-title">Camiseta</h4>
                    <p class="card-text">Jungle T-Shirt</p>
                  </div>
                </div>
              </a>
    
              <a href="producto-unidad.html">
                <div class="card d-block">
                  <img class="card-img-top" src="assets/img/camisetas/cam(7).png">
                  <div class="card-body">
                    <h4 class="card-title">Camiseta</h4>
                    <p class="card-text">Jungle T-Shirt</p>
                  </div>
                </div>
              </a>
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
    </div>

   
  
  </main>


  <?php include 'includes/footer.php'; ?>

  

</body>

</html>