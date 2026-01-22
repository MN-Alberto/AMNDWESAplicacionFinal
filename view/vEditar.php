    
<header>
<h1><b>Aplicacion Final</b></h1>

        <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post" id="cerrarSesion">
                <button type="submit" name="cerrar" id="volverUsuario"></button>
        </form>

</header>

<main>
        <h1><b>Editar Usuario</b></h1>
        <div class="contenidoEditar">
            <div class="formularioEditar">
                <div id="foto"><img src="http://picsum.photos/id/100/200/200"/></div>
                <div id="formDatos">
                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="formDatos">
                        <table id="tablaDatos">
                            <tr>
                                <td>Nombre:</td>
                                <td><input type="text" name="nomUsuario" id="nomUsuario" value="<?php echo $nomUsuario; ?>" disabled></td>
                            </tr>
                            
                            <tr>
                                <td>Contraseña:</td>
                                <td><input type="password" name="passUsuario" id="passUsuario" value="*****************" disabled></td>
                            </tr>
                            
                            <tr>
                                <td>Descripción:</td>
                                <td><input type="text" name="cambiarNombre" id="cambiarDesc" value="<?php echo $descripcion; ?>"></td>
                            </tr>
                            
                            <tr>
                                <td>Nº de Conexiones:</td>
                                <td><input type="text" name="numConex" id="numConex" value="<?php echo $nConexiones; ?>" disabled></td>
                            </tr>
                            
                            <tr>
                                <td>Ultima Conexión:</td>
                                <td><input type="text" name="cambiarNombre" id="cambiarNombre" value="<?php echo $ultimaConexion; ?>" disabled></td>
                            </tr>
                            
                            <tr>
                                <td>Ultima Conexión Anterior:</td>
                                <td><input type="text" name="cambiarNombre" id="cambiarNombre" value="<?php echo $ultimaConexionAnterior; ?>" disabled></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
</main>