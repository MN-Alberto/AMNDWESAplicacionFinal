<?php
    /*
     * Autor: Alberto Méndez 
     * Fecha de actualización: 18/12/2025
     */
?>
<!-- La vista del inicio público solo tiene el contenido del body -->

    
        <header>
        <h1 id="h1Publico"><b>Aplicacion Final</b></h1>
        
        <h3 id="tituloIdiomas">Idioma: </h3>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="idiomas">
            <button type="submit" name="español" id="español"></button>
            <button type="submit" name="ingles" id="ingles"></button>
            <button type="submit" name="portugues" id="portugues"></button>
            <button type="submit" name="ruso" id="ruso"></button>
        </form>

        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="loginPublico">
            <button type="submit" name="Login" id="Login"></button>
        </form> 
        </header>

    <main id="mainPublico">
        <h1><b>Inicio Publico</b></h1>
        <div class="imagenesInicio">
            <img id="arbol" src="./webroot/arbol.PNG">
        </div>
    </main>