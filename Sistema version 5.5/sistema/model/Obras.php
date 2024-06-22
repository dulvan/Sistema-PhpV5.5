<?php

class Obras extends BDculturaconexion {

    //variable de las obras
    public $titulo;
    public $tecnica;
    public $dimensiones;
    public $valor;
    public $para_la_venta;
    public $observaciones;
    public $estatus;
    public $id_artistas;
    public $codigo_una;
    public $fecha_obra;
    public $foto;

    //function para validar que los campos no sean vacios
    public function validar($titulo, $tecnica, $dimensiones, $valor, $para_la_venta, $observaciones, $estatus, $id_artistas, $codigo_una, $fecha_obra) {

        //valido que cada campo no sea vacio
        if ($titulo == '') {
            $this->titulo = 'No puede ser vacio';
        }
        if ($tecnica == '') {
            $this->tecnica = 'No puede ser vacio';
        }
        if ($dimensiones == '') {
            $this->dimensiones = 'No puede ser vacio';
        }
        if ($valor == '') {
            $this->valor = 'No puede ser vacio';
        }

        if ($estatus == '') {
            $this->estatus = 'No puede ser vacio';
        }
        if ($id_artistas == '') {
            $this->id_artistas = 'No puede ser vacio';
        }
        if ($codigo_una == '') {
            $this->codigo_una = 'No puede ser vacio';
        }
        if ($fecha_obra == '') {
            $this->fecha_obra = 'No puede ser vacio';
        }

        //si no hubo errores en las validaciones anteriores devuelve true
        if ($this->titulo == '' AND $this->tecnica == '' AND $this->dimensiones == '' AND $this->valor == '' AND $this->para_la_venta == '' AND $this->estatus == '' AND $this->id_artistas == '' AND $this->codigo_una == '' AND $this->fecha_obra == '') {

            return true;
        } else {
            return false;
        }
    }

    //function para registrar obras, los parametros que le pasan son las variables del formulario
    public function registro($titulo, $tecnica, $dimensiones, $valor, $para_la_venta, $observaciones, $estatus, $id_artistas, $codigo_una, $fecha_obra, $nombre_foto) {

        //valido que los campos no esten vacios
        if ($this->validar($titulo, $tecnica, $dimensiones, $valor, $para_la_venta, $observaciones, $estatus, $id_artistas, $codigo_una, $fecha_obra)) {

            //fecha, hora y usuario que registran la obra
            $fecha_reg = date('Y-m-d');
            $hora_reg = date('H:i:s');
            $usuario_reg = $_SESSION['usuario'];

            $this->conectar();
            //creo el sql para insertar
            $sql = "INSERT INTO obras 
                (
                titulo, 
                tecnica, 
                dimensiones, 
                valor, 
                para_la_venta, 
                observaciones, 
                estatus, 
                id_artistas, 
                codigo_una, 
                fecha_obra, 
                
                fecha_reg,
              usuario_reg,
              hora_reg, foto ) 
            VALUES (
            '$titulo', 
                '$tecnica',
                '$dimensiones', 
                '$valor', 
                '$para_la_venta', 
                '$observaciones', 
                '$estatus',
                '$id_artistas', 
                '$codigo_una', 
                '$fecha_obra', 
                
                '$fecha_reg',
              '$usuario_reg',
              '$hora_reg','$nombre_foto') ";
            //EJECUTO EL SQL
            $consulta = $this->ejecutarsql($sql);


           
            $observacion = "Se ha registrado una obra nueva";
            $operacion = 'Registrar';
            $bitacora = new Bitacora();
            $bitacora->registro('obras', $operacion, $observacion);



            $this->desconectar();
            return TRUE;
        } else {

            return FALSE;
        }
    }

    public function modificar($titulo, $tecnica, $dimensiones, $valor, $para_la_venta, $observaciones, $estatus, $id_artistas, $codigo_una, $fecha_obra, $id, $nombre_foto) {
        if ($this->validar($titulo, $tecnica, $dimensiones, $valor, $para_la_venta, $observaciones, $estatus, $id_artistas, $codigo_una, $fecha_obra)) {

            //fecha, hora y usuario que modifica la obra
            $fecha_mod = date('Y-m-d');
            $hora_mod = date('H:i:s');
            $usuario_mod = $_SESSION['usuario'];

            //me conecto
            $this->conectar();
            //creo el sql para modificar la obra donde el id es el id de la obra
            $sql = "UPDATE obras SET 
                titulo = '$titulo', 
                tecnica = '$tecnica', 
                dimensiones = '$dimensiones', 
                valor = '$valor', 
                para_la_venta = '$para_la_venta', 
                observaciones = '$observaciones', 
                estatus = '$estatus', 
                id_artistas = '$id_artistas', 
                codigo_una = '$codigo_una', 
                fecha_obra = '$fecha_obra',                 
                fecha_mod = '$fecha_mod',
              usuario_mod = '$usuario_mod',
                  foto = '$nombre_foto',
              hora_mod = '$hora_mod' WHERE id_obras = '$id' ";

           

            $consulta = $this->ejecutarsql($sql);

            
            $observacion = "Se ha modificado una obra";
            $operacion = 'Modificar';
            $bitacora = new Bitacora();
            $bitacora->registro('obras', $operacion, $observacion);


            $this->desconectar();

            return TRUE;
        } else {

            return FALSE;
        }
    }

    //sql para eliminar obra
//	public function eliminar($titulo, $tecnica, $dimensiones, $valor, $para_la_venta, $observaciones, $estatus, $id_artistas, $codigo_una, $fecha_obra, $id, $nombre_foto) {
//        if ($this->validar($titulo, $tecnica, $dimensiones, $valor, $para_la_venta, $observaciones, $estatus, $id_artistas, $codigo_una, $fecha_obra)) {
//
//            //fecha, hora y usuario que modifica la obra
//            $fecha_mod = date('Y-m-d');
//            $hora_mod = date('H:i:s');
//            $usuario_mod = $_SESSION['usuario'];
//
//            //me conecto
//            $this->conectar();
//            //creo el sql para modificar la obra donde el id es el id de la obra
//           $sql = "DELETE FROM obras 
//		   			WHERE id_obras = '$id' ";
//
//$consulta = $this->ejecutarsql($sql);
//            $this->desconectar();
//
//            return TRUE;
//        } else {
//
//            return FALSE;
//        }
//    }
    //consulta de el listado de obras registradas en la base de datos para
    //mostrar en la consulta de listado de obras
     public function consulta_obras() {

        $this->conectar();
        //consulta de sql para buscar obrasy listarlas
         if ($_SESSION['tipo'] == 'admin') {
        $sql = "select * from obras where estatus = '1'";
         }
         else {
          $sql = "select * from obras o
            INNER JOIN artistas a ON (o.id_artistas = a.id_artistas)            
        where a.estatus = '1'";   
         }
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();
        return $consulta;
    }

    //consulta los datos especificos de una obra para mostrarlos en el detalle
    //le paso el parametro $id que es el id de la obra
    public function detalle_obra($id) {
        //me conecto a la base de datos
        $this->conectar();
        //consulta de sql para buscar una obra en particular
        $sql = "select * from obras WHERE id_obras = '$id'";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();
        return $consulta;
    }

    public function obras_artistas($id) {

        $this->conectar();
        //consulta de sql para buscar obrasy listarlas
        $sql = "select * from obras where id_artistas = '$id' AND estatus = '1'";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();
        return $consulta;
    }

 public function eliminar($id) {

        $this->conectar();
        //consulta de sql para buscar obrasy listarlas
        //$sql = "DELETE FROM obras where id_obras = '$id'";
            //fecha, hora y usuario que modifica la obra
            $fecha_mod = date('Y-m-d');
            $hora_mod = date('H:i:s');
            $usuario_mod = $_SESSION['usuario'];
            
            
       $sql = "UPDATE obras SET 
                estatus = '2',            
                fecha_mod = '$fecha_mod',
              usuario_mod = '$usuario_mod',
              hora_mod = '$hora_mod' WHERE id_obras = '$id' ";

        $consulta = $this->ejecutarsql($sql);
          //Bitacora
        $observacion = "Se ha Eliminado una Obra";
        $operacion = 'Eliminar';
        $bitacora = new Bitacora();
        $bitacora->registro('obras', $operacion, $observacion);
        $this->desconectar();
        return TRUE;
    }

    public function ultimo() {

        $this->conectar();
        $sql = "Select id_obras from obras ORDER BY id_obras DESC LIMIT 1";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();
        $consulta = mysql_fetch_array($consulta);
        $id = $consulta['id_obras'];
        return $id;
    }

    public function detalle2($id) {

        $this->conectar();
        $sql = "select * from obras WHERE id_obras = '$id'";
        $consulta = $this->ejecutarsql($sql);

        $consulta = mysql_fetch_array($consulta);
        return $consulta;
    }

}

?>
