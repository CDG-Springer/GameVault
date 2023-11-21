const produtos = document.querySelectorAll('#produto');
const carrinho = document.getElementById('carrinho');
const bodyHtml = document.querySelector('body')


produtos.forEach(function (produto) {

    const nomeProduto = produto.dataset.nome;
    const valorProduto = produto.dataset.preco;

    produto.addEventListener('click', function() {


        const addCarrinho = document.createElement("div")
        addCarrinho.innerHTML = `Nome: ${nomeProduto}, Valor: R$ ${valorProduto}`

        carrinho.appendChild(addCarrinho)
    })
})


document.getElementById('carrinhoBotao').addEventListener('click', function() {
    var carrinhoContainer = document.getElementById('carrinho-container');
    
    carrinhoContainer.classList.toggle('posicao-direita');
    carrinhoContainer.classList.toggle('posicao-centralizada');

    bodyHtml.classList.toggle('lockScroll')
  });