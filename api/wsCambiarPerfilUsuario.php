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

//variable que almacena el nuevo perfil del usuario
$nuevoPerfil = $_REQUEST['perfil'] ?? "";

//validamos el codigo y almacenamos el posible error en errorCodigo
$errorCodigo= validacionFormularios::comprobarAlfaNumerico($codUsuario, 255, 0,0);

//validamos el nuevo perfil y almacenamos el posible error en errorPerfil
$errorPerfil = validacionFormularios::comprobarAlfaNumerico($nuevoPerfil, 50, 1, 0);

//comprobamos si ha habido algún error, si lo hay devolvemos un json con el error correspondiente depende si es del codigo o el perfil
if($errorCodigo != null || $errorPerfil != null){
    header('Content-Type: application/json');
    echo json_encode([
        "error" => $errorCodigo ?? $errorPerfil
    ]);
    exit;
}

//comprobamos que el perfil nuevo no sea algo diferente de un perfil válido, en este caso algo distinto de usuario o administrador
if($nuevoPerfil !== 'usuario' && $nuevoPerfil !== 'administrador'){
    header('Content-Type: application/json');
    echo json_encode([
        "error" => "Perfil no valido"
    ]);
    exit;
}

//en la variable usuario llamamos al método buscarUsuarioPorCodigo pasandole el codigo del usuario que se pasa como parametro
$usuario= UsuarioPDO::buscarUsuarioPorCodigo($codUsuario);

//si el usuario no contiene nada devolvemos un json con el error usuario no encontrado
if(!$usuario){
    header('Content-Type: application/json');
    echo json_encode([
        "error" => "Usuario no encontrado",
    ]);
    exit;
}

//almacenamos en la variable la llamada al metodo cambiarPerfil pasandole el codigo del usuario a modificar y el nuevo perfil
$resultado = UsuarioPDO::cambiarPerfil($codUsuario, $nuevoPerfil);

//devolvemos el json con el codigo, el nuevo perfil, todo OK y el mensaje
header('Content-Type: application/json');
echo json_encode([
    "codigo" => $codUsuario,
    "nuevoPerfil" => $nuevoPerfil,
    "ok" => true,
    "mensaje" => "Perfil cambiado con exito"
    ]);

?>