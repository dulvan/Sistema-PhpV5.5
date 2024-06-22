<?php

class Usuarios extends BDculturaconexion {

    public function usuario() {
        // esta funcion es para listar los estatus de artitas
        // se conecta a la base de datos 
        $this->conectar();
        // creo el sql
        $sql = "Select * from lista_estatus_artistas";
        // ejecuto el sql en la base de datos y me devuelve un lista de los estatus 

        $consulta = $this->ejecutarsql($sql);
        // me desconecto de la base de datos 
        $this->desconectar();
        // retorno el listado obtenido 
        return $consulta;
    }

    //consulta el listado de usuarios
    public function listado() {

        //me conecto a la base datos
        $this->conectar();
        $sql = "Select * from usuarios where estatus = '1'";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();

        return $consulta;
    }

    public function listadousuarios() {

        //me conecto a la base datos
        $this->conectar();
        $sql = "Select * from usuarios where tipo = 'user'";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();

        return $consulta;
    }

    public function detalle($id) {

        $this->conectar();
        $sql = "Select * from usuarios WHERE id_usuarios = '$id'";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();

        return $consulta;
    }

    public function detalle2($id) {

        $this->conectar();
        $sql = "select * from usuarios WHERE id_usuarios = '$id'";
        $consulta = $this->ejecutarsql($sql);

        $consulta = mysql_fetch_array($consulta);
        return $consulta;
    }
    
     public function validousuario($usuario) {

        $this->conectar();
        $sql = "select * from usuarios WHERE usuario = '$usuario'";
        $consulta = $this->ejecutarsql($sql);

        $consulta = mysql_fetch_array($consulta);
        return $consulta;
    }
     public function validocedula($tipo_cedula, $num_cedula) {

        $this->conectar();
        $sql = "select * from usuarios WHERE tipo_cedula = '$tipo_cedula' AND num_cedula = '$num_cedula'";
        $consulta = $this->ejecutarsql($sql);

        $consulta = mysql_fetch_array($consulta);
        return $consulta;
    }

    //function para registrar artistas, los parametros que le pasan son las variables del formulario
    public function registro($tipo_cedula, $num_cedula, $nombre, $apellido, $usuario, $clave, $telefono, $email, $estatus) {

        //valido que los campos no esten vacios
        // if ($this->artista_validar($tp_cedula, $num_cedula, $nombre, $apellido, $direccion, $estado, $telefono, $correo, $num_obras, $estatus, $editar = FALSE)) {

        $fecha_reg = date('Y-m-d');
        $hora_reg = date('H:i:s');
        $usuario_reg = $_SESSION['usuario'];
        $intentos = 0;
        $tipo = 'user';

        //me conecto
        $this->conectar();
        //creo el sql para insertar
        $sql = "INSERT INTO usuarios
              (
              usuario, 
              clave, 
              intentos, 
              tipo, 
              nombre, 
              apellido, 
              tipo_cedula, 
              num_cedula, 
              email, 
              telefono,
              fecha_reg, 
               usuario_reg, 
              hora_reg, 
              estatus)
              VALUES
              ('$usuario','$clave','$intentos','$tipo' ,'$nombre', '$apellido','$tipo_cedula', '$num_cedula',  '$email', '$telefono', 
                  '$fecha_reg','$usuario_reg','$hora_reg','$estatus')";
        //ejecuto el sql
        $consulta = $this->ejecutarsql($sql);

        
        $observacion = "Se ha registrado un usuario nuevo";
        $operacion = 'Registrar';
        $bitacora = new Bitacora();
        $bitacora->registro('usuarios', $operacion, $observacion);


        $this->desconectar();
        return TRUE;
//        } else {
//            return FALSE;
//        }
    }

    public function eliminar($id) {

        $this->conectar();
         $fecha_mod = date('Y-m-d');
            $hora_mod = date('H:i:s');
            $usuario_mod = $_SESSION['usuario'];
        //consulta de sql para eliminar
        $sql = "UPDATE usuarios SET estatus = '2',            
                fecha_mod = '$fecha_mod',
              usuario_mod = '$usuario_mod',
              hora_mod = '$hora_mod' where id_usuarios = '$id'";
        $consulta = $this->ejecutarsql($sql);
        
          //Bitacora
        $observacion = "Se ha Eliminado un usuario";
        $operacion = 'Eliminar';
        $bitacora = new Bitacora();
        $bitacora->registro('usuarios', $operacion, $observacion);
        
        if ($this->desconectar()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function ultimo() {

        $this->conectar();
        $sql = "Select id_usuarios from usuarios ORDER BY id_usuarios DESC LIMIT 1";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();
        $consulta = mysql_fetch_array($consulta);
        $id = $consulta['id_usuarios'];
        return $id;
    }

    public function cambioclave($clave) {


        $id_user = $_SESSION['usuario'];

        //me conecto
        $this->conectar();
        //creo el sql para modificar la obra donde el id es el id de la obra
        $sql = "UPDATE usuarios SET 
                clave = '$clave', cambioclave = 'n'
                 WHERE id_usuarios = '$id_user' ";

        $antes = $this->detalle2($id_user);

        $consulta = $this->ejecutarsql($sql);

        $despues = $this->detalle2($id_user);
        $observacion = "Realizo Cambio de Contraseña";
        $operacion = 'Modificar';
        $bitacora = new Bitacora();
        $bitacora->registro('usuarios', $operacion, $observacion);


        $this->desconectar();

        return TRUE;
    }
    
    
    public function editar($id ,$estatus, $nombre, $apellido, $email, $telefono){
        
         //fecha, hora y usuario que modifica la obra
            $fecha_mod = date('Y-m-d');
            $hora_mod = date('H:i:s');
            $usuario_mod = $_SESSION['usuario'];

            //me conecto
            $this->conectar();        
        
            $sql = "UPDATE usuarios SET 
            estatus='$estatus',
            usuario_mod='$usuario_mod',
            fecha_mod='$fecha_mod',
            hora_mod='$hora_mod',
            nombre='$nombre',
            apellido='$apellido',
            email='$email',
            telefono='$telefono' WHERE id_usuarios = '$id' ";
              
        
            $consulta = $this->ejecutarsql($sql);

            
            $observacion = "Se ha modificado un usuario";
            $operacion = 'Modificar';
            $bitacora = new Bitacora();
            $bitacora->registro('usuarios', $operacion, $observacion);

            $this->desconectar();

            return TRUE;
       
        
    }
    
     public function sessionsalir($id) {

        $this->conectar();
         
        //consulta de sql para eliminar
        $sql = "UPDATE usuarios SET session = '0' where id_usuarios = '$id'";
        $consulta = $this->ejecutarsql($sql);
        
          //Bitacora
        $observacion = "El usuario Salio";
        $operacion = 'session';
        $bitacora = new Bitacora();
        $bitacora->registro('usuarios', $operacion, $observacion);
        
        if ($this->desconectar()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
         public function sessionentrar($id) {

        $this->conectar();
         
        //consulta de sql para eliminar
        $sql = "UPDATE usuarios SET session = '1' where id_usuarios = '$id'";
        $consulta = $this->ejecutarsql($sql);
        
          //Bitacora
        $observacion = "El usuario Ingreso";
        $operacion = 'session';
        $bitacora = new Bitacora();
        $bitacora->registro('usuarios', $operacion, $observacion);
        
        if ($this->desconectar()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    

}

?>
