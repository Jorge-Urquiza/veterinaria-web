<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Animal Help | Contacto</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('webpage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('webpage/css/modern-business.css')}}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-company-color fixed-top">
      <div class="container">
        <a class="navbar-brand .bg-color-letter-nav" href="index.html">
        <img src="./images/profile_180x180.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Contacto
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link"href="{{route('inicio')}}">Inicio</a>
              </li>
              <a class="nav-link" href="{{route('contacto')}}">Contacto</a>
              </li>
              <li>
                  <a class="nav-link" href="{{route('login')}}">Sistema</a>
              </li>
            </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <br>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('inicio')}}">Inicio</a>
        </li>
        
        <li class="breadcrumb-item active">Contacto</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
          <!-- script de google maps -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3799.148157485732!2d-63.166301250458!3d-17.784732735252!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x562c7c4c7be046b7!2sVETERINARIA%20ANIMAL%20HELP!5e0!3m2!1ses!2sbo!4v1598319133159!5m2!1ses!2sbo" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

         
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
          <h3>Detalles de Contacto</h3>
          <br>
          <p>
            <strong>Dirección:</strong> 
            <br>
              Prolongación Ñuflo de Chávez #1080, a dos cuadras del 2do anillo
          </p>
          <p>
            <strong>Telefono:</strong> 
            <br>

            <a href="tel:333403344">+591 72698811</a>
            <br>
            <a href="tel:333403344">+591 77316951</a>
          </p>
          
            <strong>Email:</strong>
            <br>
            <a href="mailto:lhurtado@alatrans.com.bo">animalhelp@gmail.com</a>
            <br>

            <strong>Gerente General:</strong>
            <ul>
              <li><h6>Lic. MVZ Tatiana Furtner Sánchez</h6> </li>
              <li><h6>Lic. Zoot Federico Andrés Bottani Schayman</h6> </li>
            </ul>
   
          
          <p>
            <strong>Horario de atencion:</strong> 
            <br>
            <small><strong>Lunes a Sábado:</strong></small> <br>
            9:00 am a 1:00 pm <br>
            2:30 pm a 7:00 pm 
            <br>
            
          </p>
          <p>
            <strong>Facebook</strong>: 
            <br>
            <a href="https://www.facebook.com/Veterinaria-animal-help-1221998187913089/" target="_blank">Fan Pag Veterinaria Animal Help</a> 
          </p>
          <p>
            <strong>Whatsapp Business</strong>: 
            <br>
            <a href="https://wa.me/59172698811" target="_blank">Whatsapp</a> 
          </p>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <footer class="py-3 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Veterinaria Animal Help 2020</p>
      </div>
      <!-- /.container -->
    </footer>

    <script src="{{asset('webpage/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('webpage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  </body>

</html>
