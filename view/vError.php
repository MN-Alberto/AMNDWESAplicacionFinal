<header>
<h1><b>Aplicacion Final</b></h1>
</header>

<main>   
<h1><b>ERROR</b></h1>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="f1">
            <h2>Ha ocurrido un error!!!</h2>
            <p>Un error ha sido detectado, por favor vuelva mas tarde y si el error persiste notifiquelo al administrador</p>
            <br>
            
            <div>
                <h2>Codigo de error:</h2> <p><?php echo $infoError['codError']; ?></p>
                <h2>Descripcion:</h2> <p><?php echo $infoError['descError']; ?></p>
                <h2>Archivo:</h2> <p><?php echo $infoError['archivoError']; ?></p>
                <h2>Linea:</h2> <p><?php echo $infoError['lineaError']; ?></p>
            </div>
            
            <div>
            <input type="submit" id="Volver" name="Volver" value="Volver"/>
            </div>
        </form>
    </main>