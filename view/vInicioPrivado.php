<?php
    /*
     * Autor: Alberto Méndez 
     * Fecha de actualización: 18/12/2025
     */
?>

    
<header>
<h1><b>Aplicacion Final</b></h1>

        <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post" id="cerrarSesion">
            <button type="submit" name="editar" id="editarUsuario"></button>
            <button type="submit" name="cerrar" id="cerrar"></button>
        </form>

</header>

<main>
        <h1><b>Inicio Privado</b></h1>
        
<?php
        switch ($_COOKIE['idioma']){
            case "ES": echo "<h3>Bienvenido/a ". $avInicioPrivado["descUsuario"] . "</h3>";
                break;
            case "EN": echo "<h3>Welcome ". $avInicioPrivado["descUsuario"] . "</h3>";
                break;
            case "PT": echo "<h3>Bem-vindo ". $avInicioPrivado["descUsuario"] . "</h3>";
                break;
            case "RU": echo "<h3>добро пожаловать ". $avInicioPrivado["descUsuario"] . "</h3>";
                break;
            default : echo "<h3>Bienvenido/a ". $avInicioPrivado["descUsuario"] . "</h3>";
                break;
        }

        if ($avInicioPrivado['numConexiones'] <= 1) {
            echo "¡Esta es tu primera conexión!<br>";
        } else {
          $fechaUltimaConexion = $avInicioPrivado['fechaHoraUltimaConexionAnterior'];

            if (!$fechaUltimaConexion instanceof DateTime) {
                $fechaUltimaConexion = new DateTime($fechaUltimaConexion);
            }
            
            $fechaUltimaConexion->setTimezone(new DateTimeZone('Europe/Madrid'));
            
            $formatoFecha = new IntlDateFormatter('es_ES', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
            $fecha = $formatoFecha->format($fechaUltimaConexion);
            $hora = $fechaUltimaConexion->format('H:i');

            echo "<p>Esta es la vez numero " . $avInicioPrivado['numConexiones'] . " que se conecta.</p>";
            echo "<p>Usted se conecto por ultima vez el</p>";
            echo "<p>".$fecha . " a las " . $hora."</p>";
        }
        ?>
        
        <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post" id="f1">
            <input type="submit" id="Aceptar" name="Aceptar" class="botones" value="Detalle"/>
            <input type="submit" id="Error" name="Error" class="botones" value="Error"/>
            <input type="submit" id="mantenimiento" name="mantenimiento" class="botones" value="Mantenimiento Dept"/>
            <input type="submit" id="rest" name="rest" class="botones" value="REST"/>
      </form> 
</main>