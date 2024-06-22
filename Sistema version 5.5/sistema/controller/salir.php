<?php
//inicia la session
session_start();

include '../model/index.php';

$usuario_reg = $_SESSION['usuario'];

$registrar = new Usuarios();
$registrar->sessionsalir($usuario_reg);

//destruye todas las sessiones
session_destroy();

//redirecciona al login
header("Location: login.php");
?>
