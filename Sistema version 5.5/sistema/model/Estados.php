<?php

class Estados extends BDculturaconexion {

    //consulta el listado de estados de venezuela
    public function listado() {

        //me conecto a la base datos
        $this->conectar();
        $sql = "Select * from estados";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();
        
        return $consulta;
    }

        public function detalle($id) {

        $this->conectar();
        $sql = "select * from estados WHERE id_estados = '$id'";
        $consulta = $this->ejecutarsql($sql);

        $consulta = mysql_fetch_array($consulta);
        return $consulta;
    }
    
    
}

?>
