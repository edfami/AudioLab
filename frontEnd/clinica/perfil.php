<?php 
include('../../backEnd/auth.php');
include('../../backEnd/conn.php');
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$query = "SELECT * FROM municipio";
$result = $conexion->prepare($query);
$result->execute();
$data = $result->fetchAll(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AudioLAb</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <script type="text/javascript">
    function actualizar(){location.reload(true);}
    //Función para actualizar cada 5 segundos(5000 milisegundos)
    setInterval("actualizar()",5000000);
  </script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <!--<li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>-->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!--<li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>-->
      <!-- Notifications Dropdown Menu -->
      
      <!--<li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AudioLAb</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!--<img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->

        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['usuario'];?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Paginas</li>
          <li class="nav-item">
            <a href="cita.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Citas                
              </p>
            </a>
          </li>          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-id-badge"></i>
              <p>
                Historial Medica
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="historial_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Historial Medico Lista</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="historial.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Historial Medico</p>
                </a>
              </li>
            </ul>
          </li>          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-id-badge"></i>
              <p>
                Perfil Paciente
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="perfil_lista.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Paciente</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="perfil.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Perfil</p>
                </a>
              </li>
            </ul>
          </li>                
          <li class="nav-item">
            <a href="../../backEnd/logout.php" class="nav-link">
              <i class="nav-icon far fa-logout"></i>
              <p>
                Logout
              </p>
            </a>
          </li>                     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Peril</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">            
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <h3>Crear Perfil</h3>
                    <form action="../../backEnd/registro.php" method="POST">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Nombre:</label>
                          <input type="text" name="nombre" class="form-control" id="inputEmail4" placeholder="Escriba su nombre">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Apellido</label>
                          <input type="text" name="apellido" class="form-control" id="inputPassword4" placeholder="Escriba su Apellido">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-xl-12">
                          <label for="inputAddress">Direccion</label>
                          <input type="text" name="direccion" class="form-control" id="inputAddress" placeholder="Escriba la direccion">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <label for="inputAddress2">Telefono</label>
                          <input type="tel" name="telefono" class="form-control" id="inputAddress2" placeholder="Agregue un numero de telefono">
                        </div>
                        <div class="form-group col-md-3">
                          <label for="inputAddress2">celular</label>
                          <input type="tel" name="celular" class="form-control" id="inputAddress2" placeholder="Agregue un numero celular">
                        </div>
                        <div class="form-group col-md-5">
                          <label for="inputAddress2">Fecha de Nacimiento</label>
                          <input type="tel" name="fecha" class="form-control" id="inputAddress2" placeholder="formato YY/MM/DD">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-xs-4">
                          <label for="inputCity">Edad</label>
                          <input type="text" class="form-control" name="edad" id="inputCity">
                        </div>

                        <div class="form-group col-md-4">
                          <label for="inputState">Municipio</label>
                          <select id="inputState" name="municipio" class="form-control">
                            <option selected>Elegir Municipio</option>
                          <?php 
                          
                          foreach($data as $dat){
                            echo '<option value="'.$dat['idMunicipio'].'">'.$dat['municipio'].'</option>';
                          }
                          ?>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="inputZip">DUI</label>
                          <input type="text" name="dui" class="form-control" id="inputZip">
                        </div>
                        <div class="form-group col-md-2">
                          <label for="inputZip">Tipo de sangre</label>
                          <input type="text" name="tipo" class="form-control" id="inputZip">
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                    </form>
                  </div>                                
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
      </div>   
    </section>    
  </div>  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="#">AudioLab</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script type="text/javascript">
  $(function () {
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes();
    var dateTime = date+' '+time;
    $("#form_datetime").datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        autoclose: true,
        todayBtn: true,
        startDate: dateTime
    });
});
</script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
