<?php

/*
 * Autor: Alberto Méndez 
 * Fecha de actualización: 17/02/2026
 * 
 */

require_once '../core/libreriaValidacionFormulario.php';
require_once '../config/confDB.php';
require_once '../model/DBPDO.php';
require_once '../model/Usuario.php';
require_once '../model/UsuarioPDO.php';

//variable que almacena el codigo de usuario a modificar
$codUsuario = $_REQUEST['codUsuario'] ?? "";

//variable que almacena la password anterior del usuario
$passwordAnterior = $_REQUEST['passwordAnterior'] ?? "";

//variable que almacena la nueva password del usuario
$nuevaPassword = $_REQUEST['nuevaPassword'] ?? "";

//variable que almacena la nueva password del usuario repetida
$nuevaPasswordRepetir = $_REQUEST['nuevaPasswordRepetir'] ?? "";

//validamos el codigo y almacenamos el posible error en errorCodigo
$errorCodigo = validacionFormularios::comprobarAlfaNumerico($codUsuario, 255, 0,0);

//validamos la contraseña actual
$errorPasswordActual = validacionFormularios::comprobarAlfaNumerico($passwordAnterior, 255, 1, 0);

//validamos la nueva contraseña
$errorNuevaPassword = validacionFormularios::comprobarAlfaNumerico($nuevaPassword, 255, 1, 0);

//validamos la nueva contraseña repetida
$errorNuevaPasswordRepetir = validacionFormularios::comprobarAlfaNumerico($nuevaPasswordRepetir, 255, 1, 0);

//comprobamos si ha habido algún error, si lo hay devolvemos un json con el error correspondiente
if($errorCodigo != null || $errorPasswordActual != null || $errorNuevaPassword != null || $errorNuevaPasswordRepetir != null){
    header('Content-Type: application/json');
    echo json_encode([
        "error" => $errorCodigo ?? $errorPasswordActual ?? $errorNuevaPassword ?? $errorNuevaPasswordRepetir
    ]);
    exit;
}

//en la variable usuario llamamos al método buscarUsuarioPorCodigo pasandole el codigo del usuario que se pasa como parametro
$oUsuario= UsuarioPDO::buscarUsuarioPorCodigo($codUsuario);

//si el usuario no contiene nada devolvemos un json con el error usuario no encontrado
if(!$oUsuario){
    header('Content-Type: application/json');
    echo json_encode([
        "error" => "Usuario no encontrado",
    ]);
    exit;
}

//comporbamos que la contraseña acutal cifrada introducidaa sea la misma que la del usuario actual, si no devolvemos un error
if (hash('sha256', $passwordAnterior) != $oUsuario->getPassword()) {
        header('Content-Type: application/json');
        echo json_encode([
            "error" => "Contraseña actual incorrecta",
        ]);
        exit;
    }

//si la nueva contraseña 1 es diferente de la nueva contraseña 2 devolvemos un error
    if ($nuevaPassword != $nuevaPasswordRepetir) {
        header('Content-Type: application/json');
        echo json_encode([
            "error" => "Las contraseñas no coinciden",
        ]);
        exit;
    }

//almacenamos en la variable la llamada al metodo cambiarPassword pasandole el codigo del usuario a modificar y el nuevo password
$oUsuario = UsuarioPDO::cambiarPassword($oUsuario, $nuevaPassword);

//devolvemos el json con el codigo, todo OK y el mensaje
header('Content-Type: application/json');
echo json_encode([
    "codigo" => $codUsuario,
    "ok" => true,
    "mensaje" => "Contraseña cambiada con exito"
    ]);

?>