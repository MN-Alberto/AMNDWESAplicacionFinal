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

$codUsuario = $_REQUEST['codUsuario'] ?? "";
$nuevaPassword = $_REQUEST['nuevaPassword'] ?? "";
$nuevaPasswordRepetir = $_REQUEST['nuevaPasswordRepetir'] ?? "";

$errorCodigo = validacionFormularios::comprobarAlfaNumerico($codUsuario, 255, 0,0);
$errorNuevaPassword = validacionFormularios::comprobarAlfaNumerico($nuevaPassword, 255, 1, 0);
$errorNuevaPasswordRepetir = validacionFormularios::comprobarAlfaNumerico($nuevaPasswordRepetir, 255, 1, 0);

if($errorCodigo != null || $errorNuevaPassword != null || $errorNuevaPasswordRepetir != null){
    header('Content-Type: application/json');
    echo json_encode([
        "error" => $errorCodigo ?? $errorNuevaPassword ?? $errorNuevaPasswordRepetir
    ]);
    exit;
}

$oUsuario = UsuarioPDO::buscarUsuarioPorCodigo($codUsuario);

if(!$oUsuario){
    header('Content-Type: application/json');
    echo json_encode([
        "error" => "Usuario no encontrado",
    ]);
    exit;
}

if ($nuevaPassword != $nuevaPasswordRepetir) {
    header('Content-Type: application/json');
    echo json_encode([
        "error" => "Las contraseñas no coinciden",
    ]);
    exit;
}

$oUsuario = UsuarioPDO::cambiarPassword($oUsuario, $nuevaPassword);

header('Content-Type: application/json');
echo json_encode([
    "codigo" => $codUsuario,
    "ok" => true,
    "mensaje" => "Contraseña cambiada con éxito"
]);

?>