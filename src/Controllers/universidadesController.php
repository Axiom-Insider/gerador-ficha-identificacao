<?php


namespace App\Controllers;

class universidadesController
{
    private string $arquivo = __DIR__ . "/../../dados.json";

    public function __construct() {}

    public function index()
    {
        require_once __DIR__ .  "/../Views/universidades.php";
    }

    public function editar()
    {

        if (!isset($_GET['id'])) {
            header("Location: /universidades");
            exit;
        }

        $id = (int) $_GET["id"];

        $dados = $this->lerUniversidades($this->arquivo);

        foreach ($dados['universidades'] as $indice => $universidade) {

            if ($universidade['id'] === $id) {

                $nome = $universidade["nome"];
            }
        }


        require_once __DIR__ . "/../Views/universidadesEditar.php";
    }

    public function mudarNome()
    {

        if (!isset($_POST['nome_universidade'])) {
            header("Location: /universidades");
            exit;
        }

        $id = (int) $_POST["id"];
        $nome =  $_POST["nome_universidade"];

        $dados = $this->lerUniversidades($this->arquivo);
        foreach ($dados['universidades']  as &$universidade) {

            if ($universidade['id'] === $id) {

                $universidade["nome"] = $nome;
            }
        }

        file_put_contents(
            $this->arquivo,
            json_encode(
                $dados,
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
            )
        );

        header("Location: /universidades");
        exit;
    }
    public function criar()
    {

        if (!isset($_POST['nome_universidade'])) {
            header("Location: /universidades");
            exit;
        }

        $dados = $this->lerUniversidades($this->arquivo);

        $idUniversidade = $this->gerarProximoId($dados["universidades"]);

        $novaUniversidade = [
            "id" => $idUniversidade,
            "nome" => $_POST['nome_universidade']
        ];

        $dados["universidades"][] = $novaUniversidade;

        file_put_contents(
            $this->arquivo,
            json_encode(
                $dados,
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
            )
        );

        header("Location: /universidades?sucesso=true");
        exit;
    }


    public function apagar()
    {
        if (!isset($_GET['id'])) {
            header("Location: /universidades");
            exit;
        }

        $id = (int) $_GET['id'];

        $dados = $this->lerUniversidades($this->arquivo);

        foreach ($dados['universidades'] as $indice => $universidade) {

            if ($universidade['id'] === $id) {

                unset($dados['universidades'][$indice]);

                break;
            }
        }

        $dados['universidades'] = array_values(
            $dados['universidades']
        );

        foreach ($dados['cursos'] as $indice => $curso) {

            if ($curso['universidade_id'] === $id) {

                unset($dados['cursos'][$indice]);
            }
        }

        $dados['cursos'] = array_values(
            $dados['cursos']
        );

        file_put_contents(
            $this->arquivo,
            json_encode(
                $dados,
                JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
            )
        );

        header("Location: /universidades");
        exit;
    }

    static function lerUniversidades(string $arquivo)
    {
        $json = file_get_contents($arquivo);

        return json_decode($json, true);
    }
    private function gerarProximoId(array $universidades)
    {
        if (empty($universidades)) {
            return 1;
        }

        $ids = array_column($universidades, 'id');

        return max($ids) + 1;
    }
}
