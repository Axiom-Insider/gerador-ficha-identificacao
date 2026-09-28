<?php

/** @var array $cursos */
/** @var array $universidades */
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
        <h1 class="titulo">Cadastrar Cursos</h1>
        <form action="/cursos/criar" method="POST">
            <div class="tres">
                <div class="campo">
                    <label for="nome">Nome do Curso:</label>
                    <input type="text" name="nome_curso" id="curso_nome">
                </div>
                <div class="campo">
                    <label for="nome">Universidade:</label>
                    <select name="id_universidade" id="curso_nome">
                        <?php foreach ($universidades[0] as $universidade): ?>

                            <option
                                value="<?= $universidade['id'] ?>"
                                <?= $universidade['id'] == $id ? 'selected' : '' ?>>
                                <?= htmlspecialchars($universidade['nome']) ?>
                            </option>

                        <?php endforeach; ?>

                    </select>
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
                <?php foreach ($cursos as $curso): ?>
                    <tr">
                        <td><?= $curso["id"] ?></td>
                        <td><?= $curso["nome"] ?></td>
                        <td class="acoes">
                            <a href="/cursos/excluir?id=<?= $curso["id"]; ?></a>" class="btn-excluir">Excluir</a>
                        </td>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <script src="/src/Views/js/universidade.js"></script>
    <script src="/src/Views/js/mensagem.js"></script>
</body>

</html>