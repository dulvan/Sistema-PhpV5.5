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


//creo una variable del model/Obras
$registrar = new Obras();

//Defino la variable 'editar' la cual me indica si estoy editando o registarndo en la pantalla
//en caso de decir 'no' el formulario actua como si estuviera registrando a una obra nuevo
//en caso de decir 'si' el formulario actua como si estuviera modificando a una obra
$editar = 'no';

//valido si estoy recibiendo por URL GET el id de la obra
// si lo recibo sgnifica que editar la obra
if (isset($_GET['id'])) {
    //asigno el id a una variable
    $id = $_GET['id'];
    //consulto los datos de esa obra
    $obra = $registrar->detalle_obra($id);
    //convierto en array el resultado obtenido
    $obra = mysql_fetch_array($obra);
    //indico que editar esta en si para poder editar
    $editar = 'si';

    //el resultado obtenido en la consulta se lo 
    //asigno a las variables que indican los valores en las vistas
    $titulo = $obra['titulo'];
    $tecnica = $obra['tecnica'];
    $dimensiones = $obra['dimensiones'];
    $valor = $obra['valor'];
    $para_la_venta = $obra['para_la_venta'];
    $observaciones = $obra['observaciones'];
    $estatus = $obra['estatus'];
    $id_artistas = $obra['id_artistas'];
    $codigo_una = $obra['codigo_una'];
    $fecha_obra = $obra['fecha_obra'];
    $foto = $obra['foto'];
}

//si se envia el formulario presionando el boton enviar
//se recibiran los campos del formulario por Post
if (isset($_POST['guardar'])) {
    //Asigno los valores a las variables
    $titulo = $_POST['titulo'];
    $tecnica = $_POST['tecnica'];
    $dimensiones = $_POST['dimensiones'];
    $valor = $_POST['valor'];
    $para_la_venta = @$_POST['para_la_venta'];
    $observaciones = $_POST['observaciones'];
    $estatus = $_POST['estatus'];
    $id_artistas = $_POST['id_artistas'];
    $codigo_una = $_POST['codigo_una'];
   $fecha_obra = Ajustefechaguardar($_POST['fecha_obra']);


    //Proceso de Subir la imagen de la obra
    if (@$_FILES['foto']['name'] != '') {
        if ($_FILES['foto']['type'] == "image/jpeg") {
            if ($_FILES['foto']['size'] <= 5000000) {
                $nombre_foto = Date('Y-m-d_H_i_s') . '_' . $_FILES['foto']['name'];
                $ruta = '../obras_fotos/';
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta . $nombre_foto)) {
                    $guardar = 'si';
                }
            } else {
                $registrar->foto = "Debe ser menor a : 5MB";
            }
        } else {
            $registrar->foto = "Debe ser formato: JPG";
        }
    } else {
        if ($editar == 'si') {
            //si la foto se edita y no se carga una nueva se matiene la anterior
            $nombre_foto = $foto;
            $guardar = 'si';
        }
    }


    //en el caso de que la variable editar este en 'si'
    //se procede a utilizar la funcion editar para modificar 
    //el registro de la obra ya existente
    //en la funcion se pasa el valor del ID
    if ($guardar == 'si') {
        if ($editar == 'si') {
			
           		$registrar->modificar($titulo, $tecnica, $dimensiones, $valor, $para_la_venta, $observaciones, $estatus, $id_artistas, $codigo_una, $fecha_obra, $id, $nombre_foto);
	 //si se guardo correctamente se redirecciona a la consulta principal
               header("Location: mensaje.php?msj=editarobra");
        } else {
            //en el caso de que sea 'no' el valor de la varable editar se registrara una nueva obra
            if ($registrar->registro($titulo, $tecnica, $dimensiones, $valor, $para_la_venta, $observaciones, $estatus, $id_artistas, $codigo_una, $fecha_obra, $nombre_foto)) {
                //si se guardo correctamente se redirecciona a la consulta principal
                 header("Location: mensaje.php?msj=nuevoobra");
            }
        }
    }
}
//Consulto el listado de estatus de obras
$estatu = new ListaEstatusObra();

$lista_estatus = $estatu->listar_estatus();


//Consulto el listado de aristas
$artis = new Artista();

$listado_artistas = $artis->listar_artistas();


//se indica que vista se mostrara en la pantalla
$ruta = '../views/obras/registrar.php';
//se incluye la plantilla
include '../web/layout/index.php';
?>
