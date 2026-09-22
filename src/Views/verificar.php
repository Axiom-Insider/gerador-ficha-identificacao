<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar</title>
</head>

<body>
    <div class="form-container">

        <h1 class="titulo">Ficha de identificação individual</h1>
        <h3 class="subtitulo">Dados Acadêmico</h3>
        <form>
            <div class="linha">
                <div class="campo">
                    <label for="universidade">Instuição Pública de Ensino Superior (IPES):</label>
                    <select name="universidade" id="" required>
                        <option value="#" selected disabled>Selecione uma opção</option>
                        <option value="ads">
                            UNIVASF
                        </option>
                        <option value="eng">
                            PUBHF
                        </option>
                    </select>
                </div>
                <div class="campo">
                    <label for="curso">Curso:</label>
                    <select name="curso" id="" reqcursoired>
                        <option value="#" selected disabled>Selecione uma opção</option>
                        <option value="ads">
                            Análise e Desenvolvimento de Sistemas
                        </option>
                        <option value="eng">
                            Engenharia de Computação
                        </option>
                    </select>
                </div>
            </div>

            <div class="linha">
                <div class="campo">
                    <label for="nome-completo">Nome Completo:</label>
                    <input type="text" name="nome-completo" placeholder="Digite seu nome completo" required>
                </div>
                <div class="campo">
                    <label for="nome-social">Nome Social:</label>
                    <input type="text" name="nome-social" placeholder="Digite seu nome">
                </div>
            </div>

            <div class="linha">
                <div class="campo">
                    <label for="nome-mae">Nome da Mãe:</label>
                    <input type="text" name="nome-mae" placeholder="Digite da sua mãe" required>
                </div>
                <div class="campo">
                    <label for="nome-pai">Nome do Pai:</label>
                    <input type="text" name="nome-pai" placeholder="Digite do seu pai">
                </div>
            </div>

            <div class="tres">
                <div class="campo">
                    <label for="cpf">Número do CPF:</label>
                    <input type="text" name="cpf" placeholder="000.000.000-00" required>
                </div>
                <div class="campo">
                    <label for="data-nascimento">Data de Nascimento:</label>
                    <input type="date" name="data-nascimento">
                </div>
                <div class="campo">
                    <label for="nacionalidade">Nacionalidade:</label>
                    <input type="text" name="nacionalidade" placeholder="Digite sua nacionalidade">
                </div>
            </div>

            <div class="tres">
                <div class="campo">
                    <label for="estado-civil">Estado Civil:</label>
                    <select name="estado-civil" id="" reqcursoired>
                        <option value="#" selected disabled>Selecione uma opção</option>
                        <option value="solteiro">Solteiro(a)</option>
                        <option value="casado">Casado(a)</option>
                        <option value="separado">Separado(a)</option>
                        <option value="divorciado">Divorciado(a)</option>
                        <option value="viúvo">Viúvo(a)</option>
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
                            <input type="radio" name="sexo" value="masculino">
                            Masculino
                        </label>
                        <label class="radio-item">
                            <input type="radio" name="sexo" value="feminino">
                            Feminino
                        </label>
                        <label class="radio-item">
                            <input type="radio" name="sexo" value="intersexo">
                            Intersexo
                        </label>
                    </div>
                </div>
            </div>

            <div class="quatro">
                <div class="campo">
                    <label for="numero-identidade">Nº Doc. de Identidade:</label>
                    <input type="text" name="numero-identidade" placeholder="Digite Nº de documento" required>
                </div>
                <div class="campo">
                    <label for="data-expedicao">Data de Expedição:</label>
                    <input type="date" name="data-expedicao">
                </div>
                <div class="campo">
                    <label for="orgao-emissor">Órgão Emissor:</label>
                    <input type="text" name="orgao-emissor" placeholder="Ex: SSP">
                </div>
                <div class="campo">
                    <label for="uf-emissor">UF Emissor:</label>
                    <select name="estado-civil" id="" reqcursoired>
                        <option value="#" selected disabled>Selecione uma opção</option>
                    </select>
                </div>
            </div>

            <div class="linha">
                <div class="campo">
                    <label for="numero-militar">Documento Militar (R.A):</label>
                    <input type="text" name="numero-militar" placeholder="Digite Nº do R.A" required>
                </div>
            </div>

            <fieldset class="vinculacao">
                <legend>Vinculação:</legend>

                <label>
                    <input type="checkbox" name="vinculacao[]" value="ampla">
                    Ampla concorrência.
                </label>

                <label>
                    <input type="checkbox" name="vinculacao[]" value="negro">
                    Negro.
                </label>

                <label>
                    <input type="checkbox" name="vinculacao[]" value="indigena">
                    Indígena.
                </label>

                <label>
                    <input type="checkbox" name="vinculacao[]" value="cigano">
                    Cigano.
                </label>

                <label>
                    <input type="checkbox" name="vinculacao[]" value="quilombola">
                    Quilombola.
                </label>

                <label>
                    <input type="checkbox" name="vinculacao[]" value="professor">
                    Professor.
                </label>

                <label>
                    <input type="checkbox" name="vinculacao[]" value="pcd">
                    Pessoa com deficiência, com transtorno do espectro autista ou com altas habilidades/superdotação.
                </label>

                <label>
                    <input type="checkbox" name="vinculacao[]" value="agente">
                    Agente Público.
                </label>

                <label>
                    <input type="checkbox" name="vinculacao[]" value="trans">
                    Travestis, homens trans, mulheres trans e pessoas não binárias.
                </label>

                <label>
                    <input type="checkbox" name="vinculacao[]" value="ensino">
                    Vagas reservadas para egressos do Ensino Público.
                </label>

                <div class="outro">
                    <label>
                        <input type="checkbox" name="vinculacao[]" value="outro">
                        Outro:
                    </label>
                    <input type="text" name="outro" placeholder="Especifique">
                </div>
            </fieldset>

            <div class="um">
                <div class="necessidade-container">
                    <label class="titulo-necessidade">
                        Você apresenta algum tipo de necessidade educacional especial/deficiência?
                    </label>
                    <div class="necessidade-box">
                        <label class="radio-item">
                            <input type="radio" name="necessidade" value="nao">
                            Não
                        </label>
                        <label class="radio-item">
                            <input type="radio" name="necessidade" value="sim">
                            Sim/Qual:
                        </label>
                        <input type="text" name="necessidade_descricao" placeholder="Especifique">
                    </div>
                </div>

        </form>

</body>

</html>