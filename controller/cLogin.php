<?php

    /*
     * Autor: Alberto Méndez 
     * Fecha de actualización: 18/12/2025
     */

    require_once "./model/UsuarioPDO.php";
    require_once "./model/Usuario.php";
    
    
    if(isset($_REQUEST['Cancelar'])){
        session_destroy();
        $_SESSION["paginaEnCurso"]="inicioPublico";
        header("Location: indexAplicacionFinal.php");
        exit;
    }
    
    
    if(isset($_REQUEST['Registrarse'])){
        $_SESSION['paginaAnterior']=$_SESSION["paginaEnCurso"];
        $_SESSION["paginaEnCurso"]="registrarse";
        header("Location: indexAplicacionFinal.php");
        exit;
    }
    
    //array para almacenar los errores
    $aErrores=[
    'codUsuario' => null,
    'password' => null
    ];
   
    //variable para almacenar el estado de la entrada
    $entradaOK=true;
    
    //si el usuario pulsa en entrar
    if(isset($_REQUEST['Entrar'])){   
        
        //almacenamos la pagina anterior con la actual
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
    
        //validamos los campos
        $aErrores['codUsuario']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'], 255, 0, 0);
        $aErrores['password']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['pass'], 255, 1, 0);
        
        //comprobamos si ha habido algun error
        $entradaOK=true;
        foreach ($aErrores as $valorCampo => $error) {
            if ($error != null) {
                $entradaOK = false;
            }
        }

        //si todo ha ido bien
        if ($entradaOK) {
            
        //almacenamos los campos introducidos
        $codUsuario = $_REQUEST['usuario'];
        $password   = $_REQUEST['pass'];
        
        //validamos el usuario
        $usuario = UsuarioPDO::validarUsuario($codUsuario, $password);

        //si existe
        if ($usuario) {
            //cambiamos la ultima conexion anterior a la conexion de ahora
            $usuario->setFechaHoraUltimaConexionAnterior($usuario->getFechaHoraUltimaConexion());
            
            //almacenamos la ultima conexion
            $fechaAnterior = $usuario->getFechaHoraUltimaConexion();
            
            //actualizamos la ultima conexion
            UsuarioPDO::actualizarUltimaConexion($usuario->getCodUsuario());
            
            //cambiamos la ultimaAnterior con la de ahora
            $usuario->setFechaHoraUltimaConexionAnterior($fechaAnterior);
            
            //cambiamos la ultima conexion por la fecha actual
            $usuario->setFechaHoraUltimaConexion(new DateTime());

            //almacenamos el usuario en la sesion
            $_SESSION['userAMNDWESAplicacionFinal'] = $usuario;
            
            //redirigimos al inicio privado
            $_SESSION['paginaEnCurso'] = 'inicioPrivado';
            
            header("Location: indexAplicacionFinal.php");
            exit;
        } else {
            $entradaOK = false;
        }
    }
}

//llamamos a la vista
require_once $view["Layout"];