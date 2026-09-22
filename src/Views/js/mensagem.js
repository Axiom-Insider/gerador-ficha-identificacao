const sucesso = document.getElementById("mensagemSucesso");
const erro = document.getElementById("mensagemErro");

if (sucesso) {

    const url = new URL(window.location.href);
    url.searchParams.delete("sucesso");

    window.history.replaceState(
        {},
        document.title,
        url.pathname
    );

    setTimeout(() => {

        sucesso.classList.add("esconder");

        setTimeout(() => {
            sucesso.remove();
        }, 500);

    }, 10000);

}


if (erro) {

    const url = new URL(window.location.href);
    url.searchParams.delete("erro");

    window.history.replaceState(
        {},
        document.title,
        url.pathname
    );

    setTimeout(() => {

        erro.classList.add("esconder");

        setTimeout(() => {
            erro.remove();
        }, 500);

    }, 10000);

}