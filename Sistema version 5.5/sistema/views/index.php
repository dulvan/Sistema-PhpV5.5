<!-- pantalla de Inicio-->
<!--<div align="center"></div>-->
<div align="center"style="margin-left: 20px; color: #467aa7;">
    <?php 
    $id = @$_SESSION['usuario']; 
    $user = new Usuarios();
    $usuario = $user->detalle($id);
    $usuario = mysql_fetch_array($usuario);
    ?>
    
    
    <h1>Bienvenido, <?php echo ucfirst($usuario['nombre']).' '.ucfirst($usuario['apellido']); ?></h1>
</div>

<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
