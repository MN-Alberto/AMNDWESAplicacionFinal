<?php

/*
 * Autor: Alberto Méndez 
 * Fecha de actualización: 16/02/2026
 * 
 */

//indicamos que es un tipo json para el navegador lo entienda bien
header('Content-Type: application/json');

//variable que almacena el numero inicial
$inicio=(int)$_REQUEST['inicio'];

//variable que almacena el numero final
$fin=(int)$_REQUEST['fin'];

//si alguno de los dos numeros esta vacío devolvemos un error
if ($inicio == null || $fin == null) {
    echo json_encode(['error' => 'El número inicial y final deben contener algo']);
    exit;
}

//comprobamos si el numero inicial es mayor que el final, si es el caso los intercambiamos con una variable temporal $temp
if ($inicio>$fin) {
    $temp=$inicio;
    $inicio=$fin;
    $fin=$temp;
}

//almacenamos en la variable numeroAleatorio un numero generado dentro del rango pasano por los numeros inicial y final
$numeroAleatorio=rand($inicio, $fin);

//devolvemos un json con el numero inicial, el final y el numero generado
echo json_encode([
    'inicio' => $inicio,
    'fin' => $fin,
    'numeroAleatorio' => $numeroAleatorio
]);

?>