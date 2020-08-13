<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Animal Help| Inicio</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('webpage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('webpage/css/modern-business.css')}}" rel="stylesheet">
    

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-company-color fixed-top">
      <div class="container">
        <a class="navbar-brand .bg-color-letter-nav" href="/">
        <img src="./images/profile_180x180.png" width="30" height="30" class="d-inline-block align-top" alt="">
      VETERINARIA - ANIMAL HELP
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Inicio</a>
            </li>
            <li>
                <a class="nav-link" href="/login">Sistema</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('{{asset('webpage/images/carrusel1.jpg')}}')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Veterinaria </h3>
              <p>Animal help</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('{{asset('webpage/images/carrusel2.jpg')}}')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Veterinaria </h3>
              <p>Animal help</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('{{asset('webpage/images/carrusel3.jpg')}}')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Veterinaria </h3>
              <p>Animal help</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Atras</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">
        <br>
      <div class="container">
      <!-- Features Section -->
      <div class="row">
        <div class="col-lg-6">
          <h2 style="text-align: center;">Veterinaria</h2>
          <h6><strong>Animal Help </strong>es una veterina especializada:</h3>
          <p style="text-align: justify;">En animales domesticos
          </p>
        </div>
        <div class="col-lg-6">
          <img id="myImg" class="img-fluid rounded" src="{{asset('webpage/images/img1.jpg')}}" alt="">
          
          <!-- The Modal -->
          <div id="myModal" class="modal">
          <!-- The Close Button -->
          <span class="close">&times;</span>
          <!-- Modal Content (The Image) -->
          <img class="modal-content" id="img01">
          <!-- Modal Caption (Image Text) -->
          <div id="caption"></div>
          </div>


        </div>
      </div>
      <br>
      <h3 style="text-align: center;">PONTE EN CONTACTO CON NOSOTROS</h3>
      <h6 style="text-align: center">ATENCION AL CLIENTE</h6>
      <!-- /.row -->
      <hr>
      <!-- Call to Action Section -->
      <div class="row mb-6">
        <div class="col-md-6">
          <a class="btn btn-lg btn-secondary btn-block" style="background: #3b5998" href="https://www.facebook.com" target="_black">Facebook</a>
          <br>
        </div>
        <div class="col-md-6">
          <a class="btn btn-lg btn-secondary btn-block" style="background: #25D366" href="https://wa.me/78066791" target="_black">Whatsapp</a>
          <br>
        </div>
      </div>

      </div>
      <!-- end container of row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-3 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Veterinaria Animal Help 2020</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('webpage/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('webpage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- script para el zoom de la imagen -->
    <script>
      // Get the modal
      var modal = document.getElementById('myModal');
      // Get the image and insert it inside the modal - use its "alt" text as a caption
      var img = document.getElementById('myImg');
      var modalImg = document.getElementById("img01");
      var captionText = document.getElementById("caption");
      img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
      }
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
      // When the user clicks on <span> (x), close the modal
      span.onclick = function() { 
        modal.style.display = "none";
      } 
      document.onkeydown = function(evt) {
      evt = evt || window.event;
      if (evt.keyCode == 27) {
        modal.style.display = "none";
      }
      };
    </script>

  </body>

</html>
