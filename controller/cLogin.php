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
    
    $aErrores=[
    'codUsuario' => null,
    'password' => null
    ];
   

    $entradaOK=true;
    
    if(isset($_REQUEST['Entrar'])){   
    
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
    
        $aErrores['codUsuario']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'], 255, 0, 0);
        $aErrores['password']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['pass'], 255, 1, 0);
        
        $entradaOK=true;
        foreach ($aErrores as $valorCampo => $error) {
            if ($error != null) {
                $entradaOK = false;
            }
        }

        if ($entradaOK) {
        $codUsuario = $_REQUEST['usuario'];
        $password   = $_REQUEST['pass'];
        
        $usuario = UsuarioPDO::validarUsuario($codUsuario, $password);

        if ($usuario) {
            // $usuario->setFechaHoraUltimaConexionAnterior($usuario->getFechaHoraUltimaConexion());
            UsuarioPDO::actualizarUltimaConexion($usuario->getCodUsuario());

            $_SESSION['userAMNDWESAplicacionFinal'] = $usuario;
            $_SESSION['paginaEnCurso'] = 'inicioPrivado';
            
            header("Location: indexAplicacionFinal.php");
            exit;
        } else {
            $entradaOK = false;
        }
    }
}

require_once $view["Layout"];