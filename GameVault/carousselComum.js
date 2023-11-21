const imgsComum = document.getElementById("imgCarousselJogosComuns");
const imgComum = document.querySelectorAll("#imgCarousselJogosComuns #itemComum");

let idxComum = 0;

function carousselComumDireita(){

    idxComum++

    if (idxComum > imgComum.length - 4) {
        idxComum = 0;
    }

    imgsComum.style.transform = `translateX(${-idxComum * 295}px)`;

    console.log('teste')

}

const direitaComum = document.getElementById("direitaComum")
direitaComum.addEventListener("click", carousselComumDireita)





function carouselEsquerdaComum() {
    idxComum--;
    if (idxComum < 0) {
      idxComum = imgComum.length - 4;
    }
  
    imgsComum.style.transform = `translateX(${-idxComum * 295}px)`;
  }
  
  const esquerdaComum = document.getElementById("esquerdaComum");
  esquerdaComum.addEventListener("click", carouselEsquerdaComum);
  