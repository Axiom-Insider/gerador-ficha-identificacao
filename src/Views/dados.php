<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrícula</title>
    <link rel="icon" type="image/x-icon" href="/src/Views/img/matricula.ico">
    <link rel="stylesheet" href="/src/Views/css/index.css">
    <link rel="stylesheet" href="/src/Views/css/dados.css">
</head>

<body>



    <?php if (isset($_GET["sucesso"])): ?>
        <div id="mensagemSucesso" class="alerta-sucesso">
            Documento salvo com sucesso!
        </div>
    <?php endif; ?>


    <?php if (isset($_GET["erro"])): ?>
        <div id="mensagemErro" class="alerta-erro">
            Erro ao salvar o documento!
        </div>
    <?php endif; ?>

    <div class="form-container">

        <h1 class="titulo">Ficha de identificação individual</h1>
        <h3 class="subtitulo">Dados Acadêmicos</h3>
        <form action="/gerar" method="post">
            <div class="linha">
                <div class="campo">
                    <label for="universidade">Instuição Pública de Ensino Superior (IPES):</label>
                    <select name="universidade" id="universidade" required>
                        <option value="#" selected disabled>Selecione uma opção</option>
                    </select>
                    <input type="hidden" name="universidade_nome" id="universidade_nome">
                </div>
                <div class="campo">
                    <label for="curso">Curso:</label>
                    <select name="curso" id="curso" required>
                        <option value="#" selected disabled>Selecione uma opção</option>
                    </select>
                    <input type="hidden" name="curso_nome" id="curso_nome">
                </div>
            </div>

            <div class="linha">
                <div class="campo">
                    <label for="nome-completo">Nome Completo:</label>
                    <input type="text" name="nome_completo" placeholder="Digite seu nome completo" required>
                </div>
                <div class="campo">
                    <label for="nome-social">Nome Social:</label>
                    <input type="text" name="nome_social" placeholder="Digite seu nome">
                </div>
            </div>

            <div class="linha">
                <div class="campo">
                    <label for="nome-mae">Nome da Mãe:</label>
                    <input type="text" name="nome_mae" placeholder="Digite da sua mãe">
                </div>
                <div class="campo">
                    <label for="nome-pai">Nome do Pai:</label>
                    <input type="text" name="nome_pai" placeholder="Digite do seu pai">
                </div>
            </div>

            <div class="tres">
                <div class="campo">
                    <label for="cpf">Número do CPF:</label>
                    <input type="text" name="cpf" id="cpf" placeholder="000.000.000-00" maxlength="15" inputmode="numeric" required>
                </div>
                <div class="campo">
                    <label for="data-nascimento">Data de Nascimento:</label>
                    <input type="date" name="data_nascimento" required>
                </div>
                <div class="campo">
                    <label for="nacionalidade">Nacionalidade:</label>
                    <input type="text" name="nacionalidade" placeholder="Digite sua nacionalidade" required>
                </div>
            </div>

            <div class="tres">
                <div class="campo">
                    <label for="estado-civil">Estado Civil:</label>
                    <select name="estado_civil" id="" required>
                        <option value="#" selected disabled>Selecione uma opção</option>
                        <option value="solteiro(a)">Solteiro(a)</option>
                        <option value="Casado(a)">Casado(a)</option>
                        <option value="Separado(a)">Separado(a)</option>
                        <option value="Divorciado(a)">Divorciado(a)</option>
                        <option value="Viúvo(a)">Viúvo(a)</option>
                        <option value="união estável">União Estável</option>
                        <option value="outro">Outro</option>
                    </select>
                </div>
                <div class="campo">
                    <label for="profissao">Profissão:</label>
                    <input type="text" name="profissao" placeholder="Digite sua profissão">
                </div>
                <div class="campo">
                    <label>Sexo:</label>
                    <div class="grupo-sexo">
                        <label class="radio-item">
                            <input type="radio" name="sexo" value="masculino" required>
                            Masculino
                        </label>
                        <label class="radio-item">
                            <input type="radio" name="sexo" value="feminino" required>
                            Feminino
                        </label>
                        <label class="radio-item">
                            <input type="radio" name="sexo" value="intersexo" required>
                            Intersexo
                        </label>
                    </div>
                </div>
            </div>

            <div class="quatro">
                <div class="campo">
                    <label for="numero-identidade">Nº Doc. de Identidade:</label>
                    <input type="text" name="rg" id="rg" placeholder="00.000.000-0" maxlength="15" inputmode="numeric" required>
                </div>
                <div class="campo">
                    <label for="data-expedicao">Data de Expedição:</label>
                    <input type="date" name="data_expedicao" required>
                </div>
                <div class="campo">
                    <label for="orgao-emissor">Órgão Emissor:</label>
                    <input type="text" name="orgao_emissor" placeholder="Ex: SSP" required>
                </div>
                <div class="campo">
                    <label for="uf-emissor">UF Emissor:</label>
                    <select name="uf" id="uf" required>
                        <option value="#" selected disabled>Selecione uma opção</option>
                    </select>
                </div>
            </div>

            <div class="linha">
                <div class="campo">
                    <label for="numero-militar">Documento Militar (R.A):</label>
                    <input type="text" name="numero_militar" placeholder="Digite Nº do R.A">
                </div>
            </div>

            <fieldset class="vinculacao">
                <legend>Vinculação:</legend>

                <label>
                    <input type="radio" name="vinculacao" id="vinculacoes" value="Ampla concorrência">
                    Ampla concorrência.
                </label>

                <label>
                    <input type="radio" name="vinculacao" id="vinculacoes" value="Negro">
                    Negro.
                </label>

                <label>
                    <input type="radio" name="vinculacao" id="vinculacoes" value="Indígena">
                    Indígena.
                </label>

                <label>
                    <input type="radio" name="vinculacao" id="vinculacoes" value="Cigano">
                    Cigano.
                </label>

                <label>
                    <input type="radio" name="vinculacao" id="vinculacoes" value="Quilombola">
                    Quilombola.
                </label>

                <label>
                    <input type="radio" name="vinculacao" id="vinculacoes" value="Professor">
                    Professor.
                </label>

                <label>
                    <input type="radio" name="vinculacao" id="vinculacoes" value="Pessoa com deficiência, com transtorno do espectro autista ou com altras habilidades/superdotação">
                    Pessoa com deficiência, com transtorno do espectro autista ou com altas habilidades/superdotação.
                </label>

                <label>
                    <input type="radio" name="vinculacao" id="vinculacoes" value="Agente público">
                    Agente Público.
                </label>

                <label>
                    <input type="radio" name="vinculacao" id="vinculacoes" value="Travestis, homens trans, mulheres, mulheres trans e pessoas não binárias">
                    Travestis, homens trans, mulheres trans e pessoas não binárias.
                </label>

                <label>
                    <input type="radio" name="vinculacao" id="vinculacoes" value="Vagas reservadas pra egressos do Ensino Público">
                    Vagas reservadas para egressos do Ensino Público.
                </label>

                <div class="outro">
                    <label>
                        <input type="radio" id="outro" class="vinculacaoRadio" name="vinculacao" value="outro">
                        Outro:
                    </label>
                    <input type="text" id="outroInput" name="vinculacao" placeholder="Especifique" disabled>
                </div>
            </fieldset>

            <div class="um">
                <div class="necessidade-container">
                    <label class="titulo-necessidade">
                        Você apresenta algum tipo de necessidade educacional especial/deficiência?
                    </label>
                    <div class="necessidade-box">
                        <label class="radio-item">
                            <input type="radio" name="necessidade" id="necessidadeRadioNao" value="nao">
                            Não
                        </label>
                        <label class="radio-item">
                            <input type="radio" name="necessidade" id="necessidadeRadioSim" value="sim">
                            Sim/Qual:
                        </label>
                        <input type="text" name="necessidade_descricao" id="necessidadeInput" placeholder="Especifique" disabled>
                    </div>
                </div>
            </div>

            <h3 class="subtitulo">Contato</h3>

            <div class="um">
                <div class="campo">
                    <label for="email">Email:</label>
                    <input type="text" name="email" placeholder="seuemail@exemplo.com" required>
                </div>
            </div>

            <div class="quatro">
                <div class="campo">
                    <label for="endereco">Endereço:</label>
                    <input type="text" name="endereco" placeholder="Rua / Avenida etc..." required>
                </div>
                <div class="campo">
                    <label for="numero">Número:</label>
                    <input type="number" name="numero" id="" placeholder="Nº" required>
                </div>
                <div class="campo">
                    <label for="bairro">Bairro:</label>
                    <input type="text" name="bairro" placeholder="Bairro" required>
                </div>
                <div class="campo">
                    <label for="CEP">CEP:</label>
                    <input type="text" name="CEP" placeholder="00000-000" required>
                </div>
            </div>

            <div class="tres">
                <div class="campo">
                    <label for="estado">Estado:</label>
                    <select name="estado" id="estado" required>
                        <option value="#" selected disabled>Selecione uma opção</option>
                    </select>
                    <input type="hidden" name="estado_nome" id="estado_nome" required>
                </div>
                <div class="campo">
                    <label for="municipio">Munícipio:</label>
                    <select name="municipio" id="municipio" required>
                        <option value="#" selected disabled>Selecione uma opção</option>
                    </select>
                    <input type="hidden" name="municipio_nome" id="municipio_nome">
                </div>
                <div class="campo">
                    <label for="distrito">Distrito:</label>
                    <select name="distrito" id="distrito" required>
                        <option value="#" selected disabled>Selecione uma opção</option>
                    </select>
                    <input type="hidden" name="distrito_nome" id="distrito_nome">
                </div>
            </div>

            <div class="quatro">
                <div class="campo">
                    <label for="telefone-celular1">Telefone Celular (1):</label>
                    <input type="text" id="celular1" name="celular1" placeholder="(00) 0000-0000" maxlength="15" inputmode="numeric" required>
                </div>
                <div class="campo">
                    <label for="telefone-celular2">Telefone Celular (2):</label>
                    <input type="text" id="celular2" name="celular2" placeholder="(00) 0000-0000" maxlength="15" inputmode="numeric">
                </div>
                <div class="campo">
                    <label for="telefone-residencial">Telefone Residencial:</label>
                    <input type="text" name="telefone_residencial" placeholder="(00) 0000-0000" maxlength="15" inputmode="numeric">
                </div>
                <div class="campo">
                    <label for="whatsapp">Whatsapp:</label>
                    <input type="text" name="whatsapp" id="whatsapp" placeholder="(00) 0000-0000" maxlength="15" inputmode="numeric">
                </div>
            </div>
            <div class="atencao">
                Antes de enviar, verifique atentamente todas as informações preenchidas.
                Confira seus dados pessoais, endereço, curso e demais informações do formulário.
            </div>
            <div class="acoes">
                <button class="botao">Proximo</button>
            </div>
        </form>

    </div>

    <script src="/src/Views/js/formulario.js"></script>
    <script src="/src/Views/js/mensagem.js"></script>
    <script src="/src/Views/js/validacao.js"></script>
</body>

</html>