const imgs = document.getElementById("imgCarousselPromo");
const img = document.querySelectorAll("#imgCarousselPromo #itemPromo");
let idx = 0;

function carouselDireita(){
    idx++;
    if(idx > img.length - 3) {
        idx = 0;
    }

    imgs.style.transform = `translateX(${-idx * 395}px)`;
}

const direita = document.getElementById("direita");
direita.addEventListener("click", carouselDireita);



function carouselEsquerda() {
  idx--;
  if (idx < 0) {
    idx = img.length - 3;
  }

  imgs.style.transform = `translateX(${-idx * 395}px)`;
}

const esquerda = document.getElementById("esquerda");
esquerda.addEventListener("click", carouselEsquerda);
