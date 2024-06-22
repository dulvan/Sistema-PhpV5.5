<div id="header">

    <div style="width: 20%; float: left">
        <img src="../web/image/logo.png" alt="logo" /> 

    </div>

    <div style="width: 80%; float: right;">

        <p style="font-size: 20px; line-height: 40px; text-align: center; margin-left: 30px; margin-right: 30px; margin-top: 20px; text-shadow: 0px 0px 3px #F2F2F2;" >
            Sistema de Informacion para el Registro y Control de Artistas Plasticos en la Direccion de Cultura de la Universidad Nacional Abierta
        </p>
       <!-- <img src="../web/image/banner.png" alt="titulo" width="90%" style="margin-top: 16px;" /> -->
 <?php
        if ($_SESSION['usuario'] != '') {
            ?>
        
    <div style="color: #FFF; font-size: 16px; width: 200px; float: right; margin-right: 20px;" >
        <?php
        $id = @$_SESSION['usuario'];
        $user = new Usuarios();
        $usuario = $user->detalle($id);
        $usuario = mysql_fetch_array($usuario);
        ?>
        <div style="float: right;">
        <p style="float: right;"> <span style="margin-top: 1px;"><?php echo ucfirst($usuario['nombre']) . ' ' . ucfirst($usuario['apellido']); ?></span>   </p>
           </div>
        <div style="float: right;" ><img src="../web/css/images/usuario.png" width="40" /></div>
        
    </div>
        <?php } ?>
    </div>


</div>