<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Animal Help</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet"
          type="text/css">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <style>
        html {
            font-size: {{Auth()->user()->font_size}};
        }
    </style>

</head>


<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-{{Auth::user()->color}} sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
                
            </div>
            <div class="sidebar-brand-text mx-3">Veterinaria <sup>Animal Help</sup></div>
            <!-- Mensajes del servidor -->
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>DASHBOARD</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Paquete Administracion
        </div>
     

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('clientes.index')}}"><i class="fas fa-fw fa-cog"></i>
                <span>Gestionar Clientes</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#"><i class="fas fa-fw fa-cog"></i>
                <span>Gestionar Mascotas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('veterinarios.index')}}"><i class="fas fa-fw fa-cog"></i>
                <span>Gestionar Veterinarios</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('categorias.index')}}"><i class="fas fa-fw fa-cog"></i>
                <span>Gestionar Categorias</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('productos.index')}}"><i class="fas fa-fw fa-cog"></i>
                <span>Gestionar Productos</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('ventas.index')}}"><i class="fas fa-fw fa-cog"></i>
                <span>Gestionar Ventas</span></a>
        </li>
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Paq. Reportes y Estadisticas
        </div>
       
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                   aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>CU8 Reporte y Estadisticas</span>
                </a>

                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="#">Reportes</a>
                        <a class="collapse-item" href="">Estadisticas</a>
                    </div>
                </div>
            </li>
 

        <hr class="sidebar-divider">
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
            <!-- Mensajes del servidor -->
                <div class="col-md-4">
                    @if ($message = Session::get('success'))
                    <div class="alert temp alert-success mb-0" role="alert">{{$message}}</div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert temp alert-danger mb-0" role="alert">{{$message}}</div>
                    @endif
                    @if ($message = Session::get('danger'))
                    <div class="alert alert-danger mb-0" id="alert" role="alert">
                        <ul>
                            @for ($i = 0; $i < count(Session::get('danger')); $i++)
                                <li>{{Session::get('danger')[$i]}}</li>
                            @endfor
                        </ul>
                    </div>
                    @endif
                </div>
                
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">

                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar paginas"
                                       aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>         
                </form>
               
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->nombre .  ' ' . Auth::user()->apellido }}</span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModa2">
                                <i class="fa fa-paint-brush" aria-hidden="true"></i>
                                Personalizar
                            </a>
                            <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModa3">
                                <i class="fa fa-lock mr-2"></i>Cambiar Contraseña
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fa fa-sign-out mr-1"></i>Cerrar Sesión
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- AQUI VA EL CONTENIDO DE LA PAGINA -->
            @yield('content')
            <!-- FIN DEL CONTENIDO DE LA PAGINA -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                   @yield('footer')
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Seguro(a) que deseas cerrar sesion?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Seleccione cerrar sesion si desea salir..</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                <form method="get" action="{{route('logout')}}">
                    <input type="submit" class="btn btn-success" value="Cerrar Sesion">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="logoutModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Personalizacion</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="{{route('color')}}">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Seleccione Color</label>
                        <select class="form-control" id="color" name="color">
                            <option value="primary">Azul</option>
                            <option value="secondary">Gris</option>
                            <option value="success">Verde</option>
                            <option value="danger">Rojo</option>
                            <option value="warning">Amarillo</option>
                            <option value="dark">Negro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Tamaño de Fuente (px)</label>
                        <input type="number" class="form-control" id="font_size" name="font_size">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Guardar">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                    
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="logoutModa3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="{{route('veterinarios.change.password')}}">
                @csrf
                <div class="modal-body">
                    
                        <div class="row">
                            <div class="col-md-4">
                                <label for="current-password" class="control-label">Contraseña Actual</label>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group" id="show_hide_current_new_password">
                                    <input id="current-password" type="password"
                                      class="form-control{{ $errors->has('current-password') ? ' is-invalid' : '' }}" name="current-password" required>
                                     {!! $errors->first('current-password', '<div class="invalid-feedback">:message</div>') !!}
                                    <div class="input-group-addon">
                                      <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <br>    
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="control-label">Nueva Contraseña</label>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group" id="show_hide_new_password">
                                    <input id="new-password" type="password" class="form-control{{ $errors->has('new-password') ? ' is-invalid' : '' }}" name="new-password" required>
                                    {!! $errors->first('new-password', '<div class="invalid-feedback">:message</div>') !!}  
                                    <div class="input-group-addon">
                                      <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <br>   
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="control-label">Confirmar Nueva contraseña</label>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group" id="show_hide_confirm_new_password">
                                    <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                                    <div class="input-group-addon">
                                      <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>  
                            </div>
                        </div>
                  
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Guardar">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>


</div>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('js/project/template/showInputPassword.js')}}"></script>
@stack('scripts')
<!-- Page level plugins -->

<!-- Page level custom scripts -->

<!--=================ESTADISTICAS=====================-->

</body>

</html>
