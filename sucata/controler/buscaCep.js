function buscaEndereco(cep) {
    let form = $("#form");

    $.ajax({
        url: "../controler/consultaCep.php?cep=" + cep,
        method: "GET",
        dataType: "json",
        success: function (endereco) {
            form.find("#logradouro").val(endereco.logradouro);
            form.find("#bairro").val(endereco.bairro);
            form.find("#localidade").val(endereco.localidade);
            form.find("#uf").val(endereco.uf);
        },
        error: function (error) {
            console.error('Falha inesperada: ' + error.statusText);
        }
    });
}

$(document).ready(function () {
    const inputCep = $("#cep");
    inputCep.on('keyup', function () {
        buscaEndereco(inputCep.val());
    });
});
