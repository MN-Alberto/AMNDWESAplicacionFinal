<header>
        <h1 id="h1Publico"><b>Aplicacion Final</b></h1>
        <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post" id="volverForm">
            <button type="submit" name="cerrar" id="volver"></button>
        </form> 
</header>

    <main id="mantenimientoDept">
        <h1><b>Eliminar departamento</b></h1>
           
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="fEditDept">
            <label for="codDept">Código:</label>
            <input type="text" name="codDept" id="cDeptEditar" value="<?php echo $aVista['codDepartamento']; ?>" disabled/>
            
            <label for="descDept">Descripción:</label>
            <input type="text" name="descDept" id="dDeptEditar" value="<?php echo $aVista['descDepartamento']; ?>" disabled/>
            
            <label for="fCreacionDept">Fecha de Creación:</label>
            <input type="text" name="fCreacionDept" id="fCreaDeptEditar" value="<?php echo $aVista['fechaCreacion']; ?>" disabled/>
            
            <label for="volumen">Volumen de Negocio:</label>
            <input type="text" name="volumenNegocio" id="fCreaDeptEditar" value="<?php echo $aVista['volumenNegocio']; ?>" disabled/>
            
            <label for="fBajaDept">Fecha de Baja:</label>
            <input type="text" name="fBajaDept" id="fBajaDeptEditar" value="<?php echo $aVista['fechaBaja']; ?>" disabled/>

            <button type="submit" name="confirmarEliminar" id="btnConfEdit">Eliminar</button>
        </form>
    </main>