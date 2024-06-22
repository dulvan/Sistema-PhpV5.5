<?php
error_reporting(0);
session_start();
// inicia la session_star para poder verificar si estan logueados o no
//incluyo todos los modelos llamados en el index.php
include '../model/index.php';

//si hay una session $_SESSION['usuario'] me mantengo en la pagina y si no hay una session redirecciono al login
if ($_SESSION['usuario'] == '') {
    header("Location: index.php");
}


//creo una variable del model/Artista
$registrar = new Artista();


//Defino la variable 'editar' la cual me indica si estoy editando o registarndo en la pantalla
//en caso de decir 'no' el formulario actua como si estuviera registrando a un artista nuevo
//en caso de decir 'si' el formulario actua como si estuviera modificando a un artista
$editar = 'no';

//valido si estoy recibiendo por URL GET el id del artista
// si lo recibo sgnifica que editar el artista
if (isset($_GET['id'])) {
    //asigno el id a una variable
    $id = $_GET['id'];
    //consulto los datos de ese artista
    $consulta = $registrar->ver_artista($id);
    //convierto en array el resultado obtenido
    $consulta = mysql_fetch_array($consulta);
    //indico que editar esta en si para poder editar
    $editar = 'si';

    //el resultado obtenido en la consulta se lo 
    //asigno a las variables que indican los valores en las vistas
    $tp_cedula = $consulta['tp_cedula'];
    $num_cedula = $consulta['num_cedula'];
    $nombre = $consulta['nombre'];
    $apellido = $consulta['apellido'];
    $direccion = $consulta['direccion'];
    $estado = $consulta['estado'];
    $telefono = $consulta['telefono'];
    $correo = $consulta['correo'];
    $num_obras = $consulta['num_obras'];
    $estatus = $consulta['estatus'];
}

//si se envia el formulario presionando el boton enviar
//se recibiran los campos del formulario por Post
if (isset($_POST['guardar'])) {

    //Asigno los valores a las variables
    //function strtolower para colocar todo en minuscula
    $tp_cedula = $_POST['tp_cedula'];
    $num_cedula = $_POST['num_cedula'];
    $nombre = strtolower($_POST['nombre']);
    $apellido = strtolower($_POST['apellido']);
    $direccion = strtolower($_POST['direccion']);
    $estado = $_POST['estado'];
    $telefono = $_POST['telefono'];
    $correo = strtolower($_POST['correo']);
    $num_obras = $_POST['num_obras'];
    $estatus = $_POST['estatus'];


    //en el caso de que la variable editar este en 'si'
    //se procede a utilizar la funcion editar para modificar 
    //el registro del artista ya existente
    //en la funcion se pasa el valor del ID
    if ($editar == 'si') {
		
        	$editar_artista = $registrar->editar($tp_cedula, $num_cedula, $nombre, $apellido, $direccion, $estado, $telefono, $correo, $num_obras, $estatus, $id);
		
        //si se guardo correctamente se redirecciona a la consulta principal
        if ($editar_artista) {

            header("Location: mensaje.php?msj=editarartista");
        }
    } else {
        //en el caso de que sea 'no' el valor de la varable editar se registrara un nuevo artista

        $registrar_artista = $registrar->registro($tp_cedula, $num_cedula, $nombre, $apellido, $direccion, $estado, $telefono, $correo, $num_obras, $estatus);

        if ($registrar_artista) {
            //si se guardo correctamente se redirecciona a la consulta principal
             header("Location: mensaje.php?msj=nuevoartista");
        }
    }
}

//creo una clase model/Estados
$estados = new Estados();
//Consulto el listado de estados
$lista_estados = $estados->listado();

//creo una clase model/EstadosArtista
$estatu = new ListaEstatusArtistas();
//Consulto el listado de estatus de artistas
$listado_estatus = $estatu->listar_estatus();

//se indica que vista se mostrara en la pantalla
$ruta = '../views/artista/registrar.php';

//se incluye la plantilla
include '../web/layout/index.php';


?>