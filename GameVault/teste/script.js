const imgs = document.getElementById("img")
const img = document.querySelectorAll("#img img")

let idx = 0

// caroussel pra direita
function carouselDireita(){
    idx++
    if(idx > img.length - 3) {
        idx = 0;
    }

    imgs.style.transform = `translateX(${-idx * 302}px)`
}

const direita = document.getElementById('direita')

direita.addEventListener('click', carouselDireita)

setInterval(carouselDireita, 10000)

// caroussel pra esquerda

function carouselEsquerda(){
    idx--;
    if (idx < 0) {
        idx = img.length - 3;
    }

    imgs.style.transform = `translateX(${-idx * 302}px)`;
}

const esquerda = document.getElementById('esquerda');
esquerda.addEventListener('click', carouselEsquerda);