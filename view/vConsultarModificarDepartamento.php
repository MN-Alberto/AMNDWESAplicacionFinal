<header>
        <h1 id="h1Publico"><b>Aplicacion Final</b></h1>
        <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post" id="volverForm">
            <button type="submit" name="cerrar" id="volver"></button>
        </form> 
</header>

    <main id="mantenimientoDept">
        <h1><b>Modificar departamento</b></h1>

        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="fEditDept">
            <label for="codDept">Código:</label>
            <input type="text" name="codDept" id="cDeptEditar" value="<?php echo $_SESSION['codDepartamentoEnCurso']; ?>" disabled/>
            
            <label for="descDept">Descripción:</label>
            <input type="text" name="descDept" id="dDeptEditar"/>
            
            <label for="fCreacionDept">Fecha de Creación:</label>
            <input type="text" name="fCreacionDept" id="fCreaDeptEditar" disabled/>
            
            <label for="fCreacionDept">Volumen de Negocio:</label>
            <input type="text" name="fCreacionDept" id="fCreaDeptEditar"/>
            
            <label for="fBajaDept">Fecha de Baja:</label>
            <input type="text" name="fBajaDept" id="fBajaDeptEditar"/>
        </form>
        
    </main>