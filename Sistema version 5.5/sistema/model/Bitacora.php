<?php

class Bitacora extends BDculturaconexion {

    public function registro($tabla, $operacion, $observacion) {


        $fecha_reg = date('Y-m-d');
        $hora_reg = date('H:i:s');
        $usuario = $_SESSION['usuario'];
        $direccion_ip = $_SERVER["REMOTE_ADDR"];
       

        //me conecto
        $this->conectar();
        //creo el sql para insertar
        $sql = "INSERT INTO bitacora
            (
             usuario, 
             fecha_reg, 
             hora_reg, 
             tabla, 
             operacion, 
             observacion, direccion_ip) VALUES 
             (
             '$usuario', 
             '$fecha_reg', 
             '$hora_reg', 
             '$tabla', 
             '$operacion', 
             '$observacion','$direccion_ip')

        ";

        //ejecuto el sql
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();
        return TRUE;
    }
    
    
        public function listado() {

        //me conecto a la base datos
        $this->conectar();
        $sql = "Select * from bitacora ORDER BY fecha_reg DESC, hora_reg DESC";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();

        return $consulta;
    }
    
    
         public function detalle($id) {

        $this->conectar();
        $sql = "select * from bitacora WHERE id_bitacora = '$id'";
        $consulta = $this->ejecutarsql($sql);

        $consulta = mysql_fetch_array($consulta);
        return $consulta;
    }
    
    

}

?>
