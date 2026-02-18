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
$nuevoPerfil = $_REQUEST['perfil'] ?? "";

$errorCodigo= validacionFormularios::comprobarAlfaNumerico($codUsuario, 255, 0,0);
$errorPerfil = validacionFormularios::comprobarAlfaNumerico($nuevoPerfil, 50, 1, 0);

if($errorCodigo != null || $errorPerfil != null){
    header('Content-Type: application/json');
    echo json_encode([
        "error" => $errorCodigo ?? $errorPerfil
    ]);
    exit;
}

if($nuevoPerfil !== 'usuario' && $nuevoPerfil !== 'administrador'){
    header('Content-Type: application/json');
    echo json_encode([
        "error" => "Perfil no valido"
    ]);
    exit;
}

$usuario= UsuarioPDO::buscarUsuarioPorCodigo($codUsuario);

if(!$usuario){
    header('Content-Type: application/json');
    echo json_encode([
        "error" => "Usuario no encontrado",
    ]);
    exit;
}

$resultado = UsuarioPDO::cambiarPerfil($codUsuario, $nuevoPerfil);

header('Content-Type: application/json');
echo json_encode([
    "codigo" => $codUsuario,
    "nuevoPerfil" => $nuevoPerfil,
    "ok" => true,
    "mensaje" => "Perfil cambiado con exito"
    ]);

?>