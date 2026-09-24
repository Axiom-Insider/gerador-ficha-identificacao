<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidade</title>
    <link rel="stylesheet" href="/src/Views/css/index.css">
    <link rel="stylesheet" href="/src/Views/css/dados.css">
    <link rel="stylesheet" href="/src/Views/css/universidade.css">
</head>

<body>

    <?php if (isset($_GET["sucesso"])): ?>
        <div id="mensagemSucesso" class="alerta-sucesso">
            Universidade salva com sucesso!
        </div>
    <?php endif; ?>


    <?php if (isset($_GET["erro"])): ?>
        <div id="mensagemErro" class="alerta-erro">
            Erro ao salvar Universidade!
        </div>
    <?php endif; ?>

    <div class="form-container">
        <h1 class="titulo">Cadastrar Universidade</h1>
        <form action="/universidades/criar" method="POST">
            <div class="linha">
                <div class="campo">
                    <label for="nome">Nome da Universidade:</label>
                    <input type="text" name="nome_universidade" id="universidade_nome">
                </div>
                <div class="acoes">
                    <button class="botao">Criar</button>
                </div>
            </div>
        </form>

        <table id="universidade">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody id="tbody">

            </tbody>
        </table>

    </div>
    <script src="/src/Views/js/universidade.js"></script>
    <script src="/src/Views/js/mensagem.js"></script>
</body>

</html>