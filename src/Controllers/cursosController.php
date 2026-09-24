<?php


namespace App\Controllers;


class cursosController
{
    private string $arquivo = __DIR__ . "/../../dados.json";

    public function index()
    {

        if (!isset($_GET['id'])) {
            header("Location: /universidades");
            exit;
        }

        $id = (int) $_GET['id'];

        $cursos = [];
        $universidades = [];


        $dados = universidadesController::lerUniversidades($this->arquivo);

        $universidades[] = $dados["universidades"];
        foreach ($dados['cursos'] as $indice => $curso) {

            if ($curso['universidade_id'] === $id) {

                $cursos[] = $curso;
            }
        }

        require_once __DIR__ .  "/../Views/cursos.php";
    }
}
