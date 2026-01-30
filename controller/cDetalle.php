<?php

/*
 * Autor: Alberto Méndez 
 * Fecha de actualización: 18/12/2025
 * 
 */
    
    if(empty($_SESSION['userAMNDWESAplicacionFinal'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='inicioPublico';
        header("Location: indexAplicacionFinal.php");
        exit;
    }

    if(isset($_REQUEST['cerrar'])){
        $_SESSION["paginaEnCurso"]=$_SESSION["paginaAnterior"];
        header("Location: indexAplicacionFinal.php");
        exit;
    }

require_once $view["Layout"];
?>