<?php

/*
 * Autor: Alberto Méndez 
 * Fecha de actualización: 16/02/2026
 * 
 */

header('Content-Type: application/json');

$inicio=(int)$_REQUEST['inicio'];
$fin=(int)$_REQUEST['fin'];


if ($inicio == null || $fin == null) {
    echo json_encode(['error' => 'El número inicial y final deben contener algo']);
    exit;
}

if ($inicio>$fin) {
    $temp=$inicio;
    $inicio=$fin;
    $fin=$temp;
}

$numeroAleatorio=rand($inicio, $fin);

echo json_encode([
    'inicio' => $inicio,
    'fin' => $fin,
    'numeroAleatorio' => $numeroAleatorio
]);

?>