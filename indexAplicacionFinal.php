<?php
    
    /*
    * Autor: Alberto Méndez 
    * Fecha de actualización: 18/12/2025
    */

    require_once ("./config/confAPP.php"); //Incluimos el fichero de configuración de la APP.
    require_once ("./config/confDB.php"); //Incluimos el fichero de configuración de la BD.
    require_once "./model/Usuario.php";

    session_start(); //Iniciamos o recuperamos la sesión.
    
    
    if(!isset($_SESSION['paginaEnCurso'])){ //Si la página en curso no existe.
        $_SESSION['paginaEnCurso']='inicioPublico'; //La crea y le asigna el inicio público.
    }
    
    require_once ($controller[$_SESSION['paginaEnCurso']]); //Añade el fichero del controlador en base a la página en curso.
?>