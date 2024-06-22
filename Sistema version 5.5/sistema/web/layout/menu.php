
<?php if (isset($_SESSION['usuario'])) { ?>
    <!-- Incluimos JS Y CSS del menu vertical -->
    <script src="../web/js/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    <link href="../web/css/SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight: "SpryAssets/SpryMenuBarRightHover.gif"});
    </script>
    <ul id="MenuBar1" class="MenuBarVertical">
        <li><a href="index.php">
                <div style="margin-bottom: 40px;">
                    <img src="../web/image/home.png" width="48px" height="48px" style="float: left" />
                    <p  style="float: left; margin-top: 10px;" >Inicio</p>            
                </div>
            </a>

        </li>
        
        <?php if ($_SESSION['tipo'] == 'admin') { ?>
        <li><a href="consulta_usuarios.php">
                <div style="margin-bottom: 40px;">
                    <img src="../web/image/home.png" width="48px" height="48px" style="float: left" />
                    <p  style="float: left; margin-top: 10px;" >Usuarios</p>            
                </div>
            </a>

        </li>
          <?php } ?>
        
           <?php if ($_SESSION['tipo'] == 'admin') { ?>
        <li><a href="bitacora.php">
                <div style="margin-bottom: 40px;">
                    <img src="../web/image/home.png" width="48px" height="48px" style="float: left" />
                    <p  style="float: left; margin-top: 10px;" >Bitacora</p>            
                </div>
            </a>

        </li>
          <?php } ?>

        <li><a href="consulta_artista.php">            
                <div style="margin-bottom: 40px;">
                    <img src="../web/image/artista.png" width="48px" height="48px" style="float: left" />
                    <p  style="float: left; margin-top: 10px;" >Artistas</p>            
                </div></a></li>
        <li><a href="consulta_obras.php"><div style="margin-bottom: 40px;">
                    <img src="../web/image/obras.png" width="48px" height="48px" style="float: left" />
                    <p  style="float: left; margin-top: 10px;" >Obras</p>            
                </div></a></li>

        <li><a href="consulta_evento.php">
                <div style="margin-bottom: 40px;">
                    <img src="../web/image/evento.png" width="48px" height="48px" style="float: left" />
                    <p  style="float: left; margin-top: 10px;" >Eventos</p>            
                </div></a>
        </li>

                <li><a href="agenda.php">
                <div style="margin-bottom: 40px;">
                    <img src="../web/image/calendario.png" width="48x" height="48px" style="float: left" />
                    <p  style="float: left; margin-top: 10px;" >Calendario</p>            
                </div></a>
        </li> 
        
                   <li><a href="cambioclave.php">
                <div style="margin-bottom: 40px;">
                    <img src="../web/image/calendario.png" width="48x" height="48px" style="float: left" />
                    <p  style="float: left; margin-top: 10px;" >Contraseña</p>            
                </div></a>
        </li> 
        
        <li><a href="salir.php">
                <div style="margin-bottom: 40px;">
                    <img src="../web/image/salida.png" width="40px" height="40px" style="float: left" />
                    <p  style="float: left; margin-top: 10px;" >Salir</p>            
                </div></a>
        </li> 
    </ul>


<?php } ?>