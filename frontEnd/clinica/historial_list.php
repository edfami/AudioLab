<?php 
include_once '../../backEnd/conn.php';
include_once '../../backEnd/auth.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$query = "SELECT historialmedica.idHIstorial ,h.hospital, p.nombres,p.apellidos,p.direccion,p.telefono,p.edad, p.tipo_sangre, p.DUI,d.nombre,d.apellido, ultFechaCita, sintomas, m.nombreM FROM `historialmedica` 
INNER JOIN hospital as h ON h.idHospital = historialmedica.idHospital 
INNER JOIN dotor AS d on d.idDoctor = historialmedica.idDoctor 
INNER JOIN paciente as p on p.idPaciente = historialmedica.idPaciente 
INNER join medicina as m on m.idMedicina = historialmedica.idMedicina 
WHERE historialmedica.estado = 1;
";
$resultado = $conexion->prepare($query);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AudioLAb</title>

  <!--Datable css basico-->
  <link rel="stylesheet" href="crud/datatables/datatables.min.css">
  <link rel="stylesheet" href="crud/datatables/DataTables-1.10.18/css/dataTables.bootstrap.min.css">
  <!--main css-->
  <link rel="styleshhet" href="crud/main.css">
  <!--bootstrap-->
  <link rel="stylesheet" href="crud/bootstrap/css/bootstrap.min.css">
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
      <li class="nav-item">
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
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
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
            <a href="doctor" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Doctor
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="paciente.php" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Paciente
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="usuario.php" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Usuario
              </p>
            </a>
          </li>                   
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive">        
             <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
              <thead class="text-center">
               <tr>
                <th>Hospital</th>
                <th>Nombre Paciente</th>
                <th>Apellido Paciente</th>
                <th>Direcion</th>
                <th>Telefono</th>                                
                <th>Edad</th>
                <th>Tipo de Sangre</th>
                <th>DUI</th>
                <th>Nombre Doctor</th>
                <th>Apellido Doctor</th>
                <th>Ultima Fecha de cita</th>
                <th>Sintomas</th>
                <th>Medicina</th>  
                <th>Acciones</th>
               </tr>
              </thead>
              <tbody>
               <?php                            
                foreach($data as $dat) {                                                        
               ?>
               <tr>
                 <td><?php echo $dat['hospital'] ?></td>
                 <td><?php echo $dat['nombres'] ?></td>
                 <td><?php echo $dat['apellidos'] ?></td>
                 <td><?php echo $dat['direccion'] ?></td>
                 <td><?php echo $dat['telefono'] ?></td>
                 <td><?php echo $dat['edad'] ?></td>
                 <td><?php echo $dat['tipo_sangre'] ?></td>
                 <td><?php echo $dat['DUI'] ?></td>   
                 <td><?php echo $dat['nombre'] ?></td>
                 <td><?php echo $dat['apellido'] ?></td>
                 <td><?php echo $dat['ultFechaCita'] ?></td>
                 <td><?php echo $dat['sintomas'] ?></td>                 
                 <td><?php echo $dat['nombreM'] ?></td>
                 <td></td>
               </tr>
               <?php
                  }
               ?>                                
              </tbody>        
            </table>                    
           </div>
          </div>
        </div>            
      </div><!-- /.container-fluid -->--
    </section>
    <!-- /.content -->
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  /*$(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });*/
</script>
<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="crud/jquery/jquery-3.3.1.min.js"></script>
<script src="crud/popper/popper.min.js"></script>
<script src="crud/bootstrap/js/bootstrap.min.js"></script>
<!-- datatables JS -->
<script type="text/javascript" src="crud/datatables/datatables.min.js"></script>       
<script type="text/javascript" src="crud/main.js"></script>  
    

</body>
</html>
