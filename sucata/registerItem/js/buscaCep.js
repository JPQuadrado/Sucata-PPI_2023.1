const cep = document.querySelector('#cep');

let form = document.querySelector('form');

cep.onkeyup = async function () {
    const response = await fetch(`https://viacep.com.br/ws/${cep.value}/json/`)

    if (response.ok) {
        const data = await response.json();

        form.logradouro.value = data.logradouro;
        form.bairro.value = data.bairro;
        form.localidade.value = data.localidade;
        form.uf.value = data.uf;
    }
}