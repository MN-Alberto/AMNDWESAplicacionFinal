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

// variable que almacena la descripción que buscamos, si no hay nada esta vacia
$buscar= $_REQUEST['descripcion'] ?? "";

// almacenamos en esta variable la validación de lo introducido al buscar
$errorBuscar= validacionFormularios::comprobarAlfaNumerico($buscar, 255, 0, 0);

// si la variable contiene algo devolvemos un json con el error
if ($errorBuscar !== null) {
    header('Content-Type: application/json');
    echo json_encode([
        "error" => $errorBuscar,
    ]);
    exit;
}

// si todo ha ido bien, almacenamos en la variable usuarios la llamada al metodo para buscar el usuario en base a la descripcion
$usuarios= UsuarioPDO::buscarUsuarioPorDescripcion($buscar);

// variable para almacenar el resultado con los usuarios
$resultado=[];

// por cada usuario
foreach ($usuarios as $usuario) {
    
    // almacenamos en el array de resultado sus datos
    $resultado[] = [
        "codigoUsuario" => $usuario->getCodUsuario(),
        "descripcionUsuario" => $usuario->getDescUsuario(),
        "numConexiones" => $usuario->getNumConexiones(),
        "ultimaConexion" => $usuario->getFechaHoraUltimaConexion() ? $usuario->getFechaHoraUltimaConexion()->format("d-m-Y H:i:s") : null,
        "perfil" => $usuario->getPerfil()
    ];
}

// devolvemos un fichero json con todos los usuarios almacenados en la variable resultado
header('Content-Type: application/json');
echo json_encode($resultado);

?>