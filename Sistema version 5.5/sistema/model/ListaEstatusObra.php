<?php

class ListaEstatusObra extends BDculturaconexion {
    
    
    public function listar_estatus() {
        // esta funcion es para listar los estatus de artitas

        // se conecta a la base de datos 
        $this->conectar();
        // creo el sql
        $sql = "Select * from lista_estatus_obras";
        // ejecuto el sql en la base de datos y me devuelve un lista de los estatus 
        
        $consulta = $this->ejecutarsql($sql);
        // me desconecto de la base de datos 
        $this->desconectar();
        // retorno el listado obtenido 
        return $consulta;
    } 
    
    
    
}

    



?>
