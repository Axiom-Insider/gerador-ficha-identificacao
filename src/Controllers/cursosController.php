<?php

namespace App\Controllers;

class CursosController
{
    private string $arquivo = __DIR__ . "/../../dados.json";

    public function index()
    {
        // Verifica se o parâmetro 'id' foi enviado na URL
        if (!isset($_GET['id'])) {
            header("Location: /universidades");
            exit;
        }

        $id = (int) $_GET['id'];

        // Lê os dados dos universidades
        $dados = UniversidadesController::lerUniversidades($this->arquivo);

        // Inicializa arrays para armazenar universidades e cursos
        $universidades = $dados["universidades"];
        $cursos = [];

        // Itera pelos cursos e filtra o curso com o id especificado
        foreach ($dados['cursos'] as $curso) {
            if ($curso['universidade_id'] === $id) {
                $cursos[] = $curso;
            }
        }

        // Carrega a view de cursos
        require_once __DIR__ . "/../Views/cursos.php";
    }

    public function create()
    {
        // Verifica se os dados de nome do curso e id da universidade foram enviados via POST
        if (!isset($_POST["nome_curso"]) || !isset($_POST["id_universidade"])) {
            header("Location: /universidades");
            exit;
        }

        // Lê os dados dos universidades
        $dados = UniversidadesController::lerUniversidades($this->arquivo);

        // Gera o próximo id do curso
        $id = $this->gerarProximoIdCurso($dados["cursos"]);

        // Obtém os dados do POST
        $id_universidade = (int) $_POST['id_universidade'];
        $nome = $_POST['nome_curso'];

        // Cria um novo curso
        $novoCurso = [
            "id" => $id,
            "nome" => $nome,
            "universidade_id" => $id_universidade
        ];

        // Adiciona o novo curso aos dados
        $dados["cursos"][] = $novoCurso;

        // Salva os dados no arquivo
        file_put_contents($this->arquivo, json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        // Redireciona para a página de cursos da universidade
        header("Location: /universidades/cursos?id=" . $id_universidade);
        exit;
    }

    public function apagar()
    {
        // Verifica se o parâmetro 'id' foi enviado na URL
        if (!isset($_GET["id"])) {
            header("Location: /universidades");
            exit;
        }

        $id = (int) $_GET['id'];

        // Lê os dados dos universidades
        $dados = UniversidadesController::lerUniversidades($this->arquivo);

        // Remove o curso com o id especificado
        foreach ($dados["cursos"] as $key => $curso) {
            if ($curso["id"] === $id) {
                unset($dados["cursos"][$key]);
                break;
            }
        }

        // Salva os dados no arquivo
        file_put_contents($this->arquivo, json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        // Redireciona para a página de universidades
        header("Location: /universidades");
        exit;
    }

    private function gerarProximoIdCurso(array $cursos)
    {
        // Se não houver cursos, retorna 1
        if (empty($cursos)) {
            return 1;
        }

        // Obtém os ids dos cursos e retorna o máximo + 1
        $ids = array_column($cursos, 'id');

        return max($ids) + 1;
    }
}
