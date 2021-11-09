<?php
session_start();
include_once 'conn.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


if (isset($_POST['login'])) {
    
    $email= trim($_POST['email']);
    $pass = md5($_POST['pass']);

    if($email != "" && $pass != ""){
        try {
            $query = "SELECT * FROM usuario WHERE email = '$email' and password = '$pass';";
            $stmt = $conexion->prepare($query);
            $stmt->bindParam('email', $email, PDO::PARAM_STR);
            $stmt->bindValue('pass', $pass, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if($count == 1 && !empty($row)){
                $_SESSION['sess_user_id'] = $row['idUsuario'];
                $_SESSION['sess_user_name'] = $row['usuario'];
                $_SESSION['sess_email'] = $row['email'];

                header("Location: ../frontEnd/clinica/index.php");
                //echo'<script type="text/javascript">
            //alert("El usuario es correcto");window.location.href="../frontEnd/static/index.php";
            //</script>';
            }else{
                echo'<script type="text/javascript">
            alert("El usuarioo la contraseña son incorrectos...");window.location.href="../index.html";
            </script>';
         
            }
        } catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }

    }else{
        $msg = "Ambos campos son requeridos";
    }
    /*
    $md5 = md5('md5', $pass);
    
    $result = $conexion->prepare($query);
    $result->execute();
    $data = $result->rowCount();

    if($data == 1){
        $_SESSION['email'] = $email;

        header("Location: ../frontEnd/static/index.php");
        
    }else{
        echo'<script type="text/javascript">
            alert("El usuarioo la contraseña son incorrectos...");window.location.href="../index.html";
            </script>';
            echo "15";
    }*/
}

?>