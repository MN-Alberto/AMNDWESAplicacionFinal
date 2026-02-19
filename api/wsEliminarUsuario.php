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

//variable del codUsuario a eliminar
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

//llamamos al metodo eliminarUsuario pasandole el codUsuario a eliminar como parametro
$resultado = UsuarioPDO::eliminarUsuario($codUsuario);

//devolvemos un json con el codUsuario eliminado, todo OK y el mensaje de exito
header('Content-Type: application/json');
echo json_encode([
    "codigo" => $codUsuario,
    "ok" => true,
    "mensaje" => "Usuario eliminado correctamente"
    ]);

?>