<header>
<h1><b>Aplicacion Final</b></h1>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="volverForm">
            <button type="submit" name="Volver" id="volver"></button>
        </form>
</header>

<main id="mainRest">   
<?php
if($oNasa){
?>
    <p><?php echo $aVista['fecha']; ?></p>
    <h2><?php echo $aVista['titulo']; ?></h2>
    <img id="nasaHD" src="<?php echo $aVista['fotoHD']; ?>" alt="<?php echo $aVista['titulo']; ?>">
    <p><?php echo $aVista['descripcion']; ?></p>
<?php
} else {
?>
    <p>No se puede ver la imagen</p>   
<?php
}
?>
</main>