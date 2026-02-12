<?php
    /*
     * Autor: Alberto Méndez 
     * Fecha de actualización: 18/12/2025
     */
?>
<!-- La vista del inicio público solo tiene el contenido del body -->

    
        <header>
        <h1 id="h1Publico"><b>Aplicacion Final</b></h1>
        
        <div class="cajaIdiomas">
            <h3 id="tituloIdiomas">Idioma: </h3>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="idiomas">
                <button type="submit" name="español" id="español"></button>
                <button type="submit" name="ingles" id="ingles"></button>
                <button type="submit" name="portugues" id="portugues"></button>
                <button type="submit" name="ruso" id="ruso"></button>
            </form>
        </div>

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
            <div class="boton4"></div>
            <div class="boton5"></div>
            <div class="boton6"></div>
            <div class="boton7"></div>
            <div class="boton8"></div>
            <div class="boton9"></div>
        </div>

            <div class="fotos">
                <img src="./webroot/arbolNavegacion.png.jpg" alt="foto1" id="foto1"/>
                <img src="./webroot/diagramaClases.PNG" alt="foto2" id="foto2"/>
                <img src="./webroot/sesion.png" alt="foto3" id="foto3"/>
                <img src="./webroot/diagramaPropio.png" alt="foto4" id="foto4"/>
                <img src="./webroot/estructuraAlmacenamiento.PNG" alt="foto5" id="foto5"/>
                <!--<img src="./webroot/casosDeUso.PNG" alt="foto6" id="foto6"/>-->
                <iframe id="foto6" src="./webroot/casosDeUso.pdf" frameborder="0"></iframe>
                <img src="./webroot/modeloFisico.PNG" alt="foto7" id="foto7"/>
                <img src="./webroot/relacionFicheros.PNG" alt="foto8" id="foto8"/>
                <iframe id="foto9" src="./webroot/catalogoRequisitos.pdf" frameborder="0"></iframe>
            </div>
    </div>

    <script defer>

    const botones = document.getElementsByClassName("botonesCarrusel")[0].children;
    const fotos = document.getElementsByClassName("fotos")[0].children;

    for (let i = 0; i < fotos.length; i++) {
        fotos[i].style.display = (i === 0) ? "block" : "none";
    }

    for (let i = 0; i < botones.length; i++) {
        botones[i].style.background = (i === 0) ? "lightgreen" : "wheat";
    }

    for (let i = 0; i < botones.length; i++) {
        botones[i].addEventListener("click", () => {
            for (let j = 0; j < fotos.length; j++) {
                fotos[j].style.display = (i === j) ? "block" : "none";
            }
            for (let j = 0; j < botones.length; j++) {
                botones[j].style.background = (i === j) ? "lightgreen" : "wheat";
            }
        });
    }
    </script>

    </main>