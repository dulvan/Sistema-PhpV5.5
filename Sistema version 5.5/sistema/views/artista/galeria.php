<!-- Light Box CSS - JS -->
<link href="../web/lightbox/css/lightbox.css" rel="stylesheet" type="text/css" />
<script src="../web/lightbox/js/lightbox-2.6.min.js" ></script>

<div class="gallery" style="float: left; width: 100%;">

    <?php
    while ($imagen = mysql_fetch_array($listado_obras)) {
        ?>
    <div style=" float: left; padding: 10px; width: 300px; height: 300px; margin-bottom: 40px;">
        <a href="../obras_fotos/<?php echo $imagen["foto"]; ?>" data-lightbox="Data" title="<?php echo $imagen['titulo'] . ' - '.$imagen['codigo_una']; ?>">
        <div style="width: 300px; height: 300px; background-size: cover; background-image: url('../obras_fotos/<?php echo $imagen["foto"]; ?>');">
            
        </div>
            </a>
       
        <p style="font-size: 16px;"><?php echo $imagen['titulo'] . ' - '.$imagen['codigo_una']; ?></p>
</div>
    <?php } ?>

</div>

<br />
<br />
<br />
<br />
