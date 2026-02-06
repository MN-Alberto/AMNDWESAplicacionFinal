<header>
        <h1 id="h1Publico"><b>Aplicacion Final</b></h1>
        <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post" id="volverForm">
            <button type="submit" name="cerrar" id="volver"></button>
        </form> 
</header>

    <main id="mantenimientoUsers">
        <h1><b>Mantenimiento de usuarios</b></h1>
        <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post" class="formUsers">
        <label>Descripción:</label>
            <input type="text" name="descripcion" id="buscarDesc" value="" placeholder="Introduce una descripción">
        <span style="color:red"></span>
        </form>

        <div class="tablaUsers">
                <table>
                <thead>
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Nº Conexiones</th>
                    <th>Última Conexión</th>
                    <th>Perfil</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </main>
<script src="./webroot/js/usuarios.js"></script>