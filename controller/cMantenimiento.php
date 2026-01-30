<?php

    if(empty($_SESSION['userAMNDWESAplicacionFinal'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='inicioPublico';
        header("Location: indexAplicacionFinal.php");
        exit;
    }

    if(isset($_REQUEST['Volver'])){
        $_SESSION["paginaEnCurso"]=$_SESSION["paginaAnterior"];
        header("Location: indexAplicacionFinal.php");
        exit;
    }

    require_once $view["Layout"];
?>