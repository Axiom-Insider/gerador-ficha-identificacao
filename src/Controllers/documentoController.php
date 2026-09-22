<?php


namespace App\Controllers;

use App\Helpers\Logger;
use Exception;
use PhpOffice\PhpWord\TemplateProcessor;
use Throwable;

class documentoController
{

    public function __construct() {}


    public function gerar()
    {
        try {
            $vinculacao = $_POST["vinculacao"] ?? [];
            $data_expedicao = $_POST["data_expedicao"];
            $data_nascimento = $_POST["data_nascimento"];
            $dados = [
                "universidade" => $_POST["universidade_nome"] ?? "",
                "curso" => $_POST["curso_nome"] ?? "",
                "nome_completo" => $_POST["nome_completo"] ?? "",
                "nome_social" => $_POST["nome_social"] ?? "",
                "nome_mae" => $_POST["nome_mae"] ?? "",
                "nome_pai" => $_POST["nome_pai"] ?? "",
                "cpf" => $_POST["cpf"] ?? "",
                "datan" => date("d/m/Y", strtotime($data_nascimento)) ?? "",
                "nacionalidade" => $_POST["nacionalidade"] ?? "",
                "estado_civil" => $_POST["estado_civil"] ?? "",
                "profissao" => $_POST["profissao"] ?? "",
                "sexo" => $_POST["sexo"] ?? "",
                "ndoc" => $_POST["rg"] ?? "",
                "datae" =>  date("d/m/Y", strtotime($data_expedicao)) ?? "",
                "oe" => $_POST["orgao_emissor"] ?? "",
                "uf" => $_POST["uf"] ?? "",
                "dmilitar" => $_POST["numero_militar"] ?? "",
                "outro" => $_POST["outro"] ?? "",
                "vinculacao" => empty($vinculacao) ? "Nenhuma" : $vinculacao,
                "necessidade" =>  $_POST["necessidade_descricao"] ?? "não",
                "email" => $_POST["email"] ?? "",
                "endereco" => $_POST["endereco"] ?? "",
                "n" => $_POST["numero"] ?? "",
                "bairro" => $_POST["bairro"] ?? "",
                "cep" => $_POST["CEP"] ?? "",
                "estado" => $_POST["estado_nome"] ?? "",
                "municipio" => $_POST["municipio_nome"] ?? "",
                "distrito" => $_POST["distrito_nome"] ?? "",
                "celular1" => $_POST["celular1"] ?? "",
                "celular2" => $_POST["celular2"] ?? "",
                "telefone" => $_POST["telefone_residencial"] ?? "",
                "whatsapp" => $_POST["whatsapp"] ?? "",
            ];

            $documento = new TemplateProcessor(__DIR__ . "/../../templates/ficha.docx");


            foreach ($dados as $key => $value) {
                $value = trim($value);
                if ($key != "email") $value = mb_strtoupper($value, 'UTF-8');

                $documento->setValue($key, $value);
            }

            $nome = $dados['nome_completo'] ?? '';
            $primeiroNome = explode(' ', trim($nome))[0] ?: 'Sem-Nome';
            $universidade = $dados['universidade'] ?? 'Sem-Universidade';
            $cpf = preg_replace('/[^a-zA-Z0-9]/', '', $dados['cpf'] ?? '');
            $arquivo = "ficha-{$primeiroNome}-{$universidade}-{$cpf}" . ".docx";

            $caminho = __DIR__ . '/../../storage/' . $arquivo;

            $documento->saveAs($caminho);

            // Documento criado com sucesso
            Logger::sucesso("Documento Criado com sucesso: " . $dados['cpf']);
            header("Location: /?sucesso=true");
            exit;
        } catch (Throwable $e) {

            Logger::erro($e->getMessage());

            header("Location: /");
            exit;
        }
    }
}
