<?php
    include('../../session.php');

    if($_SESSION['permissaoUsuario'] != 's'){
        header('Location: ../../index.php');
        exit;
    }
?>


<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link rel="stylesheet" href="../../main.css">
    <link rel="stylesheet" href="../dashboard.css">
    <link rel="stylesheet" href="inserir.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
</head>
<body>

<header>
        <!-- BARRA DE MENU -->
        <nav>
            <!-- LOGO -->
            <a href="../../index.php" class="" class="logo">
                <!-- Game Vault -->
                <img src="../../IMG/logo.png" alt="">
            </a>

            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            

            <!-- ITEMS DO MENU -->
            <ul class="nav-list">
                <li>Jogos</li>
                <li><a href="../dashboard.php">Ver dados</a></li>
                <li><a href="../inserir/inserir.php">Inserir dados</a></li>
                <li><a href="../deletar/deletar.php">Deletar dados</a></li>
                <li><a href="../atualizar/atualizar.php">Atualizar dados</a></li>
                <li><a href="../ver_produtos/verProdutos.php">Ver Items</a></li>
                <li><a href="inserirProduto.php">Novo item</a></li>
                <li><a href="../atualizar_produto/atualizarProduto.php">Atualizar produto</a></li>
                <li><a href="../deletar_produto/deletar.php">Deletar produto</a></li>
                <!-- <li><i class="bi bi-cart4"></i></li> -->
                <li><a href="../../login/login.php"><i class="bi bi-box-arrow-in-right"></i></a></li>
            </ul>
        </nav>
        <script src="../../mobile.js"></script>
    </header>

    <section>
        <center>
            
            <div id="container">
                <a href="../../index.php" class="logo">Game Vault</a>
                <label>Inserir Dados</label>

                <form method="POST">
                    <input type="text" name="nomeProduto" placeholder="Insira o nome do produto" required><br>
                    <input type="text" name="imagemProduto" placeholder="Insira o link da imagem" required><br>
                    <input type="text" name="valorProduto" placeholder="Insira o valor do produto" required><br><br>

                    <label class="radio-text" for="">Está em promoção?</label><br>

                    <input type="radio" value="S" name="promoProduto" required>
                    <label class="radio-text" for="">Sim</label><br>

                    <input type="radio" value="N" name="promoProduto">
                    <label class="radio-text" for="">Não</label><br>

                    <input type="submit">
                </form>
            </div>
            <?php

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $promo = $_POST['promoProduto'];
                    echo $promo;
                };

                include('../../login/conexao.php');

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nomeProduto = $_POST['nomeProduto'];
                    $imagemProduto = $_POST['imagemProduto'];
                    $valorProduto = $_POST['valorProduto'];
                    $promoProduto = $_POST['promoProduto'];

                    if (!empty($nomeProduto) && !empty($imagemProduto) && !empty($valorProduto) && !empty($promoProduto)) {
                        $sql = "INSERT INTO tbprodutos (nomeProduto, imagemProduto, valorProduto, promo) VALUES ('$nomeProduto', '$imagemProduto', '$valorProduto', '$promoProduto');";
                        $resultado = mysqli_query($conexao, $sql);

                        if ($resultado) {
                            echo "<script>alert('Registro inserido com sucesso');";
                        } else {
                            echo "Ocorreu um erro ao inserir o registro.";
                        }
                    } else {
                        echo "Por favor, preencha todos os campos.";
                    }
                }
            ?>


    </section>
    
</body>
</php>