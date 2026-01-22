<?php
    if(isset($_REQUEST['Volver'])){
        $_SESSION["paginaAnterior"]=$_SESSION["paginaEnCurso"];
        $_SESSION["paginaEnCurso"]='rest';
        header("Location: indexAplicacionFinal.php");
        exit;
    }
    require_once $controller["rest"];

    require_once $view["Layout"];
?>