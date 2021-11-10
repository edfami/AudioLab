<?php

include_once 'conn.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

if (isset($_POST['registro'])) {
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass_md5 = md5($pass);

    $query = "INSERT INTO usuario (usuario, password, email, idRol, estado) value ('$usuario', '$pass_md5', '$email', '2', '1')";

    $result = $conexion->prepare($query);
    $result->execute();
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    if ($data == 1) {
        echo "<script>alert('Se registro con exito')</script>";
        header("location: ../index.html");
    } else {
        echo "<scriptalert('no se pudo registrar el usuario')></script>";
        header("location: ../index.html");
    }
}

if(isset($_POST['guardar'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $celular = $_POST['celular'];
    $municipio = $_POST['municipio'];
    $fecha = $_POST['fecha'];
    $edad = $_POST['edad'];
    $dui = $_POST['dui'];
    $tipo = $_POST['tipo'];

    $query1 = "INSERT INTO paciente (nombres, apellidos, direccion, telefono, celular, fechaNacimiento, edad, idMunicipio,estado,Dui,tipo_sangre) 
    value ('$nombre', '$apellido', '$direccion','$telefono', '$celular', '$fecha',
    '$edad', '$municipio', '1', '$dui', '$tipo')";

    $result1 = $conexion->prepare($query1);
    $result1->execute();
    $data1 = $result1->fetchAll(PDO::FETCH_ASSOC);

    if ($data1 == 1) {
        echo "<script>alert('Se registro con exito')</script>";
        header("location: ../frontEnd/clinica/perfil_lista.php");
    } else {
        echo "<scriptalert('no se pudo registrar el usuario')></script>";
        header("location: ../frontEnd/clinica/perfil.php");
    }
    

}

if(isset($_POST['guardarHis'])){
    $hospital = $_POST['hospital'];
    $paciente = $_POST['paciente'];
    $doctor = $_POST['doctor'];
    $fecha = $_POST['fecha'];
    $sintomas = $_POST['sintomas'];
    $medicina = $_POST['medicina'];

    $query2 = "INSERT INTO `historialmedica` (`idHIstorial`, `idHospital`, `idPaciente`, `idDoctor`, `ultFechaCita`, `sintomas`, `idMedicina`, `estado`) 
    VALUES (NULL, '$hospital', '$paciente', '$doctor', '$fecha', '$sintomas', '$medicina', b'1');";

    $result2 = $conexion->prepare($query2);
    $result2->execute();
    $data2 = $result2->fetchAll(PDO::FETCH_ASSOC);

    if ($data2 == 1) {
        echo "<script>alert('Se registro con exito')</script>";
        header("location: ../index.html");
    } else {
        echo "<scriptalert('no se pudo registrar el usuario')></script>";
        header("location: ../index.html");
    }
    
}

if(isset($_POST['guardarCi'])){
    $paciente = $_POST['usuario'];
    $doctor = $_POST['doctor'];
    $fecha = $_POST['fecha'];
    $tipo = $_POST['tipo'];

    $query = "INSERT INTO `citamedica`(`idUsuario`, `idDoctor`, `fechaActual`, `fechaCita`, `idTipo`, `estado`) 
    VALUES ($paciente,$doctor,Now(),$fecha,$tipo, '1');";
    $result = $conexion->prepare($query);
    $result->execute();
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    if ($data2 == 1) {
        echo "<script>alert('Se creado con exito')</script>";
        header("location: ../frontEnd/clinica/cita.php");
    } else {
        echo "<scriptalert('no se pudo crear la cita')></script>";
        header("location: ../frontEnd/clinica/cita.php");
    }






}
