<?php

    /*
     * Autor: Alberto Méndez 
     * Fecha de actualización: 16/02/2026
     * 
     */

if(isset($_REQUEST['eliminarNo'])){
    $_SESSION['paginaEnCurso']="editar";
    header("Location: indexAplicacionFinal.php");
    exit;
}

if(isset($_REQUEST['eliminarSi'])){
    UsuarioPDO::eliminarUsuario($_SESSION['userAMNDWESAplicacionFinal']->getCodUsuario());
    $_SESSION['paginaEnCurso']="inicioPublico";
    header("Location: indexAplicacionFinal.php");
    exit;
}

require_once $view['Layout'];

?>