<?php

    
    if(isset($_REQUEST['Cancelar'])){
        $_SESSION["paginaEnCurso"]=$_SESSION["paginaAnterior"];
        header("Location: indexAplicacionFinal.php");
        exit;
    }

    $aErrores=[
        'codUsuario' => null,
        'descUsuario' => null,
        'password' => null,
    ];
    
    $aRespuestas=[
        'codUsuario' => '',
        'descUsuario' => '',
        'password' => '',
    ];
    
    $entradaOK=true;
    
    if(isset($_REQUEST['Aceptar'])){
        
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        
        $aErrores['codUsuario']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'],8,4,1);
        $aErrores['descUsuario']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['desc'],8,4,1,1);
        $aErrores['password']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['pass'],255,4,1);
        
        foreach ($aErrores as $valorCampo => $error) {
            if ($error != null) {
                $entradaOK = false;
            }
        }
        
    
    if($entradaOK){
        
        $aRespuestas['codUsuario']=$_REQUEST['usuario'];
        $aRespuestas['descUsuario']=$_REQUEST['desc'];
        $aRespuestas['password']=$_REQUEST['pass'];
        
        $oUsuario= UsuarioPDO::registrarUsuario($aRespuestas['codUsuario'], $aRespuestas['descUsuario'], $aRespuestas['password']);
            
        if($oUsuario===null){
            $entradaOK=false;
            
            $_SESSION['errorRegistro']="Ha ocurrido un error al crear el usuario, compruebe los datos y inténtelo de nuevo.";
            $_SESSION['paginaEnCurso']='login';
            header('Location: indexAplicacionFinal.php');
            exit;
        }
        else{
            $_SESSION['userAMNDWESAplicacionFinal']=$oUsuario;
            $_SESSION['paginaEnCurso']='inicioPrivado';
            header('Location: indexAplicacionFinal.php');
            exit;
        }
       }
      }
      else{
          $entradaOK=false;
      }
    
    require_once $view["Layout"];
?>