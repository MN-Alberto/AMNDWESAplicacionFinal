<header>
<h1><b>Aplicacion Final</b></h1>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="volverForm">
            <button type="submit" name="Volver" id="volver"></button>
        </form>
</header>

<main id="mainRest">   
<h1><b>API REST</b></h1>

    <table id="tablaRest">

        <tr>
            <td>
                <h3>NASA</h3>
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="fFecha">
                        <label for="fecha">Foto del día: </label>
                        <input type="date" name="fecha" id="fecha" value="<?php echo $fecha; ?>" max="<?php echo date('Y-m-d') ?>"/>
                        <input type="submit" name="enviar" id="enviar" class="botones" value="Enviar"/>
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
                    <h2><?php echo $aVista['titulo']; ?></h2>
                    <img id="imagenNasa" src="<?php echo $aVista['foto']; ?>" alt="<?php echo $aVista['titulo']; ?>">
                    <h2>Descripción:</h2>
                    <p><?php echo $aVista['descripcion'];?></p>
                <?php  
                    }
                    elseif($oNasa===null){
                ?>
                    <p>El día seleccionado no tiene una foto.</p>
                <?php 
                    }
                    else{ 
                    ?>
                    <p>No se pudo obtener la foto del día.</p>
                <?php
                    }
                ?>
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="formDetalleFoto">
                    <input type="submit" name="detalleFoto" id="detalleFoto" value="Ver Foto"/>
                </form>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
    </main>