<header>
        <h1 id="h1Publico"><b>Aplicacion Final</b></h1>
        <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post" id="volverForm">
            <button type="submit" name="cerrar" id="volver"></button>
        </form> 
</header>

    <main id="mantenimientoDept">
        <?php
        if($_SESSION['paginaEnCurso']=="verDepartamento"){
        
        ?>
        <h1><b>Ver departamento</b></h1>
        <?php
        }
        else{
        ?>
        <h1><b>Modificar departamento</b></h1>
        <?php
        }
        ?>

        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" id="fEditDept">
            <label for="codDept">Código:</label>
            <input type="text" name="codDept" id="cDeptEditar" value="<?php echo $aVista['codDepartamento']; ?>" disabled/>
            
            <label for="descDept">Descripción:</label>
            <?php
            if($_SESSION['paginaEnCurso']=="verDepartamento"){

            ?>
            <input type="text" name="descDept" id="dDeptEditar" value="<?php echo $aVista['descDepartamento']; ?>" disabled/>
            <?php
            }
            else{
            ?>
            <input type="text" name="descDept" id="dDeptEditar" value="<?php echo $aVista['descDepartamento']; ?>"/>
            <?php
            }
            ?>
            
            <label for="fCreacionDept">Fecha de Creación:</label>
            <input type="text" name="fCreacionDept" id="fCreaDeptEditar" value="<?php echo $aVista['fechaCreacion']; ?>" disabled/>
            
            <label for="volumen">Volumen de Negocio:</label>
            <?php
            if($_SESSION['paginaEnCurso']=="verDepartamento"){

            ?>
            <input type="text" name="volumenNegocio" id="fCreaDeptEditar" value="<?php echo $aVista['volumenNegocio']; ?>" disabled/>
            <?php
            }
            else{
            ?>
            <input type="text" name="volumenNegocio" id="fCreaDeptEditar" value="<?php echo $aVista['volumenNegocio']; ?>"/>
            <?php
            }
            ?>
            
            <label for="fBajaDept">Fecha de Baja:</label>
            <input type="text" name="fBajaDept" id="fBajaDeptEditar" value="<?php echo $aVista['fechaBaja']; ?>" disabled/>

            <?php
            if($_SESSION['paginaEnCurso']=="modificarDepartamento"){
            ?>
            <button type="submit" name="confirmarEditar" id="btnConfEdit">Aceptar</button>
            <?php
            }
            ?>
           
        </form>
        
    </main>