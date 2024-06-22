<?php

class EventosObras extends BDculturaconexion {

    public function registrar($id_evento, $id_obra, $id_artista) {

        $this->conectar();

        $sql = "INSERT INTO eventos_obras 
                 (id_eventos, id_obras, id_artistas)
                 VALUES
                 ('$id_evento','$id_obra','$id_artista')";
        $consulta = $this->ejecutarsql($sql);
        
        //Bitacora

            $id = $this->ultimo();
            $despues = $this->detalle2($id);
            $observacion = "Se ha registrado en el Evento un Artista con su Obra";
            $operacion = 'Registrar';
            $bitacora = new Bitacora();
            $bitacora->registro('eventos_obras', $operacion, $observacion);
        
        
        $this->desconectar();
        return TRUE;
    }

    public function consulta_obras_artista($id_evento) {

        $this->conectar();
        //consulta de sql para buscar obras y artistas
        $sql = "select obras.titulo, obras.id_obras, artistas.id_artistas, artistas.nombre, artistas.apellido from eventos_obras 
                            INNER JOIN artistas ON (artistas.id_artistas = eventos_obras.id_artistas)
                 INNER JOIN obras ON (obras.id_obras = eventos_obras.id_obras)
where id_eventos = '$id_evento'                  
ORDER BY artistas.nombre
                ";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();
        return $consulta;
    }
    
    
        public function ultimo() {

        $this->conectar();
        $sql = "Select id_eventos_obras from eventos_obras ORDER BY id_eventos_obras DESC LIMIT 1";
        $consulta = $this->ejecutarsql($sql);
        $this->desconectar();
        $consulta = mysql_fetch_array($consulta);
        $id = $consulta['id_eventos_obras'];
        return $id;
    }

    public function detalle2($id) {

        $this->conectar();
        $sql = "select * from eventos_obras WHERE id_eventos_obras = '$id'";
        $consulta = $this->ejecutarsql($sql);

        $consulta = mysql_fetch_array($consulta);
        return $consulta;
    }

}
?>
