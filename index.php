<?php
    include('session.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GV - Home</title>

    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="first.css">
    <link rel="stylesheet" href="slider.css">
    <link rel="stylesheet" href="caroussel.css">

    <script defer src="scrollanimation.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,200,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>
<body>

    <header>
        <!-- BARRA DE MENU -->
        <nav>

            <!-- LOGO -->
            <a href="" class="" class="logo">
                <!-- Game Vault -->
                <img src="IMG/logo.png" alt="">
            </a>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>

            <!-- ITEMS DO MENU -->
            <ul class="nav-list">
                <li><a href="#itemspage" onclick="scrollToSection(event)"><i class="bi bi-controller"></i></a></li>
                <li><i id="carrinhoBotao" class="bi bi-cart4"></i></li>
                    <?php
                        if (isset($_SESSION['permissaoUsuario']) && $_SESSION['permissaoUsuario'] == 's') {
                            echo '<li><a href="dashboard/dashboard.php"><i style="margin-top: 10px" class="material-symbols-outlined">dvr</i></a></li>';
                        }                                   
                    ?>
                <li>
                    <?php

                        if(isset($_SESSION['nomeUsuario'])) {
                            $nomeUsuario = $_SESSION['nomeUsuario'];
                            echo '<i class="bi bi-person"></i> &nbsp;&nbsp;' . $nomeUsuario . ' &nbsp;&nbsp;&nbsp;<a class="logout" href="encerrar_sessao.php"><i class="bi bi-box-arrow-right"></i></a>'; // Exibe o nome do usuário
                        } else {
                            echo '<a href="login/login.php"><i class="bi bi-box-arrow-in-right"></i></a>'; // Exibe o botão "Login"
                        }
                    ?>
                </li>
            </ul>

        </nav>
        <script src="mobile.js"></script>
    </header>


    <div id="carrinho-container">

        <div style="display: flex; align-items: center; flex-direction: column">

            <p>Seu Carrinho</p>
            <hr>

            <div id="carrinho">
                
            </div>

        </div>
    </div>

    <!-- SLIDESHOW -->
    <section id="frontpage">
        <!-- https://www.gamestore.pt/ -->

        <!-- Slideshow container -->
            <!-- Div Pai -->
            <div class="slideshow-container">

                <div class="mySlides fade">
                <!-- <div class="numbertext">2 / 6</div> -->
                    <div class="slide-content">
                        <img src="IMG/slider_ZELDA.webp" class="imagemslide">
                        <div class="text">ZELDA TEAR OF THE KINGDOMS</div>
                    </div>
                </div>

                <!-- Imagens de largura total com número e texto de legenda -->
            
                <div class="mySlides fade">
                <!-- <div class="numbertext">2 / 6</div> -->
                    <div class="slide-content">
                        <img src="IMG/slider_ER.webp" class="imagemslide">
                        <div class="text">ELDEN RING</div>
                    </div>
                </div>
            
                <div class="mySlides fade">
                    <!-- <div class="numbertext">3 / 6</div> -->
                    <div class="slide-content">
                        <img src="IMG/slider_MULTIMIDIA.webp" class="imagemslide">
                        <div class="text">MIDIA MULTIPLATAFORMAS</div>
                    </div>
                </div>
            
                <!--Botões seguinte e anterior -->
                <a class="prev" onclick="plusSlides(-1)" title="anterior">&#10094;</a>
                <a class="next" onclick="plusSlides(1)" title="próximo">&#10095;</a>
            </div>
            <br>
            
            <script>

                var slideIndex = 1;
                showSlides(slideIndex);
                
                // Controles seguinte / anterior
                function plusSlides(n) {
                    showSlides(slideIndex += n);
                }
                
                // Controles de imagem em miniatura
                function currentSlide(n) {
                    showSlides(slideIndex = n);
                }
                
                function showSlides(n) {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    var dots = document.getElementsByClassName("dot");
                    if (n > slides.length)
                    {
                    slideIndex = 1;
                    }
                    if (n < 1)
                    {
                    slideIndex = slides.length;
                    }
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex-1].style.display = "block";
                    dots[slideIndex-1].className += " active";
                }

            </script>
          

    </section>

    <!-- ITEMS A VENDA -->
    <section id="itemspage">
                                          <!-- -------- -->
                                          <!-- CARROUSEL PROMO -->
                                          <!-- -------- -->
        
            <div class="title hidden">
                <div class="line0" style="margin-right: 1%;"></div>
                <div class="text-title">
                    NOVIDADES <br>
                    <div class="mini">PROMOÇÕES</div>
                </div>
                <div class="line0" style="margin-left: 1%;"></div>
            </div>
        
        <div id="container-promocao">

        <span id="esquerda" class="material-symbols-outlined botaoCaroussel">arrow_back_ios</span>

            <div id="caroussel">
                <div class="containerCaroussel" id="imgCarousselPromo">

                    <?php

                        include('login/conexao.php');

                        $sql = $sql = "SELECT * FROM tbprodutos";
                        $resultado = mysqli_query($conexao, $sql);

                        while($reg = mysqli_fetch_array($resultado)){

                            if($reg['promo'] == 'S'){
                                echo '<div id="produto" class="itemHoverVIsible-container hidden" data-nome="'.$reg['nomeProduto'].'" data-preco="'.$reg['valorProduto'].'">
                                        <a>
                                            <img id="itemPromo" src="'.$reg['imagemProduto'].'" alt="">
                                            <i id="bag-icon" class="itemHoverVisible material-icons">shopping_bag</i><br>
                                            <p class="itemHoverVisible preco">R$'.$reg['valorProduto'].'</p>
                                        </a>
                                    </div>';
                            };

                        }
                    ?>

                </div>
            </div>
            <div class="clear"></div>

            <span id="direita" class="material-symbols-outlined botaoDireita botaoCaroussel">arrow_forward_ios</span>

            <script src="carousselPromo.js" defer></script>

        </div>

                                          <!-- -------- -->
                                          <!-- JOGOS NORMAIS -->
                                          <!-- -------- -->

            <div class="title hidden">
                <div class="line0" style="margin-right: 1%;"></div>
                <div class="text-title">
                    POPULARES <br>
                    <div class="mini">DESTAQUES</div>
                </div>
                <div class="line0" style="margin-left: 1%;"></div>
            </div>

        <div id="container-jogos">

            <span id="esquerdaComum" class="material-symbols-outlined botaoCaroussel">arrow_back_ios</span>

            <div id="carousselJogosComuns">

                <div class="containerCarousselComuns" id="imgCarousselJogosComuns">

                    <?php

                        include('login/conexao.php');

                        $sql = $sql = "SELECT * FROM tbprodutos";
                        $resultado = mysqli_query($conexao, $sql);

                        while($reg = mysqli_fetch_array($resultado)){

                            if($reg['promo'] == 'N'){
                                echo '<div id="produto" class="itemHoverVIsible-container hidden" data-nome="'.$reg['nomeProduto'].'" data-preco="'.$reg['valorProduto'].'">
                                    <a>
                                        <img id="itemComum" src="'.$reg['imagemProduto'].'" alt="">
                                        <i id="bag-icon" class="itemHoverVisible material-icons">shopping_bag</i><br><br><br>
                                        <p class="itemHoverVisible preco">R$'.$reg['valorProduto'].'</p>
                                    </a>
                                </div>';
                            
                            };

                        }
                    ?>

                </div>
            </div>
            <div class="clear"></div>

            <span id="direitaComum" class="material-symbols-outlined botaoDireita botaoCaroussel">arrow_forward_ios</span>
            
            <script src="carousselComum.js" defer></script>
            
        </div>

    </section>

    <center>
    <script src="carrinho.js" ></script>
    
    

                                          <!-- -------- -->
                                          <!-- FOOTER -->
                                          <!-- -------- -->

    <footer class="footer">
        <div class="containerfooter">
          <ul class="footer-text">
            © 2023 Game vault. Todos os direitos reservados.
          </ul>
        </div>
    </footer>
      
      
</body>
</html>