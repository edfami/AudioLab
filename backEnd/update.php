<?php
include_once 'conn.php';
include_once 'auth.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

if(isset($_POST['updateHis'])){
    $id = $_POST['update_id'];
    $doctor = $_POST['doctor'];
    $medicina = $_POST['medicina'];
    $fecha = $_POST['fecha'];
    $sintoma = $_POST['sintomas'];

    $query = "UPDATE historialmedica SET idDoctor = '$doctor', idMedicina = '$medicina', sintomas = '$sintoma', ultFechaCita = '$fecha' where idHIstorial = '$id'";

    $result = $conexion->prepare($query);
    $result->execute();
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    if($data == 1){

        echo "<script> alert('Datos Actualizados');</script>";
        header("Location:../frontEnd/clinica/historial_list.php");


    }else{
        echo "<script> alert('No se ha podido Actualizar');</script>";
        header("Location:../frontEnd/clinica/historial_list.php");
    }

}



?>