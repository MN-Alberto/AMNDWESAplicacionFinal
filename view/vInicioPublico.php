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
        
    <div class="container">

        <div class="botonesCarrusel">
            <div class="boton1"></div>
            <div class="boton2"></div>
            <div class="boton3"></div>
        </div>

            <div class="fotos">
                <img src="./webroot/arbolNavegacion.png.jpg" alt="foto1" id="foto1"/>
                <img src="./webroot/diagramaClases.PNG" alt="foto2" id="foto2"/>
                <img src="./webroot/sesion.png.jpg" alt="foto3" id="foto3"/>
            </div>
    </div>

    <script defer>

    document.getElementsByClassName("boton1")[0].addEventListener("click",()=>{
        document.getElementById("foto1").style.display="block";
        document.getElementById("foto2").style.display="none";
        document.getElementById("foto3").style.display="none";

        document.getElementsByClassName("boton1")[0].style.background="lightgreen";
        document.getElementsByClassName("boton2")[0].style.background="wheat";
        document.getElementsByClassName("boton3")[0].style.background="wheat";
    });

    document.getElementsByClassName("boton2")[0].addEventListener("click",()=>{
        document.getElementById("foto1").style.display="none";
        document.getElementById("foto2").style.display="block";
        document.getElementById("foto3").style.display="none";

        document.getElementsByClassName("boton2")[0].style.background="lightgreen";
        document.getElementsByClassName("boton1")[0].style.background="wheat";
        document.getElementsByClassName("boton3")[0].style.background="wheat";
    });

    document.getElementsByClassName("boton3")[0].addEventListener("click",()=>{
        document.getElementById("foto3").style.display="block";
        document.getElementById("foto2").style.display="none";
        document.getElementById("foto1").style.display="none";

        document.getElementsByClassName("boton3")[0].style.background="lightgreen";
        document.getElementsByClassName("boton2")[0].style.background="wheat";
        document.getElementsByClassName("boton1")[0].style.background="wheat";
    });

    </script>

    </main>