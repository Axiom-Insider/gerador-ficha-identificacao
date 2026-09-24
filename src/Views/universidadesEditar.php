<?php

/** @var string $nome */
/** @var int $id */
?>

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
    <div class="form-container">
        <h1 class="titulo">Editar Universidade</h1>
        <form action="/universidades/editar" method="POST">
            <div class="linha">
                <div class="campo">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <label for="nome">Nome da Universidade:</label>
                    <input type="text" name="nome_universidade" value="<?= $nome; ?>" id="universidade_nome">
                </div>
                <div class="acoes">
                    <button class="botao">Editar</button>
                </div>
            </div>
        </form>
    </div>
    <script src="/src/Views/js/universidade.js"></script>
    <script src="/src/Views/js/mensagem.js"></script>
</body>

</html>