const universidadeSelect = document.getElementById("universidade");
const cursoSelect = document.getElementById("curso");
const estadoSelect = document.getElementById("estado");
const municipioSelect = document.getElementById("municipio");
const distritoSelect = document.getElementById("distrito");
const ufSelect = document.getElementById("uf");
const estadoNome = document.getElementById("estado_nome");
const municipioNome = document.getElementById("municipio_nome");
const distritoNome = document.getElementById("distrito_nome");
const universidade_nome = document.getElementById("universidade_nome");
const curso_nome = document.getElementById("curso_nome");


let dados = null;


// Carregar estados
fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados")
    .then(response => response.json())
    .then(estados => {

        // Ordenar alfabeticamente
        estados.sort((a, b) => {
            return a.nome.localeCompare(b.nome, "pt-BR");
        });

        estados.forEach(estado => {
            const option = document.createElement("option");
            const option2 = document.createElement("option");
            option.value = estado.id;
            option.textContent = estado.nome;
            estadoSelect.appendChild(option);

            option2.value = estado.sigla;
            option2.textContent = estado.sigla;
            ufSelect.appendChild(option2);

        });

    })
    .catch(error => {
        console.error("Erro ao carregar estados:", error);
    });

// Quando escolher o estado
estadoSelect.addEventListener("change", function () {

    const estadoId = this.value;
    fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoId}`)
        .then(response => response.json())
        .then(estado => {
            console.log(estado.nome);

            estadoNome.value = estado.nome
        })
        .catch(error => {
            console.error("Erro ao carregar estados:", error);
        });

    // Limpa os municípios anteriores
    municipioSelect.innerHTML = `
        <option value="" selected disabled>
            Carregando municípios...
        </option>
    `;

    municipioSelect.disabled = true;

    // Buscar municípios do estado escolhido
    fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoId}/municipios`)
        .then(response => response.json())
        .then(municipios => {

            // Ordenar alfabeticamente
            municipios.sort((a, b) => {
                return a.nome.localeCompare(b.nome, "pt-BR");
            });

            // Limpar novamente
            municipioSelect.innerHTML = `
                <option value="" selected disabled>
                    Selecione o município
                </option>
            `;

            municipios.forEach(municipio => {

                const option = document.createElement("option");

                option.value = municipio.id;
                option.textContent = municipio.nome;
                municipioNome.value = municipio.nome;
                municipioSelect.appendChild(option);
            });

            municipioSelect.disabled = false;

        })
        .catch(error => {

            console.error("Erro ao carregar municípios:", error);

            municipioSelect.innerHTML = `
                <option value="" selected disabled>
                    Erro ao carregar municípios
                </option>
            `;

        });

});

// Quando escolher o municipio
municipioSelect.addEventListener("change", function () {

    const municipioId = this.value;

    fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/municipios/${municipioId}`)
        .then(response => response.json())
        .then(municipio => {
            console.log(municipio.nome);

            municipioNome.value = municipio.nome
        })
        .catch(error => {
            console.error("Erro ao carregar municipios:", error);
        });

    // Limpa os municípios anteriores
    distritoSelect.innerHTML = `
        <option value="" selected disabled>
            Carregando municípios...
        </option>
    `;

    distritoSelect.disabled = true;

    // Buscar municípios do estado escolhido
    fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/municipios/${municipioId}/distritos`)
        .then(response => response.json())
        .then(distrito => {

            // Ordenar alfabeticamente
            distrito.sort((a, b) => {
                return a.nome.localeCompare(b.nome, "pt-BR");
            });

            // Limpar novamente
            distritoSelect.innerHTML = `
                <option value="" selected disabled>
                    Selecione o município
                </option>
            `;

            distrito.forEach(distrito => {

                const option = document.createElement("option");

                option.value = distrito.id;
                option.textContent = distrito.nome;
                distritoNome.value = distrito.nome;
                distritoSelect.appendChild(option);
            });

            distritoSelect.disabled = false;

        })
        .catch(error => {

            console.error("Erro ao carregar municípios:", error);

            distritoSelect.innerHTML = `
                <option value="" selected disabled>
                    Erro ao carregar municípios
                </option>
            `;

        });

});


distritoSelect.addEventListener("change", function () {
    const distritoId = this.value;
    fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/distritos/${distritoId}`)
        .then(response => response.json())
        .then(distrito => {
            console.log(distrito[0].nome);

            distritoNome.value = distrito[0].nome
        })
        .catch(error => {
            console.error("Erro ao carregar municipios:", error);
        });
})

fetch("dados.json")
    .then(response => response.json())
    .then(json => {

        dados = json;

        carregarUniversidades();

    })
    .catch(error => {
        console.error("Erro ao carregar JSON:", error);
    });


function carregarUniversidades() {

    dados.universidades.forEach(universidade => {

        const option = document.createElement("option");

        option.value = universidade.id;
        option.textContent = universidade.nome;

        universidadeSelect.appendChild(option);

    });

}



universidadeSelect.addEventListener("change", function () {

    const universidadeId = Number(this.value);

    fetch("dados.json")
        .then(response => response.json())
        .then(json => {
            dados = json;
            dados.universidades.forEach(universidade => {
                if (universidade.id == universidadeId) {
                    universidade_nome.value = universidade.nome
                }
            });

        })
        .catch(error => {
            console.error("Erro ao carregar JSON:", error);
        });

    cursoSelect.innerHTML = `
        <option value="" selected disabled>
            Selecione o curso
        </option>
    `;

    const cursos = dados.cursos.filter(curso => {
        return curso.universidade_id === universidadeId;
    });

    cursos.forEach(curso => {

        const option = document.createElement("option");

        option.value = curso.id;
        option.textContent = curso.nome;

        cursoSelect.appendChild(option);

    });

});

cursoSelect.addEventListener("change", function () {
    cursoId = this.value
    fetch("dados.json")
        .then(response => response.json())
        .then(json => {
            dados = json;
            dados.cursos.forEach(cursos => {
                if (cursos.id == cursoId) {
                    curso_nome.value = cursos.nome
                }
            });

        })
        .catch(error => {
            console.error("Erro ao carregar JSON:", error);
        });
})