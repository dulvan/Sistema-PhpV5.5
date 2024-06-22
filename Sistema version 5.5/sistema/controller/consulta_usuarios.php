<?php
session_start();
// inicia la session_star para poder verificar si estan logueados o no

//incluyo todos los modelos llamados en el index.php
include '../model/index.php';

//si hay una session $_SESSION['usuario'] me mantengo en la pagina y si no hay una session redirecciono al login
if($_SESSION['usuario'] == ''){
      header("Location: login.php");
}

if ($_SESSION['tipo'] != 'admin') {
    header('Location: index.php');
}
//creo una variable con la clase model/Obras
$usuario = new Usuarios();

//consulto todos las obras registradas en el sistema y me devuelve 
//un listado con todos los datos de las obras en un array
$consulta = $usuario->listadousuarios();


//se indica que vista se mostrara en la pantalla
$ruta = '../views/usuario/index.php';
//se incluye la plantilla
include '../web/layout/index.php';


?>