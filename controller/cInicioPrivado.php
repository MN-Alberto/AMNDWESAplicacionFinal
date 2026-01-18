<?php

    /*
    * Autor: Alberto Méndez 
    * Fecha de actualización: 18/12/2025
    */

   require_once './model/DBPDO.php';

    if(empty($_SESSION['userAMNDWESAplicacionFinal'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='inicioPublico';
        header("Location: indexAplicacionFinal.php");
        exit;
    }

    if(isset($_REQUEST['Aceptar'])){
        $_SESSION["paginaAnterior"]=$_SESSION["paginaEnCurso"];
        $_SESSION["paginaEnCurso"]="detalle";
        header("Location: indexAplicacionFinal.php");
        exit;
    }

    if(isset($_REQUEST['cerrar'])){
        $_SESSION["paginaEnCurso"]="inicioPublico";
        header("Location: indexAplicacionFinal.php");
        exit;
    } 
    
    if(isset($_REQUEST['mantenimiento'])){
        $_SESSION["paginaAnterior"]=$_SESSION["paginaEnCurso"];
        $_SESSION["paginaEnCurso"]="mantenimiento";
        header("Location: indexAplicacionFinal.php");
        exit;
    } 

    if(isset($_REQUEST['rest'])){
        $_SESSION["paginaAnterior"]=$_SESSION["paginaEnCurso"];
        $_SESSION["paginaEnCurso"]="rest";
        header("Location: indexAplicacionFinal.php");
        exit;
    } 
    
    if(isset($_REQUEST['Error'])){
        DBPDO::ejecutaConsulta("select * from gfrdjgsdyuhbrejkdhvnodf;");
    } 

    if(!isset($_COOKIE['idioma'])){
        $_COOKIE['idioma']='ES';
    }
    
    $avInicioPrivado=[
        'descUsuario' => $_SESSION['userAMNDWESAplicacionFinal']->getDescUsuario(),
        'numConexiones' => $_SESSION['userAMNDWESAplicacionFinal']->getNumConexiones(),
        'fechaHoraUltimaConexionAnterior' => $_SESSION['userAMNDWESAplicacionFinal']->getFechaHoraUltimaConexionAnterior()
    ];

require_once $view["Layout"];
?>