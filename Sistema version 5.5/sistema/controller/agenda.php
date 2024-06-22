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

if(isset($_POST['buscar'])){
    
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];
    
    header('Location: agenda.php?mes='.$mes.'&'.'anio='.$anio);
}

if(isset($_GET['mes']) AND isset($_GET['anio'])){
 $fecha =  $_GET['anio'].'-'.$_GET['mes'].'-01';
}
else {
   //definimos la fecha actual año mes dia
$fecha = date("Y-m-d"); 
}

//dividimos la fecha por guiones
$fecha_dividida = explode('-', $fecha);
//el array $fecha_dividida tienes 0 año, 1 mes y 2 dia

//definimos el primer dia
$primer_dia = '01';
//calculamos el ultimo dia segun el mes
$ultimo_dia = calcular_dias_del_mes($fecha_dividida[1], $fecha_dividida[0]);

  /* Calcular los dias que tiene cualquier mes, cualquier año */
    function calcular_dias_del_mes($month, $year) {
        $days = null;
        if ($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12)
            $days = 31;
        elseif ($month == 4 || $month == 6 || $month == 9 || $month == 11)
            $days = 30;
        else if ($month == 2) {
            if (esBisiesto($year))
                $days = 29;
            else
                $days = 28;
        }
        return $days;
    }

    /* Calcula si el año es bisiesto */

    function esBisiesto($Year) {
        if ((($Year % 4) == 0) && (($Year % 100) != 0) || (($Year % 400) == 0))
            return true;
        else
            return false;
    }
    
    
        /* Funcion principal que genera todo el Calendario de Mes y utiliza las funciones de abajo */

    function getCalendario($eventos, $date = null) {
        if (is_null($date)) {
            $fecha = explode('-', date('Y-m-d'));
        } else {
            $fecha = explode('-', $date);
        }
        $month = $fecha [1];
        $year = $fecha [0];

        $fila = 0;
        $filas = 6;
        if (!esBisiesto($year)) {
            if ($month == 2) {
                $d = getdate(strtotime($year . '-2-1'));
                if ($d ['wday'] == 0) {
                    $filas--;
                }
            }
        }

        $primerDiaMes = getPrimerDia($year, $month);
        //dias de la semana
        $HTML = '<table width="100%" cellpadding="0" cellspacing="0" class="calendar table-bordered"><tr>
			<td class="calendar-day-head"><strong>Domingo</strong></td>
			<td class="calendar-day-head"><strong>Lunes</strong></td>
			<td class="calendar-day-head"><strong>Martes</strong></td>
			<td class="calendar-day-head"><strong>Miercoles</strong></td>
			<td class="calendar-day-head"><strong>Jueves</strong></td>
			<td class="calendar-day-head"><strong>Viernes</strong></td>
			<td class="calendar-day-head"><strong>Sabado</strong></td>
					</tr>';
        //obtiene cuantos dias tiene el mes
        $CantDias = calcular_dias_del_mes($month, $year);
        $DiaActual = 1;
        while ($fila < $filas) {
            $HTML .= '<tr class="calendar-row">';
            for ($i = 0; $i < 7; $i++) {
                if (($fila == 0 && $i < $primerDiaMes) || ($DiaActual > $CantDias)) {
                    $HTML .= '<td></td>';
                } else {
                    if ($DiaActual == $fecha [2]) {
                        $HTML .= setDia($DiaActual, isset($eventos [$DiaActual]) ? $eventos [$DiaActual] : null, true, $year, $month);
                        //$HTML .= '<td><span style="color:red;">'.$DiaActual.'</span></td>';
                    } else {
                        $HTML .= setDia($DiaActual, isset($eventos [$DiaActual]) ? $eventos [$DiaActual] : null, false, $year, $month);
                        //$HTML .= '<td>'.$DiaActual.'</td>';
                    }
                    $DiaActual++;
                }
            }
            $HTML .= '</tr>';
            $fila++;
        }

        return $HTML . '</table>';
    }
        
    //primer dia del mes
        function getPrimerDia($year, $month) {
        $d = getdate(strtotime($year . '-' . $month . '-1'));
        return $d ['wday'];
    }
    
        //calcula actividades del dia
        function setDia($dia, $eventos, $esHoy = false, $anio, $mes) {
        $ev = '';
        if ($esHoy) {
            
        } else {
            
        }
        if (!is_null($eventos)) {
            $nombre = 'Nombre';
            $gestion = 'Gestion';
            $tipo = 'Tipo';
            $estatus = 'Estatus';

            if ($dia >= 1 AND $dia <= 9) {
                $d = '0' . $dia;
            } else {
                $d = $dia;
            }
            $fecha_num_dia = $anio . '-' . $mes . '-' . $d;
            $fecha_num_dia = date('w', strtotime($fecha_num_dia));
            if ($fecha_num_dia >= 0 AND $fecha_num_dia <= 4) {
                $lado = 'right';
            } else {
                $lado = 'left';
            }

            //print_r($eventos);
            $cant = count($eventos);
            
            $count = 1;
            while($count <= $cant) {
                $ev .= "<div class='calendar-lista_act_items' ><table width='100%' border='1' >
                <tr><td class='ui-state-hover'>{$eventos[$count]['nombre']}</td>
                        
                    <td width='10px'><a href='detalle_evento.php?id={$eventos[$count]['id_eventos']}&p=a' ><img src='../web/image/veragenda.png' width='20px' /></a></td>
                        </tr>
                </table></div>";
                $count++;
            }
        }

        $html = "<td  class='calendar-day' ><div class='calendar-day-number' >$dia</div><div class='calendar-lista_act' >" . $ev . '</div></td>';

        return $html;
    }
    
    
    
    $clase_eventos = new Eventos();
    
    $listado_eventos = $clase_eventos->consulta_eventos();
    
    

    //se indica que vista se mostrara en la pantalla
$ruta = '../views/agenda/index.php';

//se incluye la plantilla
include '../web/layout/index.php';
    
    
?>
