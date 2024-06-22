<form id="form1" name="form1" method="post" >
<table style="background-color: #fff;width: 30%; float: right;" >
    <tr>
        <td></td>
        <td>Mes</td>
        <td>
            <select name="mes" id="mes">
                <option value="">Seleccione</option>
                <option <?php if($fecha_dividida[1] == '01') { echo 'Selected'; } ?> value="01">Enero</option>
                <option <?php if($fecha_dividida[1] == '02') { echo 'Selected'; } ?> value="02">Febrero</option>
                <option <?php if($fecha_dividida[1] == '03') { echo 'Selected'; } ?> value="03">Marzo</option>
                <option <?php if($fecha_dividida[1] == '04') { echo 'Selected'; } ?> value="04">Abril</option>
                <option <?php if($fecha_dividida[1] == '05') { echo 'Selected'; } ?> value="05">Mayo</option>
                <option <?php if($fecha_dividida[1] == '06') { echo 'Selected'; } ?> value="06">Junio</option>
                <option <?php if($fecha_dividida[1] == '07') { echo 'Selected'; } ?> value="07">Julio</option>
                <option <?php if($fecha_dividida[1] == '08') { echo 'Selected'; } ?> value="08">Agosto</option>
                <option <?php if($fecha_dividida[1] == '09') { echo 'Selected'; } ?> value="9">Septiembre</option>
                <option <?php if($fecha_dividida[1] == '10') { echo 'Selected'; } ?> value="10">Octubre</option>
                <option <?php if($fecha_dividida[1] == '11') { echo 'Selected'; } ?> value="11">Noviembre</option>
                <option <?php if($fecha_dividida[1] == '12') { echo 'Selected'; } ?> value="12">Diciembre</option>
            </select>
            <script type="text/javascript">
                    var mes = new LiveValidation('mes');
                    mes.add(Validate.Presence);
                </script>
        </td>
        <td>Año</td>
        <td><select name="anio" id="anio">
                <option  value="">Seleccione</option>
                <option  <?php if($fecha_dividida[0] == '2012') { echo 'Selected'; } ?>  value="2012">2012</option>
                <option  <?php if($fecha_dividida[0] == '2013') { echo 'Selected'; } ?>  value="2013">2013</option>
                <option  <?php if($fecha_dividida[0] == '2014') { echo 'Selected'; } ?>  value="2014">2014</option>
            </select>
        <script type="text/javascript">
                    var anio = new LiveValidation('anio');
                    anio.add(Validate.Presence);
                </script>
        </td>
        <td>   <input type="submit" name="buscar" id="buscar" value="Buscar" /></td>
    </tr></table>
</form>
<link rel="stylesheet" type="text/css" href="../web/css/calendar_mes.css" />

<?php
$i = 1;

$listado = array();

//ordeno los eventos por dia
while ($registro = mysql_fetch_array($listado_eventos)) {

    $listado[$i]['fecha_evento_inicio'] = $registro['fecha_evento_inicio'];
    $listado[$i]['fecha_evento_fin'] = $registro['fecha_evento_fin'];
    $listado[$i]['id_eventos'] = $registro['id_eventos'];
    $listado[$i]['nombre'] = $registro['nombre'];


    $i++;
}
//primer dia
$inicio = intval($primer_dia);
//ultimo dia del mes
$fin = $ultimo_dia;

$cant_eventos = count($listado);


$eventos_por_dia = array();

while ($inicio <= $fin) {

    if ($inicio < 10) {
        $inicio = '0' . $inicio;
    }
    $cont = 1;
    $conta2 = 1;
    while ($cont <= $cant_eventos) {


        $fecha_actual = $fecha_dividida[0] . '-' . $fecha_dividida[1] . '-' . $inicio;
        $fecha_dividida_inicio = explode('-', $listado[$cont]['fecha_evento_inicio']);
        $fecha_dividida_fin = explode('-', $listado[$cont]['fecha_evento_fin']);

        $fecha_inicio_seg = intval(mktime(0, 0, 0, $fecha_dividida_inicio[1], $fecha_dividida_inicio[2], $fecha_dividida_inicio[0]));
        $fecha_fin_seg = intval(mktime(0, 0, 0, $fecha_dividida_fin[1], $fecha_dividida_fin[2], $fecha_dividida_fin[0]));
        $fecha_actual_seg = intval(mktime(0, 0, 0, $fecha_dividida[1], $inicio, $fecha_dividida[0]));

        if ($fecha_inicio_seg <= $fecha_actual_seg AND $fecha_actual_seg <= $fecha_fin_seg) {


            $eventos_por_dia[intval($inicio)][$conta2]['id_eventos'] = $listado[$cont]['id_eventos'];
            $eventos_por_dia[intval($inicio)][$conta2]['nombre'] = $listado[$cont]['nombre'];

            $conta2++;
        }

        $cont++;
    }

    $inicio = intval($inicio);

    $inicio++;
}

//Imprime el calendario

echo $html = getCalendario($eventos_por_dia, $fecha);
?>

<br />
<br />
<br />
<br />
<br />
<br />
