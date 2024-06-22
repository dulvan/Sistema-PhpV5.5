<?php
//Nombre de la Clase
class Login extends BDculturaconexion {

    //funcion que consulta si el usuario existe
    public function existe_usuario($usuario) {

        //si el parametro es vacio no consulta
        if ($usuario != '') {
            
           $this->conectar();
           //creo el sql de consulta
            $sql = "select * from usuarios where usuario = '$usuario' ";
            //ejecuto la consulta en la base de datos
            $consulta = $this->ejecutarsql($sql);
            
            $this->desconectar();
            //si encontro el usuario es mayor que cero y devuelve true sino lo contrario
            if ($this->contar($consulta) > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {

            return NULL;
        }
    }
    //valida si el usuario y la clave son correctos
    public function valida_login($usuario, $clave) {
        //si el usuario y la clave tienen contenido consulto
        if ($usuario != '' AND $clave != '') {
            //encrito la clave
            $clave = md5($clave);
            //me conecto
            $this->conectar();
            //creo y ejecuto el sql para consultar si existe el usuario con esa clave
            $sql = "select * from usuarios where usuario = '$usuario' AND clave = '$clave' ";
            $consulta = $this->ejecutarsql($sql);
            $this->desconectar();
             //si encontro el usuario es mayor que cero y devuelve true sino lo contrario
            if ($this->contar($consulta) > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {

            return NULL;
        }
    }

    public function consulta_usuario($usuario) {

        if ($usuario != '') {
            $usuario = trim($usuario);
            $this->conectar();
            $sql = "select * from usuarios where usuario = '$usuario' ";
            $consulta = $this->ejecutarsql($sql);
            $this->desconectar();

            if ($this->contar($consulta) > 0) {

                while ($listar = $this->listar($consulta))
                    $data = $listar;
                return $data;
            } else {
                return NULL;
            }
        } else {

            return NULL;
        }
    }

    //calcular los intentos
    public function intentos($usuario) {
        if ($usuario != '') {
            //consulto el usuario
            $datos = $this->consulta_usuario($usuario);
            //cantidad de intentos permitidos 4
            
            //si lleva menos de 4 intentos 
            if ($datos['intentos'] < 2) {
                //le aumento un intento
                $datos['intentos'] = $datos['intentos'] + 1;
                //estatus 1 significa activo
                $estatus = 1;
                //mensaje de error q se imprime
                $mensaje = 'Usuario o Clave incorrecto';
                //si lleva mas de 4 intentos lo bloqueo actualizando
                //le aumento un intento y bloqueo
            } elseif ($datos['intentos'] >= 2) {
                $datos['intentos'] = $datos['intentos'] + 1;
                //estatus 1 significa bloqueado
                $estatus = 2;
                //mensaje de error q se imprime
                $mensaje = 'Su usuario ha sido bloqueado';
            }
            //le paso los intentos que se sumaron
            $intentos = $datos['intentos'];
            //creo el sql de modificar
            $sql = "update usuarios set estatus='$estatus', intentos = '$intentos' where usuario='$usuario'";
            
            //ejecuto la modificacion
            $this->ejecutarsql($sql);
            
            //envio el msj de error            
            return $mensaje;
        } else {

            return NULL;
        }
    }

}

?>
