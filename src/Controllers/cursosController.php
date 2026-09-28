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


    public function create()
    {
        if (!isset($_POST["nome_curso"]) || !isset($_POST["id_universidade"])) {
            header("Location: /universidades");
            exit;
        }

        $dados = universidadesController::lerUniversidades($this->arquivo);

        $id = $this->gerarProximoIdCurso($dados["cursos"]);

        $id_universidade = (int) $_POST['id_universidade'];
        $nome = $_POST['nome_curso'];

        $novoCurso = [
            "id" => $id,
            "nome" => $nome,
            "universidade_id" => $id_universidade
        ];

        $dados["cursos"][] = $novoCurso;

        file_put_contents($this->arquivo, json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        header("Location: /universidades/cursos?id=" . $id_universidade);
        exit;
    }

    public function apagar()
    {
        if (!isset($_GET["id"])) {
            header("Location: /universidades");
            exit;
        }

        $dados = universidadesController::lerUniversidades($this->arquivo);

        $id = (int) $_GET['id'];

        foreach ($dados["cursos"] as $key => $value) {
            if ($value["id"] === $id) {
                unset($dados["cursos"][$key]);

                break;
            }
        }

        file_put_contents($this->arquivo, json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        header("Location: /universidades");
        exit;
    }

    private function gerarProximoIdCurso(array $cursos)
    {
        if (empty($cursos)) {
            return 1;
        }

        $ids = array_column($cursos, 'id');

        return max($ids) + 1;
    }
}
