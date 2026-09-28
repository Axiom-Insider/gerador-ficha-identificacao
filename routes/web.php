<?php

use App\Controllers\cursosController;
use App\Controllers\dadosController;
use App\Controllers\verificarController;
use App\Controllers\documentoController;
use App\Controllers\universidadesController;

$rota = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? 'home';

$dadosController = new dadosController();
$verificarController = new verificarController();
$documentoController = new documentoController();
$universidadesController = new universidadesController();
$cursosControllers = new cursosController();


switch ($rota) {
    case "/":
        $dadosController->index();
        break;
    case "/gerar":
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $documentoController->gerar();
        }
        break;
    case "/verificar":
        $verificarController->index();
        break;
    case "/universidades":
        $universidadesController->index();
        break;
    case "/universidades/criar":
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $universidadesController->criar();
        }
        break;

    case "/universidades/excluir":
        $universidadesController->apagar();
        break;

    case "/universidades/editar":
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $universidadesController->mudarNome();
        }
        $universidadesController->editar();
        break;

    case "/universidades/cursos":
        $cursosControllers->index();
        break;

    case "/cursos/criar":
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $cursosControllers->create();
        }
        break;

    case "/cursos/excluir":
        $cursosControllers->apagar();
        break;


    default:
        echo "404 - Página não encontrada";
        break;
}
