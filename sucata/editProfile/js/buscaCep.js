const cepCliente = document.getElementById('cep');
let formCliente = document.getElementById('editForm');

cepCliente.addEventListener('keyup', async function () {
    const response = await fetch(`https://viacep.com.br/ws/${cepCliente.value}/json/`);

    if (response.ok) {
        const data = await response.json();

        formCliente.logradouro.value = data.logradouro || '';
        formCliente.bairro.value = data.bairro || '';
        formCliente.localidade.value = data.localidade || '';
        formCliente.uf.value = data.uf || '';
    }
});
