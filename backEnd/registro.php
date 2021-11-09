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
