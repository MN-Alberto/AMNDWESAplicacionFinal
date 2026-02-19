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

//almacenamos en la variable el usuario que hay en la sesion
$oUsuario=$_SESSION['userAMNDWESAplicacionFinal'];

//variable para los errores de los campos
$aErrores=[
    'password' => null,
    'nuevaPassword' => null,
    'repetirNuevaPassword' => null
];

//si clicamos en aceptar
if(isset($_REQUEST['Aceptar'])){
    //validamos cada campo con la libreria
    $aErrores['password'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['passActual'],255,4,1);
    $aErrores['nuevaPassword'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['pass'],255,4,1);
    $aErrores['repetirNuevaPassword'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['pass2'],255,4,1);

//comprobamos si ha habido algun error
    foreach ($aErrores as $valorCampo => $error) {
        if ($error != null) {
            $entradaOK = false;
        }
    }


//si el cifrado de la contraseña actual introducida es diferente de la contraseña del usuario de la sesion almacenamos un error y cambiamos la entrada a false
    if (hash('sha256', $_REQUEST['passActual']) != $oUsuario->getPassword()) {
        $aErrores['password'] = "La contraseña actual no es correcta";
        $entradaOK = false;
    }

//si la nueva contraseña 1 es diferente de la nueva contraseña 2 almacenamos un error y cambiamos a false
    if ($_REQUEST['pass'] != $_REQUEST['pass2']) {
        $aErrores['repetirNuevaPassword'] = "Las contraseñas nuevas no coinciden";
        $entradaOK = false;
    }


//si tras todo lo anterior la entrada sigue OK
    if($entradaOK){
        //llamamos al metodo cambiar password pasandole el usuario y la nueva contraseña
        $oUsuario = UsuarioPDO::cambiarPassword($oUsuario, $_REQUEST['pass']);
        $_SESSION['userAMNDWESAplicacionFinal'] = $oUsuario;

        //volvemos a la pagina de editar
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = "editar";

        header("Location: indexAplicacionFinal.php");
        exit;
    }
}

//llamamos a la vista
require_once $view['Layout'];
?>