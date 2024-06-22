<?php
session_start();
// inicia la session_star para poder verificar si estan logueados o no

//incluyo todos los modelos llamados en el index.php
include '../model/index.php';

//si hay una session $_SESSION['usuario'] me mantengo en la pagina y si no hay una session redirecciono al login
if($_SESSION['usuario'] == ''){
      header("Location: login.php");
}

//creo una variable con la clase model/Artistas
$artistas = new Artista();
//consulto todos los artistas registrados en el sistema y me devuelve 
//un listado con todos los datos de los aristas en un array
$consulta = $artistas->consulta_artista();

//se indica que vista se mostrara en la pantalla
$ruta = '../views/artista/index.php';
//se incluye la plantilla
include '../web/layout/index.php';


?>
