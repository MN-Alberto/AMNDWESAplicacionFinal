<?php

    if(!isset($_SESSION['userAMNDWESAplicacionFinal'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='inicioPublico';
        header("Location: indexAplicacionFinal.php");
        exit;
    }
    
    if(isset($_REQUEST['cerrar'])){
        $_SESSION['paginaEnCurso']=$_SERVER['paginaAnterior'];
        $_SESSION['paginaEnCurso']='mantenimientoDepartamento';
        header('Location: indexAplicacionFinal.php');
        exit;
    }
    
    $entradaOK=true;
    
    $aErrores=[
      'descDepartamento' => '',
      'volumenDeNegocio' => ''  
    ];
    
    $aRespuestas=[
      'descDepartamento' => '',
      'volumenDeNegocio' => '' 
    ];
    
    
    require_once $view['Layout'];
?>