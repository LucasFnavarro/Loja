<?php

$routes = [
    'inicio' => 'main@index',
    'loja' => 'main@loja',
    'carrinho' => 'main@carrinho',
    
    'cadastro' => 'main@cadastro_novo_user',
    'cadastro_user_submit' => 'main@cadastro_user_submit',

];

$actions = 'inicio';

if (isset($_GET['a'])) {

    if (!key_exists($_GET['a'], $routes)) {
        $actions = 'inicio';
    } else {
        $actions = $_GET['a'];
    }
}

$partys = explode('@', $routes[$actions]);
$controll = "core\\controllers\\" . ucfirst($partys[0]);
$method = $partys[1];

$ctr = new $controll();
$ctr->$method();
