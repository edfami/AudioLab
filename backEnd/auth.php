<?php
session_start();
if(!isset($_SESSION["email"]) && !isset($_SESSION['usuario']) && !isset($_SESSION['id'])){
header("Location: ../index.html");
exit(); }
?>