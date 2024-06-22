<?php

error_reporting(0);
session_start();
// inicia la session_star para poder verificar si estan logueados o no
//incluyo todos los modelos llamados en el index.php
include '../model/index.php';

//si hay una session $_SESSION['usuario'] redirecciono a la pagina principal "controller/index"
if (@$_SESSION['usuario'] != '') {
    header("Location: index.php");
}

//En caso de que se le de enviar al formulario de login recibo por post los valores
//$_POST['boton'] es el nombre del boton de envio del formulario
if (isset($_POST['boton'])) {

    //recibo el usuario y lo coloco todo en minuscula con la funcion "strtolower"
    $usuario = strtolower($_POST['usuario']);
    //recibo la clave
    $clave = $_POST['clave'];

    //si se escribio el usuario y la clave hago el proceso de validacion
    if ($usuario != '' AND $clave != '') {

        //creo una variable con la clase Login de la carpeta //Modelo/login
        $valida = new Login();

        //Uso la funcion existe_usuario de la Clase Login para validar que el usuario existe
        //la funcion me devuelve TRUE O FALSE
        $existe_usuario = $valida->existe_usuario($usuario);

        if ($existe_usuario) {
            //si el usuario existe procedo a validar que el usuario y la clave existan
            //la funcion me devuelve TRUE O FALSE
            $valida_usuario = $valida->valida_login($usuario, $clave);

            if ($valida_usuario) {
                //si el usuario existe consultos todos sus datos con la function "consulta_usuario" que me devuelve un array de valores
                $datos = $valida->consulta_usuario($usuario);

                if ($datos['estatus'] == '1') {
                    
                    if($datos['session'] == '0'){
                    
                    //si el usuario esta activo creo la session usuario y redirecciono al index
                    $_SESSION['usuario'] = $datos['id_usuarios'];
                    $_SESSION['tipo'] = $datos['tipo'];

                    $re = new Usuarios();
                    $re->sessionentrar($datos['id_usuarios']);

                    header("Location: index.php");
                    }
                    else {
                        
                      $mensaje = "Usuario ya en uso";  
                        
                    }
                } else {
                    //si el usuario esta inactivo valido que estatus tiene
                    $class_estatus = new EstatusUsuario();
                    //consulto que estatus tiene
                    $estatus = $class_estatus->consulta_estatus_usuario($datos['estatus']);
                    //muestro el mensaje
                    $mensaje = 'Acceso Restringido su estatus es: ' . $estatus['estatus_usuarios'];
                }
            } else {
                //si no existe utilizo la funcion de intentos para incrementarle la cantida de intentos
                // muestro el mensaje que me devuelve la funcion
                $mensaje = $valida->intentos($usuario);
            }
        } else {
            //si no existe el usuario muestro el mensaje
            $mensaje = 'Usuario o Clave incorrecto';
        }
    }
}

//se indica que vista se mostrara en la pantalla
$ruta = '../views/login/index.php';
//se incluye la plantilla
include '../web/layout/index.php';
?>
