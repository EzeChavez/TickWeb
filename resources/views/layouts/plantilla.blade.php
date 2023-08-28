<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('css')

 <!-- slider stylesheet -->
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

<!-- bootstrap core css -->
<link rel="stylesheet" type="text/css" href="../public/vendor/adminlte/dist/css/uxos/css/bootstrap.css" />

<!-- fonts style -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet" />

<!-- Custom styles for this template -->
<link href="../public/vendor/adminlte/dist/css/uxos/css/style.css"  rel="stylesheet" />
<!-- responsive style -->
<link href="../public/vendor/adminlte/dist/css/uxos/css/responsive.css" rel="stylesheet" />


<!-- Header no tocar style -->

    <nav class="navbar navbar-expand-sm " style="background-color:#eaebed;color:#2e424e;font-size: 20px;">
  <div class="container-fluid"style="padding-left: 80px;font-weight: bold;">
              <a class="navbar-brand" style="color:#2e424e;font-size: 30px;" href="../public">
                <img src="../public/vendor/adminlte/dist/img/AdminLTELogo.png" style="margin-top: 4px;" width="35" height="35" class="d-inline-block align-top" alt="">
                  TickWeb</a>
    
    <div class="collapse navbar-collapse justify-content-center" id="mynavbar" style="font-weight: normal;">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link" style="color:#2e424e;" href="../public">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-item nav-link active" style="color:#2e424e;" href="#caracteristicas">Servicios</a>
        </li>
        <li class="nav-item">
        <a class="nav-item nav-link active" style="color:#2e424e;" href="#sobrenos">Sobre Nosotros</a>
        </li>
        <li class="nav-item">
        <a class="nav-item nav-link active" style="color:#2e424e;" href="#contactanos">Contactanos</a>
        </li>
      </ul>
      </div>
      <form class="d-flex" style="padding-right: 80px">
      <a class="btn btn-outline-dark" href="{{ url('/dashboard') }}" role="button" style="border-radius: 25px;  width: 200px;text-align: center;font-size: 20px;">
    Iniciar Sesión</a>
      
      </form>
   
  </div>
</nav>
        <title>TickWeb</title>
  </head>


  <div class="hero_area">
  <body style="background-color: #eaebed;color:#2e424e;">

    <div class ="container">
        @yield('contenido')
    </div>

    @yield('js')
  </body>
  </div>
</html>