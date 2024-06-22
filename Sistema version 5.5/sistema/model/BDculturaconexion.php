<?php

//Nombre de la Clase para llamar a las conexiones y consultas de la base de datos
class BDculturaconexion {

    //Variable para definir las conexion
    private $conexion;

    //esta es para conectarse a la base de datos 
    public function conectar() {
        //si la variable de conexion es vacia se crea la conexion
        if (!isset($this->conexion)) {
            //me conecto a la base de datos con mysql_connect
            $this->conexion = (mysql_connect("localhost", "root", "12345678")) or die(mysql_error()); //mysql_error() muestra el error
            //selecciono la base de datos q me voy a conectar
            mysql_select_db("bdcultura", $this->conexion) or die(mysql_error());
        }
    }
// es para ejecutar en la base de datos las consultas, insertar modificar y eliminar 
    public function ejecutarsql($sql) {
        //la variable $sql contiene la consulta que se ejecutara
        //mysql_query ejecuta la conexion
        $resultado = mysql_query($sql, $this->conexion);
        
        if (!$resultado) {
            echo 'MYSQL Error:' . myql_error();
            exit;
        }
        return $resultado;
    }
//cuenta cuantas filas trajo las consultas 
    public function contar($resultado) {
        if (!is_resource($resultado))
            return false;
        //devuelve el numero de registros
        return mysql_num_rows($resultado);
    }
//convierte la consulta en un array para poder recorrerlo
    public function listar($resultado) {
        //si no se encontro nada devuelve vacio
        if (!is_resource($resultado))
            return false;
        //si se encontro algo devuelve la lista de registros
        return mysql_fetch_array($resultado);
    }
// cierra la conexion con la base de datos
    public function desconectar() {

        mysql_close();
    }
    

}
?>
