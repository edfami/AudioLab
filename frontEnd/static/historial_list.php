<?php 
include('../../backEnd/auth.php');
include('../../backEnd/conn.php');
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
    <a href="index3.html" class="brand-link">
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
          <a href="#" class="d-block"><?php echo $_SESSION['email'];?></a>
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

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Listado de Historial Medico</h1>
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
    <?php

    $query = "SELECT historialmedica.idHIstorial ,h.hospital, p.nombres,p.apellidos,p.direccion,p.telefono,p.edad, d.nombre,d.apellido, ultFechaCita, sintomas, m.nombre FROM `historialmedica` 
    INNER JOIN hospital as h ON h.idHospital = historialmedica.idHospital 
    INNER JOIN dotor AS d on d.idDoctor = historialmedica.idDoctor 
    INNER JOIN paciente as p on p.idPaciente = historialmedica.idPaciente 
    INNER join medicina as m on m.idMedicina = historialmedica.idMedicina 
    WHERE historialmedica.estado = 1;";

    //$resultado = mysqli_query($con, $query);
    //$rows = mysqli_fetch_row($resultado);
    $result = $con->query($query);

    
    ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-32">
            <!-- Custom Tabs -->
            <div class="card">              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <th>id</th>                  
                    <th>hospital</th>
                    <th>nombre paciente</th>
                    <th>apellido paciente</th>
                    <th>direccion</th>
                    <th>telefono</th>
                    <th>edad</th>
                    <th>nombre doctor</th>
                    <th>apellido doctor</th>
                    <th>fecha cita</th>
                    <th>sintoma</th>
                    <th>medicina</th>
                    <th>opciones</th>
                  
                  </thead>
                  <tbody>
                  <tr>
                    <?php

                    if($result->num_rows>0){

                      while($row = $result->fetch_assoc()){

                        ?>
                        <tr>
                          <td><?php echo $row['idHIstorial']?></td>
                          <td><?php echo $row['hospital'];?></td>
                          <td><?php echo $row['nombres'];?></td>
                          <td><?php echo $row['apellidos'];?></td>
                          <td><?php echo $row['direccion'];?></td>
                          <td><?php echo $row['telefono'];?></td>
                          <td><?php echo $row['edad'];?></td>
                          <td><?php echo $row['nombre'];?></td>
                          <td><?php echo $row['apellido'];?></td>
                          <td><?php echo $row['ultFechaCita'];?></td>
                          <td><?php echo $row['sintomas'];?></td>
                          <td><?php echo $row['nombre'];?></td>
                          <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">Modal</button>
                            <a class="btn btn-info" href="historial_list.php?id=<?php echo $row["idHIstorial"]; ?>" name="">Edit</a>&nbsp;
                            <a class="btn btn-danger" href="historialmedica.php?id=<?php echo $row["idHIstorial"];?>" name="delete">delete</a></td>

                        </tr>


                      <?php 

                      }
                    }  


                     ?>                      
                  </tr>                  
                  </tfoot>
                </table>
                <div class="modal fade" id="#miModal" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
                    <div class="modal-dialog"></div>
                </div>

              </div>
              <!-- /.card-body -->
            </div>            
            <!-- /.card -->

            <!-- ./card -->
          </div>
        </div>
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!--modal-->

<?php 

if(isset($_POST['update'])){
  $user_id = $_GET["idHIstorial"];

  if(isset($_GET['idHIstorial'])){
    $sql = "SELECT historialmedica.idHIstorial ,h.hospital, p.nombres,p.apellidos,p.direccion,p.telefono,p.edad, d.nombre,d.apellido, ultFechaCita, sintomas, m.nombre FROM `historialmedica` 
    INNER JOIN hospital as h ON h.idHospital = historialmedica.idHospital 
    INNER JOIN dotor AS d on d.idDoctor = historialmedica.idDoctor 
    INNER JOIN paciente as p on p.idPaciente = historialmedica.idPaciente 
    INNER join medicina as m on m.idMedicina = historialmedica.idMedicina 
    WHERE historialmedica.estado = 1 AND historialmedica.idHIstorial = '$user_id';";

    $result = $con->query($sql);

    if($result->num_rows > 0){
      while($row3 = $result->fetch_assoc()){
        $nombreHospital = $row3['hospital'];
        $nombreP = $row3['nombres'];
        $apellidoP = $row3['apellidos'];
        $direccion = $row3['direccion'];
        $telefono = $row3['telefono'];
        $edad = $row3['edad'];
        $nombreD = $row3['nombre'];
        $apeliidoD = $row3['apellido'];
        $fechaCita = $row3['ultFechaCita'];
        $sintoma = $row3['sintomas'];
        $medicina = $row3['nombre'];        
      }
      ?>
        
      <?php
    }
  }
}
?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<!--<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
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
  });
</script>

</body>
</html>
