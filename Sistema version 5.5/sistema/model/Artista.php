<?php

class Artista extends BDculturaconexion {

    public $tp_cedula;
    public $num_cedula;
    public $nombre;
    public $apellido;
    public $direccion;
    public $estado;
    public $telefono;
    public $correo;
    public $estatus;
    public $num_obras;

    //function para validar que los campos no sean vacios
    public function artista_validar($tp_cedula, $num_cedula, $nombre, $apellido, $direccion, $estado, $telefono, $correo, $num_obras, $estatus, $editar) {

        //valido que cada campo no sea vacio
        if ($tp_cedula == '') {
            $this->tp_cedula = 'No puede ser vacio';
        }
        if ($num_cedula == '') {
            $this->num_cedula = 'No puede ser vacio';
        } else {

            $this->conectar();
            //consulto cedula
            $sql = "select * from artistas where tp_cedula = '$tp_cedula' AND num_cedula = '$num_cedula'";

            $consulta = $this->ejecutarsql($sql);

            if ($this->contar($consulta) > 0) {

                if ($editar == TRUE) {

                    $consulta = mysql_fetch_array($consulta);
                    if ($consulta['tp_cedula'] == $tp_cedula AND $consulta['num_cedula'] == $num_cedula) {
                        
                    } else {
                        $this->num_cedula = 'La cedula del Artista ya existe';
                    }
                } else {
                    $this->num_cedula = 'La cedula del Artista ya existe';
                }
            }
            $this->desconectar();
        }
        if ($nombre == '') {
            $this->nombre = 'No puede ser vacio';
        }
        if ($apellido == '') {
            $this->apellido = 'No puede ser vacio';
        }
        if ($direccion == '') {
            $this->direccion = 'No puede ser vacio';
        }
        if ($estado == '') {
            $this->estado = 'No puede ser vacio';
        }
        if ($telefono == '') {
            $this->telefono = 'No puede ser vacio';
        }
        if ($correo == '') {
            $this->correo = 'No puede ser vacio';
        }
        if ($num_obras == '') {
            $this->num_obras = 'No puede ser vacio';
        }
        if ($estatus == '') {
            $this->estatus = 'No puede ser vacio';
        }

        //si no hubo errores en las validaciones anteriores devuelve true
        if ($this->tp_cedula == '' AND $this->num_cedula == '' AND $this->nombre == '' AND $this->apellido == '' AND $this->direccion == '' AND $this->estado == '' AND $this->telefono == '' AND $this->correo == '' AND $this->num_obras == '' AND $this->estatus == '') {

            return true;
        } else {
            return false;
        }
    }

    //function para registrar artistas, los parametros que le pasan son las variables del formulario
    public function registro($tp_cedula, $num_cedula, $nombre, $apellido, $direccion, $estado, $telefono, $correo, $num_obras, $estatus) {

        //valido que los campos no esten vacios
        if ($this->artista_validar($tp_cedula, $num_cedula, $nombre, $apellido, $direccion, $estado, $telefono, $correo, $num_obras, $estatus, $editar = FALSE)) {

            $fecha_reg = date('Y-m-d');
            $hora_reg = date('H:i:s');
            $usuario_reg = $_SESSION['usuario'];

            //me conecto
            $this->conectar();
            //creo el sql para insertar
            $sql = "INSERT INTO artistas
              (
              tp_cedula,
              num_cedula,
              nombre,
              apellido,
              direccion,
              estado,
              telefono,
              correo,
              num_obras,
              fecha_reg,
              usuario_reg,
              hora_reg,
              estatus)
              VALUES
              ('$tp_cedula', '$num_cedula', '$nombre', '$apellido', '$direccion', '$estado', '$telefono', '$correo', '$num_obras',
                  '$fecha_reg','$usuario_reg','$hora_reg','$estatus')";
            //ejecuto el sql
            $consulta = $this->ejecutarsql($sql);
            
            
        //Bitacora
        $observacion = "Se ha registrado un artista nuevo";
        $operacion = 'Registrar';
        $bitacora = new Bitacora();
        $bitacora->registro('artistas', $operacion, $observacion);
            
            
            $this->desconectar();
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //consulta del listado de artistas
    public function consulta_artista() {

        $this->conectar();
        if ($_SESSION['tipo'] == 'admin') {
        $sql = "select id_artistas, tp_cedula, num_cedula, artistas.nombre, apellido, direccion, estado, telefono, correo, num_obras, estados.nombre as estados from artistas INNER JOIN estados ON (estado = id_estados) where estatus = '1'";
        }
        else {
        $sql = "select id_artistas, tp_cedula, num_cedula, artistas.nombre, apellido, direccion, estado, telefono, correo, num_obras, estados.nombre as estados from artistas INNER JOIN estados ON (estado = id_estados) where estatus = '1'";
           
        } $consulta = $this->ejecutarsql($sql);
        $this->desconectar();
        return $consulta;
    }

    //consulta para el detalle de arista
    public function detalle_artista($id_artista) {

        $this->conectar();
        $sql = "select id_artistas, tp_cedula, num_cedula, artistas.nombre, apellido, direccion, estado, telefono, correo, num_obras, estados.nombre as estados, estatus 
            from artistas 
            INNER JOIN estados ON (estado = id_estados)            
            WHERE id_artistas = '$id_artista'";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();
        return $consulta;
    }

    public function ver_artista($id) {

        $this->conectar();
        $sql = "Select * from artistas WHERE id_artistas = '$id'";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();

        return $consulta;
    }

    //sql para editar el artista
    public function editar($tp_cedula, $num_cedula, $nombre, $apellido, $direccion, $estado, $telefono, $correo, $num_obras, $estatus, $id) {

        if ($this->artista_validar($tp_cedula, $num_cedula, $nombre, $apellido, $direccion, $estado, $telefono, $correo, $num_obras, $estatus, $editar = TRUE)) {

            $fecha_mod = date('Y-m-d');
            $hora_mod = date('H:i:s');
            $usuario_mod = $_SESSION['usuario'];

            
            $this->conectar();
            $sql = "UPDATE artistas
              SET 
              tp_cedula = '$tp_cedula',
              num_cedula = '$num_cedula',
              nombre = '$nombre',
              apellido = '$apellido',
              direccion = '$direccion',
              estado = '$estado',
              telefono = '$telefono',
              correo = '$correo',
              num_obras = '$num_obras',
              fecha_mod = '$fecha_mod',
              usuario_mod = '$usuario_mod',
              hora_mod = '$hora_mod',
              estatus = '$estatus' WHERE id_artistas = '$id' ";
        

            
            $consulta = $this->ejecutarsql($sql);


        //Bitacora        
        $observacion = "Se ha modificado un artista";
        $operacion = 'Modificar';
        $bitacora = new Bitacora();
        $bitacora->registro('artistas', $operacion, $observacion);
            
            
            
            $this->desconectar();
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function listar_artistas() {
        // esta funcion es para listar los estatus de artitas
        // se conecta a la base de datos 
        $this->conectar();
        // creo el sql
        $sql = "Select * from artistas  where estatus = '1'";
        // ejecuto el sql en la base de datos y me devuelve un lista de los estatus 

        $consulta = $this->ejecutarsql($sql);
        // me desconecto de la base de datos 
        $this->desconectar();
        // retorno el listado obtenido 
        return $consulta;
    }

    public function busqueda_art($id) {

        $this->conectar();
        $sql = "select nombre, apellido from artistas WHERE id_artistas = '$id'";
        $consulta = $this->ejecutarsql($sql);

        $consulta = mysql_fetch_array($consulta);
        return $consulta;
    }

    public function eliminar($id) {

        $this->conectar();
        //consulta de sql para eliminar
        //$sql = "DELETE FROM artistas where id_artistas = '$id'";
        
         $fecha_mod = date('Y-m-d');
            $hora_mod = date('H:i:s');
            $usuario_mod = $_SESSION['usuario'];
            
            
       $sql = "UPDATE artistas SET 
                estatus = '2',            
                fecha_mod = '$fecha_mod',
              usuario_mod = '$usuario_mod',
              hora_mod = '$hora_mod' WHERE id_artistas = '$id' ";
        
        $consulta = $this->ejecutarsql($sql);
        
         //Bitacora
        $observacion = "Se ha Eliminado un artista";
        $operacion = 'Eliminar';
        $bitacora = new Bitacora();
        $bitacora->registro('artistas', $operacion, $observacion);
        
        
        if ($this->desconectar()) {
            return TRUE;
        } else {
            return FALSE;
        }
     
    }
    
    
    
      public function ultimo() {

        $this->conectar();
        $sql = "Select id_artistas from artistas ORDER BY id_artistas DESC LIMIT 1";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();
        $consulta = mysql_fetch_array($consulta);
        $id = $consulta['id_artistas'];
        return $id;
    }
    
     public function detalle2($id) {

        $this->conectar();
        $sql = "select * from artistas WHERE id_artistas = '$id'";
        $consulta = $this->ejecutarsql($sql);

        $consulta = mysql_fetch_array($consulta);
        return $consulta;
    }

}

?>
