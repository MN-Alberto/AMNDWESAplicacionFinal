<header>
<h1><b>Aplicacion Final</b></h1>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="volverForm">
            <button type="submit" name="Volver" id="volver"></button>
        </form>
</header>

<main id="mainRest">   
<h1><b>APIs REST</b></h1>

    <table id="tablaRest">

        <tr>
            <td>
                <h3>NASA</h3>
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="f1">
                        <label for="fecha">Foto del día: </label>
                        <input type="date" name="fecha" id="fecha"/>
                        <input type="submit" name="enviar" id="enviar" value="Enviar"/>
                </form>
            </td>
            <td><h3>AEMET</h3></td>
            <td><h3>PROPIA</h3></td>
        </tr>
        <tr>
            <td>
                <?php 
                    if ($oNasa){
                ?>
                    <h2><?php echo $oNasa->getTitulo(); ?></h2>
                    <img id="imagenNasa" src="<?php echo $oNasa->getFoto(); ?>" alt="<?php echo $oNasa->getTitulo(); ?>">
                    <p>Estas viendo la foto del día <?php echo $fecha?></p>
                <?php  
                    }
                    else{
                ?>
                    <p>No se pudo obtener la foto del día.</p>
                <?php 
                    }
                ?>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
                <p>
                <pre class="codigo"><code>
                    <h2>Clase NASA</h2>
                    <?php echo htmlspecialchars($codigoNASA); 
                    ?>
                    <h2>Clase Rest</h2>
                    <?php
                          echo htmlspecialchars($codigoRest);
                    ?>
                    <h2>Controlador Rest</h2>
                    <?php
                          echo htmlspecialchars($codigocRest);
                    ?>
                </code></pre>
                </p>
            </td>
            <td></td>
            <td></td>
        </tr>

    </table>
    </main>