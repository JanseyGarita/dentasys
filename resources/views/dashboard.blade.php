<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" type="image/png" href="assets/img/logo.ico" />

    <title>DentaSys</title>

    <!-- Bootstrap -->
    <link href="{{asset('dashboard/vendor/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('dashboard/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('dashboard/build/css/custom.min.css')}}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    <!-- Datatables -->
    <link href="{{asset('dashboard/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('dashboard/vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
 
    @yield('css')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title text-center" style="border: 0;">
              <a href="{{route('inicio')}}" class="site_title p-0"><i class="fa fa-tooth"></i> <span>DentaSys</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="https://ui-avatars.com/api/?name={{Auth::user()->nombre}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido</span>
                <h2>{{Auth::user()->nombre}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href=""><i class="fa fa-home"></i> Escritorio principal </a></li>
                  
                  <li><a><i class="fa fa-clinic-medical"></i> Perfil Clínica </a></li>

                  <li><a><i class="fa fa-file-invoice"></i> Reportes </a></li>

                  <li><a><i class="fa fa-hospital-user"></i> Gestión de Pacientes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_elements.html"> Pacientes </a></li>
                      <li><a href="media_gallery.html"> Citas </a></li>
                    </ul>
                  </li>
                  @if (Auth :: user()->role_id==1)

                  <li><a><i class="fa fa-users-cog"></i> Gestión de Usuarios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('usuarios.index')}}"> Usuarios </a></li>
                      <li><a href="{{route('roles')}}"> Roles </a></li>
                    </ul>
                  </li>
                  
                  @endif
                  
                </ul>

              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small text-right ">

              <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="top" title="Cerrar sesión" href="" style="width:100%">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>

            </div>

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="https://ui-avatars.com/api/?name={{Auth::user()->nombre}}" alt="">{{explode(" ",Auth::user()->nombre)[0]}}
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="{{route('show.profile')}}"> Perfil</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span>Configuraciones</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Ayuda</a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out pull-right"></i> {{ __('Cerrar sesión') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </div>
                </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" id="app" role="main">
          
        @yield('content')
          
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <!-- <footer>
          <div class="pull-right">
            DentaSys - 2020</a>
          </div>
          <div class="clearfix"></div>
        </footer> -->
        <!-- /footer content -->

      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('dashboard/vendor/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('dashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    
    <script src="https://kit.fontawesome.com/90a9905657.js" crossorigin="anonymous"></script>

    <!-- Datatables -->
    <script src="{{asset('dashboard/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('dashboard/vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#datatable-responsive').DataTable();
        } );
    </script>
    <script type="text/javascript" src="{{asset('dashboard/js/traducir.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('dashboard/build/js/custom.min.js')}}"></script>

    @yield('scripts')
	
  </body>
</html>
