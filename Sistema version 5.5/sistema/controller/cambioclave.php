<?php

//error_reporting(0);
session_start();
// inicia la session_star para poder verificar si estan logueados o no
//incluyo todos los modelos llamados en el index.php
$cambio = TRUE;
include '../model/index.php';

//si hay una session $_SESSION['usuario'] me mantengo en la pagina y si no hay una session redirecciono al login
if ($_SESSION['usuario'] == '') {
    header("Location: index.php");
}

$user = new Usuarios();

if (isset($_POST['guardar'])) {

    $clave = md5($_POST['clave']);
    $clave2 = md5($_POST['clave2']);

    $id_user = $_SESSION['usuario'];

    $data = $user->detalle2($id_user);

    if ($data['clave'] == $clave) {
        $error = "La contraseña debe ser diferente a la anterior";
        
    } else {
        $cambio = $user->cambioclave($clave);

        //si se guardo correctamente se redirecciona a la consulta principal
        if ($cambio) {

            header("Location: mensaje.php?msj=cambioclave");
        }
    }
}



//se indica que vista se mostrara en la pantalla
$ruta = '../views/login/cambioclave.php';
//se incluye la plantilla
include '../web/layout/index.php';
?>
