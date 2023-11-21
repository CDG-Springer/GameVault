document.addEventListener("DOMContentLoaded", function () {
    const produtos = document.querySelectorAll("#produtos li");
    const carrinho = document.getElementById("carrinho");
  
    produtos.forEach(function (produto) {
      const botaoAdicionar = produto.querySelector(".adicionar");
      botaoAdicionar.addEventListener("click", function () {
        const nome = produto.dataset.nome;
        const preco = parseFloat(produto.dataset.preco);
  
        adicionarAoCarrinho(nome, preco);
      });
    });
  
    function adicionarAoCarrinho(nome, preco) {
      const elementoCarrinho = document.createElement("div");
      elementoCarrinho.innerHTML = `${nome} - R$ ${preco.toFixed(2)}`;
      carrinho.appendChild(elementoCarrinho);
    }
  });
  