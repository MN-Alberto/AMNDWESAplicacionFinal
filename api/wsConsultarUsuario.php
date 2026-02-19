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

//variable del codUsuario a consultar
$codUsuario = $_REQUEST['codUsuario'] ?? "";

//validamos el codigo y almacenamos el posible error en errorCodigo
$errorCodigo= validacionFormularios::comprobarAlfaNumerico($codUsuario, 255, 0,0);

//comprobamos si ha habido algún error, si lo hay devolvemos un json con el error correspondiente
if($errorCodigo!=null){
    header('Content-Type: application/json');
    echo json_encode([
        "error" => $errorCodigo,
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

//declaramos un array asociativo para almacenar los datos del usuario
$resultado=[
    "codigo" => $usuario->getCodUsuario(),
    "descripcion" => $usuario->getDescUsuario(),
    "numConexiones" => $usuario->getNumConexiones(),
    "ultimaConexion" => $usuario->getFechaHoraUltimaConexion() ? $usuario->getFechaHoraUltimaConexion()->format("d-m-Y H:i:s") : (new DateTime())->format("d-m-Y H:i:s"),
    "perfil" => $usuario->getPerfil()
];


//devolvemos un json con los datos del usuario (el array)
header('Content-Type: application/json');
echo json_encode($resultado);
?>