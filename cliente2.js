document.getElementById('form-cadastro').addEventListener('submit', function(event) {
    event.preventDefault();

    const nome = document.getElementById('nome').value;
    const telefone = document.getElementById('telefone').value;
    const cpf = document.getElementById('cpf').value;
    const endereco = document.getElementById('endereco').value;
    const bairro = document.getElementById('bairro').value;
    const cidade = document.getElementById('cidade').value;

    // Exemplo de como mostrar os dados no console
    console.log("Cadastro realizado:");
    console.log(`Nome: ${nome}`);
    console.log(`Telefone: ${telefone}`);
    console.log(`CPF: ${cpf}`);
    console.log(`Endereço: ${endereco}`);
    console.log(`Bairro: ${bairro}`);
    console.log(`Cidade: ${cidade}`);

    // Limpar o formulário
    document.getElementById('form-cadastro').reset();
});
