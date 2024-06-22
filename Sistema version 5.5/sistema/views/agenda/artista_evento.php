<div align="center">
    <h1 style="color: #467aa7;">Artistas y Obras de Evento</h1>
    <br/>
    <form id="form1" name="form1" method="post" action="evento_artista.php?id=<?php echo $id_evento; ?>" >
        <table width="50%" border="1" style="background-color: #F2F3FF">
            <tr>
                <td width="100px" class="ui-state-hover">Artista <span style="color: #D14;">*</span></td>
                <td>  
                    <select name="id_artistas" id="id_artistas" onchange="this.form.submit()">
                        <option value="">Seleccione</option>
                        <?php while ($ar = mysql_fetch_array($listado_artistas)) { ?>
                            <option
                            <?php
                            if ($ar['id_artistas'] == @$id_artista) {
                                echo 'selected';
                            }
                            ?>
                                value="<?php echo $ar['id_artistas']; ?>"><?php echo ucfirst($ar['tp_cedula']).$ar['num_cedula'].'   -   '. ucfirst($ar['nombre']) . ' ' . ucfirst($ar['apellido']); ?></option>
                            <?php } ?>
                    </select>
                    <script type="text/javascript">
                        var id_artistas = new LiveValidation('id_artistas');
                        id_artistas.add(Validate.Presence);
                    </script>
                </td>
            </tr>
            <tr>
                <td class="ui-state-hover" colspan="2">Obras</td>   
            </tr>


            <?php
            
            while ($obra_check = mysql_fetch_array($listadoobras)) {
                ?> 
<tr>

                    <td><center><input type="checkbox" name="<?php echo $obra_check['id_obras']; ?>" value="<?php echo $obra_check['id_obras']; ?>" /></center></td>
                <td><?php echo ucfirst($obra_check['titulo']); ?></td>
                </tr>

                <?php
                $boton = 'si';
            }
            ?>


        </table>
        <br />
        <?php if (@$boton == 'si') { ?>
            <input type="submit" name="guardar" id="guardar " value="Guardar" />
        <?php } ?>
    </form>

    
    <br />
     <br />
    
        <table width="40%" style="background-color: #FFF;" border="1">
        <tr>
            <td class="ui-state-hover">Artista</td>
            <td class="ui-state-hover">Obra</td>
        </tr>
        <?php while ($valor = mysql_fetch_array($listado_obras_artista)) { ?>
            <tr>
                <td><?php echo ucfirst($valor['apellido']).' '.ucfirst($valor['nombre']); ?></td>
              <!--  <td><a href="detalle_artista.php?id=<?php echo $valor['id_artistas']; ?>">Ver</a></td> -->
                <td><?php echo ucfirst($valor['titulo']); ?></td>
               <!--   <td><a href="detalle_obra.php?id="<?php echo $valor['id_obras']; ?>>Ver</a></td> -->

            </tr>


<?php }

?>

    </table>

 <br />
        <input type="button" name="volver" id="volver" value="&lt;&lt;Volver" onclick="location.href = 'detalle_evento.php?p=e&id=<?php echo @$_GET['id'] ?>'" />
</div>