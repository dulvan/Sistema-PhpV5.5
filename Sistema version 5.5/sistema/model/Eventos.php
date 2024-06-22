<?php

class Eventos extends BDculturaconexion {

    public function registrar_eventos($nombre, $lugar, $estado, $usuario_encargado, $descripcion, $fecha_evento_inicio, $fecha_evento_fin, $hora_inicio, $hora_fin, $imagen_evento, $estatus) {

        $fecha_reg = date('Y-m-d');
        $hora_reg = date('H:i:s');
        $user_reg = $_SESSION['usuario'];

//me conecto
        $this->conectar();
//creo el sql para insertar
        $sql = "INSERT INTO eventos
              (
              nombre,
              lugar,
              estado,
              usuario_encargado,
              descripcion,
              fecha_evento_inicio,
              fecha_evento_fin,
              hora_inicio, 
              hora_fin, 
              imagen_evento,
              estatus,
              fecha_reg,
              hora_reg,
              user_reg              
)
VALUES (
    '$nombre',
    '$lugar',
    '$estado',
    '$usuario_encargado',
    '$descripcion',
    '$fecha_evento_inicio',
    '$fecha_evento_fin',
    '$hora_inicio',
    '$hora_fin',
    '$imagen_evento',
    '$estatus',
    '$fecha_reg',
    '$hora_reg',
    '$user_reg')
             
         ";
//ejecuto el sql
        if ($consulta = $this->ejecutarsql($sql)) {


            //Bitacora
            $observacion = "Se ha registrado un Evento";
            $operacion = 'Registrar';
            $bitacora = new Bitacora();
            $bitacora->registro('eventos', $operacion, $observacion);

            $this->desconectar();
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function listar_eventos() {
        // esta funcion es para listar los estatus de artitas
        // se conecta a la base de datos 
        $this->conectar();
        // creo el sql
        $sql = "Select * from eventos";
        // ejecuto el sql en la base de datos y me devuelve un lista de los estatus 

        $consulta = $this->ejecutarsql($sql);
        // me desconecto de la base de datos 
        $this->desconectar();
        // retorno el listado obtenido 
        return $consulta;
    }

    public function detalle_evento($id) {
        //me conecto a la base de datos
        $this->conectar();
        //consulta de sql para buscar una obra en particular
        $sql = "select * from eventos WHERE id_eventos = '$id'";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();
        return $consulta;
    }

    public function consulta_eventos() {
        //me conecto a la base de datos
        $this->conectar();
        //consulta de sql para buscar un evento

        $sql = "select * from eventos";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();
        return $consulta;
    }

    public function ultimo_registro() {
        //me conecto a la base de datos
        $this->conectar();
        //consulta de sql para buscar un evento

        $sql = "select id_eventos from eventos ORDER BY id_eventos DESC limit 1";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();
        return $consulta;
    }

    public function eliminar($id) {

        $fecha_mod = date('Y-m-d');
        $hora_mod = date('H:i:s');
        $usuario_mod = $_SESSION['usuario'];
        $this->conectar();
        //consulta de sql para eliminar
      $sql = "UPDATE eventos SET  estatus = '2',            
                fecha_mod = '$fecha_mod',
              user_mod = '$usuario_mod',
              hora_mod = '$hora_mod' where id_eventos = '$id'";
        $consulta = $this->ejecutarsql($sql);

        //Bitacora
        $observacion = "Se ha Eliminado un Evento";
        $operacion = 'Eliminar';
        $bitacora = new Bitacora();
        $bitacora->registro('eventos', $operacion, $observacion);

        if ($this->desconectar()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function editar_eventos($nombre, $lugar, $estado, $usuario_encargado, $descripcion, $fecha_evento_inicio, $fecha_evento_fin, $hora_inicio, $hora_fin, $imagen_evento, $estatus, $id) {

        $fecha_mod = date('Y-m-d');
        $hora_mod = date('H:i:s');
        $user_mod = $_SESSION['usuario'];

//me conecto
        $this->conectar();
//creo el sql para insertar
        $sql = "UPDATE eventos SET
   nombre = '$nombre',
  lugar = '$lugar',
  estado = '$estado',
   usuario_encargado = '$usuario_encargado',
   descripcion = '$descripcion',
   fecha_evento_inicio = '$fecha_evento_inicio',
   fecha_evento_fin = '$fecha_evento_fin',
   hora_inicio = '$hora_inicio',
   hora_fin = '$hora_fin',
   imagen_evento = '$imagen_evento',
    estatus = '$estatus',
   fecha_mod = '$fecha_mod',
   hora_mod = '$hora_mod',
   user_mod = '$user_mod'   
       WHERE id_eventos = '$id'
         ";
//ejecuto el sql



        if ($this->ejecutarsql($sql)) {


            $observacion = "Se ha modificado un evento";
            $operacion = 'Modificar';
            $bitacora = new Bitacora();
            $bitacora->registro('eventos', $operacion, $observacion);

            $this->desconectar();
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function ultimo() {

        $this->conectar();
        $sql = "Select id_eventos from eventos ORDER BY id_eventos DESC LIMIT 1";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();
        $consulta = mysql_fetch_array($consulta);
        $id = $consulta['id_eventos'];
        return $id;
    }

    public function detalle2($id) {

        $this->conectar();
        $sql = "select * from eventos WHERE id_eventos = '$id'";
        $consulta = $this->ejecutarsql($sql);

        $consulta = mysql_fetch_array($consulta);
        return $consulta;
    }

}

?>
