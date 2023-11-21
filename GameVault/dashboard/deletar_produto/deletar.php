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
    <link rel="stylesheet" href="deletar.css">
    
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
                <li><a href="../inserir_produto/inserirProduto.php">Novo item</a></li>
                <li><a href="../atualizar_produto/atualizarProduto.php">Atualizar produto</a></li>
                <li><a href="deletar.php">Deletar produto</a></li>
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
                <label>Deletar Produto</label>

                <form method="POST" class="form-container">
                    <input type="number" name="id" placeholder="Insira o ID"><br>
                    <input type="submit">
                </form>

                <?php

                    include('../../login/conexao.php');

                    if (isset($_POST['id'])) {

                        $id = $_POST['id'];
                        $sql = 'DELETE FROM tbprodutos WHERE id = ' . $id;
                        $resultado = mysqli_query($conexao, $sql);

                        if ($resultado) {

                            echo "<script>alert('Deletado com sucesso'); window.location.href = '../dashboard.php';</script>";

                        } else {
                            echo "Ocorreu um erro ao excluir o registro.";
                        }
                    }
                ?>

            </div>

    </section>
    
</body>
</php>