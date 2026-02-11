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
            <td><h3>HYPIXEL</h3></td>
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
                    if ($oNasa){
                ?>
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="formDetalleFoto">
                    <input type="submit" name="detalleFoto" id="detalleFoto" value="Ver Foto"/>
                </form>
                    
                <?php
                    }
                ?>
            </td>
            
            
            <td>
                
                <?php
                    if($oDatos){
                        if($aVistaDatos['icono']){
                ?>
                    <img src="<?php echo $aVistaDatos['icono']; ?>" id="imagenIcon" alt="Icono del Servidor"/>
                <?php
                        }
                ?>  
                <h2>IP del Servidor: <p><?php echo $aVistaDatos['ip']; ?></p></h2>
                <h2>Estado del Servidor: <p><?php if($aVistaDatos['online']){echo 'Online'; } else{echo 'Offline';} ?></p></h2>
                <h2>Número de jugadores actuales: <p><?php echo $aVistaDatos['numJugadores']; ?></p></h2>
                <h2>Número máximo de jugadores: <p><?php echo $aVistaDatos['numJugadoresMaximos']; ?></p></h2>
                <h2>Versión de Minecraft: <p><?php echo $aVistaDatos['version']; ?></p></h2>
                
                <?php
                    }
                    else{
                ?> 
                <h2>No se han podido obtener los datos</h2>
                <p>Asegurese que el servidor está en línea</p>
                <?php    
                    }
                ?>
                
            </td>
            <td></td>
        </tr>
    </table>
    </main>