<?php
    /*
    * Autor: Alberto Méndez 
    * Fecha de actualización: 18/12/2025
    */
?>


<header>
<h1><b>Aplicacion Final</b></h1>
</header>

<main>   
<h1><b>Login</b></h1>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="f1">
        <table>
            <tr style="background-color:#d0c5c0; color:black;">
                <td colspan="2"><h2>INICIAR SESION O REGISTRARSE</h2></td>
            </tr>
            
            <tr style="background-color:#ffffff; color:black;">
                <td><label for="usuario" id="us">NOMBRE:</label></td>
                <td><input type="text" name="usuario" id="usuario" placeholder="Introduce usuario"></td>
            
            </tr>
            
            <tr style="background-color:#ffffff; color:black;">
            <td><label for="usuario" id="ps">CONTRASEÑA:</label></td>
            <td><input type="password" name="pass" id="pass" placeholder="Introduce contraseña:"></td>
            
            </tr>
            </table>
            <br>
            <div>
            <input type="submit" id="Entrar" name="Entrar" class="botones" value="Entrar"/>
            <input type="submit" id="Cancelar" name="Cancelar" class="botones" value="Cancelar"/>
            <input type="submit" id="Registrarse" name="Registrarse" class="botones" value="Registrarse"/>
            </div>
        </form>
    </main>