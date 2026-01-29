<?php
    /*
    * Autor: Alberto Méndez 
    * Fecha de actualización: 15/01/2026
    */
?>


<header>
<h1><b>Aplicacion Final</b></h1>
</header>

<main>   
<h1><b>Login</b></h1>
<?php
if (!$_SESSION['respuestaCorrecta']){
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="fPregunta">
        <table>
            <tr style="background-color:#d0c5c0; color:black;">
                <td colspan="2"><h2>PREGUNTA DE SEGURIDAD</h2></td>
            </tr>
            
            <tr style="background-color:#ffffff; color:black;">
                <td><label for="usuario" id="us">Responda a la pregunta de seguridad para poder registrarse:</label></td>
                <td><input type="text" name="respuestaPregunta" id="usuario" placeholder="Introduce respuesta"></td>
            
            </tr>
            </table>
            <br>
            <div>
            <input type="submit" id="Aceptar" name="AceptarPregunta" value="Aceptar"/>
            <input type="submit" id="Cancelar" name="Cancelar" value="Cancelar"/>
            </div>
        </form>
<?php
}
?>

        <?php
            if($_SESSION['respuestaCorrecta']){
               
        ?>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="fRegistro">
        <table>
            <tr style="background-color:#d0c5c0; color:black;">
                <td colspan="2"><h2>REGISTRARSE</h2></td>
            </tr>
            
            <tr style="background-color:#ffffff; color:black;">
                <td><label for="usuario" id="us">NOMBRE:</label></td>
                <td><input type="text" name="usuario" id="usuario" placeholder="Introduce usuario"></td>
            
            </tr>
            
            <tr style="background-color:#ffffff; color:black;">
                <td><label for="desc" id="ds">DESCRIPCION:</label></td>
                <td><input type="text" name="desc" id="desc" placeholder="Introduce descripcion"></td>
            
            </tr>
            
            <tr style="background-color:#ffffff; color:black;">
            <td><label for="usuario" id="ps">CONTRASEÑA:</label></td>
            <td><input type="password" name="pass" id="pass" placeholder="Introduce contraseña:"></td>
            
            </tr>
            </table>
            <br>
            <div>
            <input type="submit" id="Aceptar" name="Aceptar" value="Aceptar"/>
            <input type="submit" id="Cancelar" name="Cancelar" value="Cancelar"/>
            </div>
        </form>

        <?php
            }
        ?>
    </main>