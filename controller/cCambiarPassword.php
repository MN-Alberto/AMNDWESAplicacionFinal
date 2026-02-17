<?php

if(!isset($_SESSION['userAMNDWESAplicacionFinal'])){
    $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso']='inicioPublico';
    header("Location: indexAplicacionFinal.php");
    exit;
}

if(isset($_REQUEST['Cancelar'])){
    $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
    header("Location: indexAplicacionFinal.php");
    exit;
}


$entradaOK=true;

$oUsuario=$_SESSION['userAMNDWESAplicacionFinal'];

$aErrores=[
    'password' => null,
    'nuevaPassword' => null,
    'repetirNuevaPassword' => null
];


if(isset($_REQUEST['Aceptar'])){
    $aErrores['password'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['passActual'],255,4,1);
    $aErrores['nuevaPassword'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['pass'],255,4,1);
    $aErrores['repetirNuevaPassword'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['pass2'],255,4,1);


    foreach ($aErrores as $valorCampo => $error) {
        if ($error != null) {
            $entradaOK = false;
        }
    }


    if (hash('sha256', $_REQUEST['passActual']) != $oUsuario->getPassword()) {
        $aErrores['password'] = "La contraseña actual no es correcta";
        $entradaOK = false;
    }

    if ($_REQUEST['pass'] != $_REQUEST['pass2']) {
        $aErrores['repetirNuevaPassword'] = "Las contraseñas nuevas no coinciden";
        $entradaOK = false;
    }


    if($entradaOK){

        $oUsuario = UsuarioPDO::cambiarPassword($oUsuario, $_REQUEST['pass']);
        $_SESSION['userAMNDWESAplicacionFinal'] = $oUsuario;

        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = "editar";

        header("Location: indexAplicacionFinal.php");
        exit;
    }
}


require_once $view['Layout'];
?>