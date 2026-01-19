<?php

    /*
    * Autor: Alberto Méndez 
    * Fecha de actualización: 18/12/2025
    */

    if(isset($_REQUEST['Login'])){
        $_SESSION["paginaEnCurso"]="login";
        header("Location: indexAplicacionFinal.php");
        exit;
    }
    
    if(isset($_REQUEST['salir'])){
        session_destroy();
        header("Location: ../AMNDWESProyectoDWES/indexProyectoDWES.php");
        exit;
    }
    
    if(empty($_COOKIE['idioma'])){
        setcookie('idioma','ES',time() + 3600);
    }
    
    if(isset($_REQUEST['español'])){
        setcookie('idioma','ES',time() + 3600);
    }
    
    if(isset($_REQUEST['ingles'])){
        setcookie('idioma','EN',time() + 3600);
    }
    
    if(isset($_REQUEST['portugues'])){
        setcookie('idioma','PT',time() + 3600);
    }
    
    if(isset($_REQUEST['ruso'])){
        setcookie('idioma','RU',time() + 3600);
    }

    require_once $view["Layout"]; //Añadimos la página del layout accediendo a la clave del array correspondiente.
?>