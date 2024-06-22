<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/php">

    if ( isset($pdf) ) {

    //$pdf->image("indepabis.jpg", "jpg", 40, 40, 200, 56);

    $font = Font_Metrics::get_font("verdana");;
    $size = 6;
    $color = array(0,0,0);
    $text_height = Font_Metrics::get_font_height($font, $size);

    $foot = $pdf->open_object();

    $w = $pdf->get_width();
    $h = $pdf->get_height();

    // Draw a line along the bottom
    $y = $h - $text_height - 8;
    $pdf->line(16, $y, $w - 16, $y, $color, 0.5);

    $pdf->close_object();
    $pdf->add_object($foot, "all");

    $text = "Pagina {PAGE_NUM} de {PAGE_COUNT}";  

    // Center the text
    $width = Font_Metrics::get_text_width("Page 1 of 2", $font, $size);
    $pdf->page_text($w / 2 - $width / 2, $y, $text, $font, $size, $color);

    }
</script>

<style type="text/css"  >

    @page {
        margin-right: 30px;
        margin-left: 30px;
        margin-top: 20px;
        margin-bottom: 20px;
        font-size: 9px;

    }
    .titulo{
        text-align: left;
        background-color: #D3D3D3;
        margin-left: 5px;
    }

    .contenido {
        text-align: left;
        margin-left: 5px;
    }


    table {
        font-size: 9px;
        font-family: sans-serif;
    }

    th {
        background-color: #D3D3D3;
        text-align: left;

    }


</style>

<?php
include '../../model/BDculturaconexion.php';
include '../../model/EstatusUsuario.php';
include '../../model/Login.php';
include '../../model/Artista.php';
include '../../model/Estados.php';
include '../../model/ListaEstatusArtistas.php';
include '../../model/Usuarios.php';
include '../../model/Obras.php';
include '../../model/ListaEstatusObra.php';
include '../../model/Eventos.php';
include '../../model/EventosObras.php';
include '../../model/Bitacora.php';

$bitacora = new Bitacora();
$consulta = $bitacora->listado();

function Ajustefecha($fecha) {
    if ($fecha != '') {
        $fecha = date('d/m/Y', strtotime($fecha));

        return $fecha;
    } else {
        return '';
    }
}
?>
<div align="center">

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>

            <td align="center" valign="middle"><h2>Reporte de Bitacora</h2></td>

        </tr>
    </table>
<?php $class_usuario = new Usuarios(); ?>

    <table  width="100%" cellpadding="0" cellspacing="0" border="1" class="display" id="example">

        <!-- Encabezado -->
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Direccion IP</th>
                <th>Operacion</th>
                <th>Tabla</th>
                <th>Observacion</th>

            </tr>
        </thead>

        <tbody>
            <?php
            //comienza el ciclo para mostrar el listado de artistas
            while ($lista = mysql_fetch_array($consulta)) {
                ?>
                <tr>
                    <td><?php echo $lista['id_bitacora']; ?></td>
                    <td><?php $valor_usuario = $class_usuario->detalle2($lista['usuario']);
            echo $valor_usuario['usuario'];
            ?></td>
                    <td><?php echo Ajustefecha($lista['fecha_reg']); ?></td>
                    <td><?php echo $lista['hora_reg']; ?></td>

                    <td><?php echo $lista['direccion_ip']; ?></td>
                    <td><?php echo $lista['operacion']; ?></td>
                    <td><?php echo $lista['tabla']; ?></td>
                    <td><center><?php echo $lista['observacion']; ?></center></td>

            </tr>

            <?php
        }
        ?>  
        </tbody>

    </table>



</div>