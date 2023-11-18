const cepCliente = document.getElementById('cepCliente');
const cepCoperativa = document.getElementById('cepCooperativa');
let formCliente = document.getElementById('cliente');
let formCoperativa = document.getElementById('cooperativa');

cepCliente.addEventListener('input', async function () {
    const response = await fetch(`https://viacep.com.br/ws/${cepCliente.value}/json/`);

    if (response.ok) {
        const data = await response.json();

        formCliente.logradouro.value = data.logradouro || '';
        formCliente.bairro.value = data.bairro || '';
        formCliente.localidade.value = data.localidade || '';
        formCliente.uf.value = data.uf || '';
    }
});

cepCoperativa.addEventListener('input', async function () {
    const response = await fetch(`https://viacep.com.br/ws/${cepCoperativa.value}/json/`);

    if (response.ok) {
        const data = await response.json();

        formCoperativa.logradouro.value = data.logradouro || '';
        formCoperativa.bairro.value = data.bairro || '';
        formCoperativa.localidade.value = data.localidade || '';
        formCoperativa.uf.value = data.uf || '';
    }
});
