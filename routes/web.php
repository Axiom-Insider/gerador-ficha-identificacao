<?php

use App\Controllers\dadosController;
use App\Controllers\verificarController;
use App\Controllers\documentoController;

$rota = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? 'home';

$dadosController = new dadosController();
$verificarController = new verificarController();
$documentoControoler = new documentoController();


switch ($rota) {
    case "/":
        $dadosController->index();
        break;
    case "/gerar":
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $documentoControoler->gerar();
        }
        break;
    case "/verificar":
        $verificarController->index();
        break;

    default:
        echo "404 - Página não encontrada";
        break;
}
