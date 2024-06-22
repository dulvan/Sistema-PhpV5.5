<?php
session_start();
// inicia la session_star para poder verificar si estan logueados o no

//incluyo todos los modelos llamados en el index.php
include '../model/index.php';

//si hay una session $_SESSION['usuario'] me mantengo en la pagina y si no hay una session redirecciono al login
if($_SESSION['usuario'] == ''){
      header("Location: login.php");
}

//se indica que vista se mostrara en la pantalla
$ruta = '../views/index.php';
//se incluye la plantilla
include '../web/layout/index.php';


?>
