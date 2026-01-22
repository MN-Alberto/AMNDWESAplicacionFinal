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
    <img id="nasaHD" src="<?php echo $aVista['fotoHD']; ?>" alt="<?php echo $aVista['titulo']; ?>">
<?php
}
else{
    
?>
    <p>No se puede ver la imagen<p>   
<?php
}
?>
</main>