<?php

/*
 * Autor: Alberto Méndez 
 * Fecha de actualización: 06/02/2026
 * 
 */
    

require_once '../core/libreriaValidacionFormulario.php';
require_once '../config/confDB.php';
require_once '../model/DBPDO.php';
require_once '../model/Usuario.php';
require_once '../model/UsuarioPDO.php';


$buscar= $_REQUEST['buscar'] ?? "";

$errorBuscar= validacionFormularios::comprobarAlfaNumerico($buscar, 255, 0, 0);

if ($errorBuscar !== null) {
    header('Content-Type: application/json');
    echo json_encode([
        "error" => $errorBuscar,
    ]);
    exit;
}

$usuarios= UsuarioPDO::buscarUsuarioPorDescripcion($buscar);

$resultado=[];

foreach ($usuarios as $usuario) {
    $resultado[] = [
        "codigoUsuario" => $usuario->getCodUsuario(),
        "descripcionUsuario" => $usuario->getDescUsuario(),
        "numConexiones" => $usuario->getNumConexiones(),
        "ultimaConexion" => $usuario->getFechaHoraUltimaConexion() ? $usuario->getFechaHoraUltimaConexion()->format("d-m-Y H:i:s") : null,
        "perfil" => $usuario->getPerfil()
    ];
}

header('Content-Type: application/json');
echo json_encode($resultado);

?>