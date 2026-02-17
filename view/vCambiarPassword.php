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
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="fRegistro">
        <table>
            <tr style="background-color:#d0c5c0; color:black;">
                <td colspan="2"><h2>CAMBIAR PASSWORD</h2></td>
            </tr>
            
            <tr style="background-color:#ffffff; color:black;">
                <td><label for="desc" id="ds">Contraseña Actual:</label></td>
                <td><input type="password" name="passActual" id="desc" placeholder="Introduce contraseña"></td>
                <?php 
                    if(isset($aErrores['password']) && $aErrores['password'] != null){
                        echo "<div class='error'>{$aErrores['password']}</div>";
                    }
                ?>
            </tr>
            
            <tr style="background-color:#ffffff; color:black;">
            <td><label for="usuario" id="ps">Nueva Contraseña:</label></td>
            <td><input type="password" name="pass" id="pass" placeholder="Introduce contraseña nueva:"></td>
                <?php 
                    if(isset($aErrores['nuevaPassword']) && $aErrores['nuevaPassword'] != null){
                        echo "<div class='error'>{$aErrores['nuevaPassword']}</div>";
                    }
                ?>
            </tr>

            <tr style="background-color:#ffffff; color:black;">
            <td><label for="usuario" id="ps">Repite Nueva Contraseña:</label></td>
            <td><input type="password" name="pass2" id="pass" placeholder="Introduce contraseña nueva:"></td>
                <?php 
                    if(isset($aErrores['repetirNuevaPassword']) && $aErrores['repetirNuevaPassword'] != null){
                        echo "<div class='error'>{$aErrores['repetirNuevaPassword']}</div>";
                    }
                ?>
        
            </tr>
            </table>
            <br>
            <div>
            <input type="submit" id="Aceptar" name="Aceptar" value="Aceptar"/>
            <input type="submit" id="Cancelar" name="Cancelar" value="Cancelar"/>
            </div>
        </form>
    </main>