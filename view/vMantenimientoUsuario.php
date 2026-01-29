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
            <input type="text" name="descripcion" id="buscarDesc" value="<?php echo $aVista['descripcion']; ?>" placeholder="Introduce una descripción">
            <button type="submit" name="buscar" id="botonBuscarDesc"></button>
        <span style="color:red"></span>
        </form>
<!-- Si el array de departamentos contiene algo se muestra la tabla -->
        <?php
            if(!empty($aVista['aUsuarios'])){
        ?>

        <div class="tablaUsers">
                <table>
                <tr>
                    <th>Código</th>
                    <th>Password</th>
                    <th>Descripción</th>
                    <th>Nº Conexiones</th>
                    <th>Última Conexión</th>
                    <th>Perfil</th>
                    <th>Imagen</th>
                    <th>Opciones</th>
                </tr>
<!-- Recorremos todos los departamentos que haya devuelto la consulta y mostramos los datos de cada uno -->
                <?php foreach ($aVista['aUsuarios'] as $dep): ?>
                    <tr>
                        <td><?= $dep['codUsuario'] ?></td>
                        <td><?= $dep['password'] ?></td>
                        <td style="text-align: left;"><?= $dep['descUsuario'] ?></td>
                        <td><?= $dep['numConexiones'] ?></td>
                        <td style="text-align: left;"><?= $dep['fechaUltima'] ?></td>
                        <td><?= $dep['perfil'] ?></td>
                        <td><?= $dep['imagen'] ?></td>
                        <td>
                            <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post">
                                <input type="hidden" name="codUsuario" value="<?= $dep['codUsuario']; ?>">
                                <button type="submit" name="editarDept" id="botonEditarDept"></button>
                                <button type="submit" name="eliminarDept" id="botonEliminarDept"></button>
                            </form>
                        </td>
                    </tr>
                <?php 
                    endforeach; 
                    }
                    //Si no contiene departamentos, se muestra un mensaje
                    else{
                ?>
                    <h2>No se han encontrado usuarios con esa descripción</h2>
                <?php
                    }
                ?>
            </table>
        </div>
    </main>