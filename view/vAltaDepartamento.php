<header>
        <h1 id="h1Publico"><b>Aplicacion Final</b></h1>
        <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post" id="volverForm">
            <button type="submit" name="cerrar" id="volver"></button>
        </form> 
</header>

    <main id="mantenimientoDept">
        <h1><b>Alta de departamento</b></h1>
           
        
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="fEditDept">
            <label for="codDept">Código:</label>
            <input type="text" name="codDept" id="cDeptEditar" value=""/>
            
            <label for="descDept">Descripción:</label>
            <input type="text" name="descDept" id="dDeptEditar" value=""/>
            
            <label for="volumen">Volumen de Negocio:</label>
            <input type="text" name="volumenNegocio" id="fCreaDeptEditar" value=""/>

            <button type="submit" name="confirmarAñadir" id="btnConfEdit">Aceptar</button>
           
        </form>
    </main>