const table = document.getElementById("tbody");

fetch("dados.json")
    .then(response => response.json())
    .then(json => {
        dados = json;
        dados.universidades.forEach(universidade => {
            table.innerHTML += `
            <tr>
            <td>${universidade.id}</td>
            <td>${universidade.nome}</td>
            <td class="acoes">
                <a href="/universidades/cursos?id=${universidade.id}" class="btn-cursos" >Cursos</a>
                <a href="/universidades/editar?id=${universidade.id}" class="btn-editar" >Editar</a>
                <a href="/universidades/excluir?id=${universidade.id}" class="btn-excluir" >Excluir</a>
            </td>
            </tr>
            `
        });

    })
    .catch(error => {
        console.error("Erro ao carregar JSON:", error);
    });
