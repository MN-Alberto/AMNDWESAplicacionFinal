<header>
<h1><b>Aplicacion Final</b></h1>
</header>

<main>   

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="fSeguro">
        <table>
            <tr style="background-color:#d0c5c0; color:black;">
                <td colspan="2"><h2>SEGURO QUE DESEA ELIMINAR EL USUARIO </h2></td>
            </tr>
            
            <tr style="background-color:#ffffff; color:black;">
                <td><input type="submit" name="eliminarSi" id="eliminarSi" value="Si"/></td>
                <td><input type="submit" name="eliminarNo" id="eliminarNo" value="No"/></td>
            
            </tr>
            </table>
        </form>
</main>