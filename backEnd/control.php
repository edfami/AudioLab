<?php

include('conn.php');
session_start();

if (isset($_POST['login'])) {
    
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $pass = stripslashes($_REQUEST['pass']);
    $pass = mysqli_real_escape_string($con, $pass);

    $query = "SELECT * FROM usuario WHERE email = '$email' and  password = '".md5($pass)."'";

    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);

    if($rows == 1){
        $_SESSION['email'] = $email;

        header("Location: ../frontEnd/static/index.php");
        
    }else{
        echo "<div class='form'>
        <h3>Username/password is incorrect.</h3>
        <br/>Click here to <a href='login.php'>Login</a></div>";
    }
}

?>