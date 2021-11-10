<?php 
include_once '../../backEnd/conn.php';
include_once '../../backEnd/auth.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$query = "SELECT idPaciente, nombres, apellidos, direccion, telefono, celular, fechaNacimiento, edad, m.municipio, DUI, tipo_sangre FROM `paciente` as p 
INNER join municipio as m on m.idMunicipio = p.idMunicipio 
WHERE p.estado = 1;
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
                <th>id</th> 
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th>telefono</th>
                <th>celular</th>                                
                <th>fecha</th>
                <th>edad</th>
                <th>municipio</th>
                <th>DUI Doctor</th>
                <th>Tipo de Sangre Doctor</th>  
                <th>Acciones</th>
               </tr>
              </thead>
              <tbody>
               <?php                            
                foreach($data as $dat) {                                                        
               ?>
               <tr>
                 <td><?php echo $dat['idPaciente'] ?></td>
                 <td><?php echo $dat['nombres'] ?></td>
                 <td><?php echo $dat['apellidos'] ?></td>
                 <td><?php echo $dat['direccion'] ?></td>
                 <td><?php echo $dat['telefono'] ?></td>
                 <td><?php echo $dat['celular'] ?></td>
                 <td><?php echo $dat['fechaNacimiento'] ?></td>
                 <td><?php echo $dat['edad'] ?></td>
                 <td><?php echo $dat['municipio'] ?></td>   
                 <td><?php echo $dat['DUI'] ?></td>
                 <td><?php echo $dat['tipo_sangre'] ?></td>
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
      </div><!-- /.container-fluid -->
    </section>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-label="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Historial Medico</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="../../backEnd/update.php" method="POST">
            <div class="modal-body">
              <input type="hidden" name="update_id" id="update_id">
              <div class="form-group">
                <label>Hospital:</label>
                <input type="text" name="hospital" id="hospital" class="form-control" placeholder="" readonly>
              </div>
              <div class="form-group">
                <label>Nombre Paciente:</label>
                <input type="text" name="nombres" id="nombres" class="form-control" placeholder="" readonly>
              </div>
              <div class="form-group">
                <label>Apellido Paciente:</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="" readonly>
              </div>
              <div class="form-group">
                <label>direccion:</label>
                <input type="text" name="direccion" id="direccion" class="form-control" placeholder="" readonly>
              </div>
              <div class="form-group">
                <label>Telefono:</label>
                <input type="number" name="telefono" id="telefono" class="form-control" placeholder="" readonly>
              </div>
              <div class="form-group">
                <label>Edad:</label>
                <input type="text" name="edad" id="edad" class="form-control" placeholder=""readonly>
              </div>
              <div class="form-group">
                <label>Tipo de Sangre:</label>
                <input type="text" name="tipo_sangre" id="tipo_sangre" class="form-control" placeholder="" readonly>
              </div>
              <div class="form-group">
                <label>Dui:</label>
                <input type="text" name="dui" id="dui" class="form-control" placeholder="" readonly>
              </div>
              <?php 
              $query1 = "SELECT * FROM dotor";
              $result = $conexion->prepare($query1);
              $result->execute();
              $data1 = $result->fetchAll(PDO::FETCH_ASSOC);

              
              ?>

              <div class='form-group'>
                <label>Doctor:</label>
                <select name='doctor' class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option value=''>Elegir Doctor</option>

              <?php
              foreach($data1 as $dat1){
                 echo " <option value='".$dat1['idDoctor']."'>".$dat1['nombre']."</option>";
                }
                echo "</select>"

                ?>
              </div>                    
              <div class="form-group">
                <label>Fecha:</label>
                <input type="timepicker" name="fecha" id="fecha" class="form-control" placeholder="">
              </div><div class="form-group">
                <label>Sintomas:</label>
                <input type="text" name="sintomas" id="sintomas" class="form-control" placeholder="">
              </div>
              <div class="form-group">
                <label>Medicina:</label>
                <?php
                  $query2 = "SELECT * FROM  medicina";
                  $resul = $conexion->prepare($query2);
                  $resul->execute();
                  $data2 = $resul->fetchAll(PDO::FETCH_ASSOC);                 
                ?>
                <select name='medicina' class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option value=''>Elegir Medicina</option>
                  <?PHP
                    foreach($data2 as $dat2){

                      echo "<option value='".$dat2['idMedicina']."'>".$dat2['nombreM']."";
                    }
                  ?>
                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" name="updateHis" class="btn btn-primary">Guardar</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>

    <!--modal delete-->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-label="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Borrar Paciente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="../../backEnd/update.php" method="POST">
            <div class="modal-body">
              <input type="hidden" name="delete_id" id="delete_id">
              <h4>Seguro que desea borrar...</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" name="deletep" class="btn btn-primary">Borrar</button>
            </div>            
          </form>
        </div>
      </div>
    </div>

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
$(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
});  

$(document).ready(function(){
    $('.btnBorrar').on('click', function(){
    $('#deletemodal').modal('show');
    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function(){
      return $(this).text();
    }).get();

    console.log(data);

    $('#delete_id').val(data[0]);

  });




});

</script>
<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="crud/jquery/jquery-3.3.1.min.js"></script>
<script src="crud/popper/popper.min.js"></script>
<script src="crud/bootstrap/js/bootstrap.min.js"></script>
<!-- datatables JS -->
<script type="text/javascript" src="crud/datatables/datatables.min.js"></script>       
  
    

</body>
</html>
