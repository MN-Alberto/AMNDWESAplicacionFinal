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
            <td>
            <h3>SERVIDOR MINECRAFT</h3>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="fServer">
                <select name="servidor" class="listaServers">
                    <option value="hypixel" <?php if(isset($_REQUEST['servidor']) && $_REQUEST['servidor'] === 'hypixel') echo 'selected'; ?>>Hypixel</option>
                    <option value="mineplex" <?php if(isset($_REQUEST['servidor']) && $_REQUEST['servidor'] === 'mineplex') echo 'selected'; ?>>Mineplex</option>
                    <option value="cubecraft" <?php if(isset($_REQUEST['servidor']) && $_REQUEST['servidor'] === 'cubecraft') echo 'selected'; ?>>CubeCraft</option>
                </select>
                <input type="submit" name="consultar" id="consultar" value="Consultar">
            </form>
            </td>
            <td>
                <h3>NÚMERO ALEATORIO</h3>
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="fNumAleatorio">

                    <input type="number" name="inicio" id="numInicial" placeholder="Ej: 1">

                    <input type="number" name="fin" id="numFinal" placeholder="Ej: 100">
                    
                    <input type="submit" name="generar" id="generar" value="Generar Número">
                </form>
            </td>
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

            <td>
                <?php
                    if($oNumero!=null){
                        echo "<h2>Tu rango elegido es de ".$inicio." hasta ".$fin."</h2>";

                        echo "<h2>Número Aleatorio: ".$oNumero."</h2>";
                    }

                    if($errorNumero){
                        echo "<p style='color:red'>".$errorNumero."</p>";
                    }
                ?>
            </td>
        </tr>
    </table>
    </main>