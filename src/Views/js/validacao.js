const rgInput = document.getElementById("rg");
const cpfInput = document.getElementById("cpf");
const necessidadeRadioNao = document.getElementById("necessidadeRadioNao");
const necessidadeRadioSim = document.getElementById("necessidadeRadioSim");
const necessidadeInput = document.getElementById("necessidadeInput");
const celular1 = document.getElementById("celular1");
const celular2 = document.getElementById("celular2");
const whatsapp = document.getElementById("whatsapp");



// whatsapp.addEventListener("input", function () {

//     let valor = this.value.replace(/\D/g, "");

//     valor = valor.substring(0, 11);

//     if (valor.length > 7) {

//         valor = valor.replace(
//             /^(\d{2})(\d{5})(\d{4})$/,
//             "($1) $2-$3"
//         );

//     } else if (valor.length > 2) {

//         valor = valor.replace(
//             /^(\d{2})(\d{0,5})$/,
//             "($1) $2"
//         );

//     } else if (valor.length > 0) {

//         valor = valor.replace(
//             /^(\d{0,2})$/,
//             "($1"
//         );
//     }

//     this.value = valor;
// });



// celular1.addEventListener("input", function () {

//     let valor = this.value.replace(/\D/g, "");

//     valor = valor.substring(0, 11);

//     if (valor.length > 7) {

//         valor = valor.replace(
//             /^(\d{2})(\d{5})(\d{4})$/,
//             "($1) $2-$3"
//         );

//     } else if (valor.length > 2) {

//         valor = valor.replace(
//             /^(\d{2})(\d{0,5})$/,
//             "($1) $2"
//         );

//     } else if (valor.length > 0) {

//         valor = valor.replace(
//             /^(\d{0,2})$/,
//             "($1"
//         );
//     }

//     this.value = valor;
// });


// celular2.addEventListener("input", function () {

//     let valor = this.value.replace(/\D/g, "");

//     valor = valor.substring(0, 11);

//     if (valor.length > 7) {

//         valor = valor.replace(
//             /^(\d{2})(\d{5})(\d{4})$/,
//             "($1) $2-$3"
//         );

//     } else if (valor.length > 2) {

//         valor = valor.replace(
//             /^(\d{2})(\d{0,5})$/,
//             "($1) $2"
//         );

//     } else if (valor.length > 0) {

//         valor = valor.replace(
//             /^(\d{0,2})$/,
//             "($1"
//         );
//     }

//     this.value = valor;
// });


const outro = document.getElementById("outro");
const outroInput = document.getElementById("outroInput");

const vinculacoes = document.querySelectorAll(
    'input[name="vinculacao"]'
);

vinculacoes.forEach((radio) => {

    radio.addEventListener("change", () => {

        if (outro.checked) {
            outroInput.disabled = false;
            outroInput.focus();
        } else {
            outroInput.disabled = true;
            outroInput.value = "";
        }

    });

});

necessidadeRadioNao.addEventListener("change", function () {

    if (!this.checked) {

        necessidadeInput.disabled = false;
        necessidadeInput.focus();

    } else {

        necessidadeInput.disabled = true;
        necessidadeInput.value = "";

    }

});

necessidadeRadioSim.addEventListener("change", function () {

    if (this.checked) {

        necessidadeInput.disabled = false;
        necessidadeInput.focus();

    } else {

        necessidadeInput.disabled = true;
        necessidadeInput.value = "";

    }

});

// cpfInput.addEventListener("input", function () {

//     // Remove tudo que não for número
//     let cpf = this.value.replace(/\D/g, "");

//     // Limita a 11 números
//     cpf = cpf.substring(0, 11);

//     // Aplica a máscara
//     if (cpf.length > 9) {

//         cpf = cpf.replace(
//             /^(\d{3})(\d{3})(\d{3})(\d{0,2})$/,
//             "$1.$2.$3-$4"
//         );

//     } else if (cpf.length > 6) {

//         cpf = cpf.replace(
//             /^(\d{3})(\d{3})(\d{0,3})$/,
//             "$1.$2.$3"
//         );

//     } else if (cpf.length > 3) {

//         cpf = cpf.replace(
//             /^(\d{3})(\d{0,3})$/,
//             "$1.$2"
//         );
//     }

//     this.value = cpf;
// });


// rgInput.addEventListener("input", function () {

//     let rg = this.value.replace(/\D/g, "");

//     // Limita a 9 números
//     rg = rg.substring(0, 9);

//     if (rg.length > 8) {

//         rg = rg.replace(
//             /^(\d{2})(\d{3})(\d{3})(\d{1})$/,
//             "$1.$2.$3-$4"
//         );

//     } else if (rg.length > 5) {

//         rg = rg.replace(
//             /^(\d{2})(\d{3})(\d{0,3})$/,
//             "$1.$2.$3"
//         );

//     } else if (rg.length > 2) {

//         rg = rg.replace(
//             /^(\d{2})(\d{0,3})$/,
//             "$1.$2"
//         );
//     }

//     this.value = rg;
// });