<?php

class EstatusUsuario extends BDculturaconexion {
    
    
     public function consulta_estatus_usuario($id_estatus) {

        if ($id_estatus != '') {
            $id_estatus = trim($id_estatus);
            $this->conectar();
            $sql = "select * from lista_estatus_usuario where id_lista_estatus_usuario = '$id_estatus' ";
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

    
    
    
    
    
    
}

?>
