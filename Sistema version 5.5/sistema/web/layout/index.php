<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sistema de Gestion de Obras y Artistas</title>

        <!-- Incluimos el css de la plantilla -->

        <link rel="stylesheet" type="text/css" href="../web/css/style_plantilla.css" />        

        <!-- Incluimos JS del Live Validation -->
        <script type="text/javascript" src="../web/js/validacion/livevalidation_prototype.js"></script>
        <script type="text/javascript" src="../web/js/validacion/livevalidation_standalone.js"></script>
        <!-- Incluimos CSS para el color del Live Validation -->
        <link rel="stylesheet" type="text/css" href="../web/css/colores_validacion.css" />


        <!-- Incluimos Jquery -->
        <script src="../web/js/jquery/jquery-1.9.1.js" type="text/javascript"></script>
        <script src="../web/js/jquery/jquery-ui-1.10.3.custom.js" type="text/javascript"></script>
        <script src="../web/js/jquery/date_es.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="../web/css/jquery/jquery-ui-1.10.3.custom.css" />

        <!-- Incluimos las librerias de datepicker jquery ui para el calendario -->

        <script src="../web/js/jquery/jquery.ui.core.js" type="text/javascript"></script>
        <script src="../web/js/jquery/jquery.ui.datepicker.js" type="text/javascript"></script>
        <script src="../web/js/jquery/jquery.maskedinput.js" type="text/javascript"></script>



        <script src="../web/js/letrasnumeros.js" type="text/javascript"></script>


    </head>
    <body>

        <script type="text/javascript" charset="utf-8">

            $(document).ready(function() {

                $("input:text").bind('paste', function(e) {
                    e.preventDefault();
                });
                $("textarea").bind('paste', function(e) {
                    e.preventDefault();
                });

            });
        </script>

        <div id="container" style="min-width: 900px; min-height: 580px" >
            <?php
            //Incluyo el encabezado        
            include '../web/layout/header.php';
            ?>
            <br />



            <div id="content" style="background-image: url(../web/image/fondo.JPG)">  


                <div class="splitcontentleft">

                    <?php
                    if ($datos['cambioclave'] == 's') {
                      
                    }
                    else {
                           //Incluyo el encabezado        
                            include '../web/layout/menu.php';
                    }
                    ?>   

                </div>

                <div class="splitcontentright">


<?php
//Incluyo el encabezado        
include $ruta;
?>  



                </div>

            </div>  

<?php
//Incluyo el footer     
include '../web/layout/footer.php';
?>  


        </div>


        <script type="text/javascript">

            jQuery(function($) {


                /*   $(function(){
                 //Mascara para Campos Fecha
                 jQuery('.maskfecha').mask('99/99/9999');
                 
                 });       */


                $(function() {
                    //Para escribir solo numeros 1234567890
                    $('.solonumerosespacio').validCampoFranz(' 1234567890');
                    $('.solonumeros').validCampoFranz('1234567890');
                    $('.sololetras').validCampoFranz('abcdefghijklmnñopqrstuvwxyz');
                    $('.sololetrasespacio').validCampoFranz(' abcdefghijklmnñopqrstuvwxyz');
                    $('.sololetrasynumeros').validCampoFranz('abcdefghijklmnñopqrstuvwxyz1234567890');

                });



            });
        </script>   


    </body>
</html>