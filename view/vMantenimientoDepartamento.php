<header>
        <h1 id="h1Publico"><b>Aplicacion Final</b></h1>
        <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post" id="volverForm">
            <button type="submit" name="cerrar" id="volver"></button>
        </form> 
</header>

    <main id="mantenimientoDept">
        <h1><b>Mantenimiento de departamentos</b></h1>
        <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post" class="formDept">
        <label>Descripción:</label>
            <input type="text" name="descripcion" id="buscarDesc" value="<?php echo $aVista['descripcion']; ?>" placeholder="Introduce una descripción">
            <button type="submit" name="buscar" id="botonBuscarDesc"></button>
        <span style="color:red"></span>
        </form>
<!-- Si el array de departamentos contiene algo se muestra la tabla -->
        <?php
            if(!empty($aVista['aDepartamentos'])){
        ?>

        <div class="tablaDept">
                <table>
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Fecha creación</th>
                    <th>Volumen</th>
                    <th>Fecha baja</th>
                    <th>Opciones</th>
                </tr>
<!-- Recorremos todos los departamentos que haya devuelto la consulta y mostramos los datos de cada uno -->
                <?php foreach ($aVista['aDepartamentos'] as $dep): ?>
                    <tr>
                        <td><?= $dep['codDepartamento'] ?></td>
                        <td style="text-align: left;"><?= $dep['descDepartamento'] ?></td>
                        <td><?= $dep['fechaCreacion'] ?></td>
                        <td style="text-align: left;"><?= $dep['volumenNegocio'] ?></td>
                        <td><?= $dep['fechaBaja'] ?></td>
                        <td>
                            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="f1">
                                <button type="submit" name="editarDept" id="botonEditarDept" value="<?php echo $dep['codDepartamento']; ?>"></button>
                                <button type="submit" name="eliminarDept" id="botonEliminarDept" value="<?php echo $dep['codDepartamento']; ?>"></button>
                            </form>
                        </td>
                    </tr>
                <?php 
                    endforeach; 
                    }
                    //Si no contiene departamentos, se muestra un mensaje
                    else{
                ?>
                    <h2>No se han encontrado departamentos con esa descripción</h2>
                <?php
                    }
                ?>
            </table>
        </div>
    </main>