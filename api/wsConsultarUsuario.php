<?php

/*
 * Autor: Alberto Méndez 
 * Fecha de actualización: 12/02/2026
 * 
 */


require_once '../core/libreriaValidacionFormulario.php';
require_once '../config/confDB.php';
require_once '../model/DBPDO.php';
require_once '../model/Usuario.php';
require_once '../model/UsuarioPDO.php';


$codUsuario = $_REQUEST['codUsuario'] ?? "";

$errorCodigo= validacionFormularios::comprobarAlfaNumerico($codUsuario, 255, 0,0);

if($errorCodigo!=null){
    header('Content-Type: application/json');
    echo json_encode([
        "error" => $errorCod,
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

$resultado=[
    "codigo" => $usuario->getCodUsuario(),
    "descripcion" => $usuario->getDescUsuario(),
    "numConexiones" => $usuario->getNumConexiones(),
    "ultimaConexion" => $usuario->getFechaHoraUltimaConexion() ? $usuario->getFechaHoraUltimaConexion()->format("d-m-Y H:i:s") : null,
    "perfil" => $usuario->getPerfil()
];

header('Content-Type: application/json');
echo json_encode($resultado);
?>