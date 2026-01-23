<header>
        <h1 id="h1Publico"><b>Aplicacion Final</b></h1>
        <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post" id="volverForm">
            <button type="submit" name="cerrar" id="volver"></button>
        </form> 
</header>

    <main id="mantenimientoDept">
        <h1><b>Mantenimiento de departamentos</b></h1>
        <form method="post">
        <label>Descripción:</label>
            <input type="text" name="descripcion" value="" id="buscarDesc" placeholder="Introduce una descripción">
            <input type="submit" name="buscar" value="Buscar">
            
        <span style="color:red"></span>
        </form>

        <div class="tablaDept">
                <table border="1">
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Fecha creación</th>
                    <th>Volumen</th>
                    <th>Fecha baja</th>
                </tr>
                
                <?php foreach ($aVista['aDepartamentos'] as $dep): ?>
                    <tr>
                        <td><?= $dep['codDepartamento'] ?></td>
                        <td><?= $dep['descDepartamento'] ?></td>
                        <td><?= $dep['fechaCreacion'] ?></td>
                        <td><?= $dep['volumenNegocio'] ?></td>
                        <td><?= $dep['fechaBaja'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </main>