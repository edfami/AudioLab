<?php

include('conn.php');

if(isset($_POST['registro'])){
    
    $username = stripslashes($_REQUEST['usuario']);
    
    $username = mysqli_real_escape_string($con, $username);
    
    $email = stripslashes($_REQUEST['email']);
   
    $email = mysqli_real_escape_string($con, $email);
    
    $pass = stripslashes($_REQUEST['pass']);
    
    $pass = mysqli_real_escape_string($con, $pass);
    

    $query1 = "SELECT * FROM usuario where usuario = $username, email = $email and password = '".md5($pass)."', estado = 1";
  
    $result1 = mysqli_query($con, $query1);
    
    $rows1 = mysqli_num_rows($result1);
  

    if($rows1 == 1){


        echo'<script type="text/javascript">
            alert("El usuario ya existe");window.location.href="../index.html";
            </script>';

        
    }else{

        $query2 = "INSERT INTO usuario (usuario, password, email, idRol, estado) value ('".$username."', '".md5($pass)."', '".$email."', 3, 1)";
  
        $result2 = mysqli_query($con, $query2);

        $rows2 = mysqli_num_rows($result2);
 
        
        if($rows2 >= 1){
            echo'<script type="text/javascript">
            alert("Usuario registrado");window.location.href="../index.html";
            </script>';
         
        }

        

    }
    /*
    $query1 = "SELECT * FROM usuario WHERE usuario = '".$username."', password = '".md5($pass)."', email = '".$email."'";

    $stmt = $con->prepare($query1);
    $stmt->bind_param(":email", $email);
    $stmt->execute();
    $result1 = $smt->get_result();
    $stmt->close();
    if($result1){
        echo'<script type="text/javascript">
            alert("El usuario ya existe");window.location.href="../index.html";
            </script>';
    }else{
        $query2 = "INSERT INTO usuario (usuario, password, email, idRol, estado) value ('".$username."', '".md5($pass)."', '".$email."', 2, 1)";
        $stmt = $con -> prepare($query2);
        $stmt->bind_params(":email", $$email);

        $stmt->execute();
        $result = $stmt->affected_rows;
        $stmt->close();

        echo'<script type="text/javascript">
            alert("El usuario ha sido registrado");
            window.location.href="../index.html";
            </script>';

    }*/
}
