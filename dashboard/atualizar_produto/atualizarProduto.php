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
    <link rel="stylesheet" href="atualizarProduto.css">
    <link rel="stylesheet" href="../dashboard.css">
    
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
                <li><a href="atualizarProduto.php">Atualizar produto</a></li>
                <li><a href="../deletar_produto/deletar.php">Deletar produto</a></li>
                <li><a href="../../login/login.php"><i class="bi bi-box-arrow-in-right"></i></a></li>
            </ul>
        </nav>
        <script src="../../mobile.js"></script>
    </header>

    <section>
        <center>
    
            <div id="container">

                <a href="../../index.php" class="logo">Game Vault</a>
                <label>Alterar Produto</label>

                <form name="dados" method="post" action="">
                    <input type="text" placeholder="Insira o ID para alteração" name="id" size="5" maxlength="5" style="color: white; font-size:18px;"><br>
                    <input type="submit" name="btnpesquisar" value="Pesquisa" class="button"">
                </form>

                <?php

                    include("../../login/conexao.php");
                    if(isset($_POST['id']))
                    {
                        $codigo = $_POST['id'];
                        $sql = "select * from tbprodutos where id = ".$codigo;
                        $result = mysqli_query($conexao,$sql);
                        while($reg=mysqli_fetch_array($result))
                        {
                            echo "<form method='post'>";
                            echo "<input type='text' placeholder='Nome' name='idAlt' value='$reg[id]' style='width: 0; height: 0; opacity: 0'><br>";
                            echo "<input type='text' placeholder='Nome' name='nomeAlt' value='$reg[nomeProduto]'><br>";
                            echo "<input type='text' placeholder='Nome' name='imgAlt' value='$reg[imagemProduto]'><br>";
                            echo "<input type='text' placeholder='Senha' name='valorProduto' value='$reg[valorProduto]'><br>";
                            echo "<input type='text' placeholder='Promo' name='promoProduto' maxlength='1' value='$reg[promo]'><br>";
                            echo '<input type="submit" name="btnalterar" value="alterar">';
                            echo '</form>';

                        }
                    }
                ?>

                <?php
                    include ("../../login/conexao.php");
                    if(isset($_POST['btnalterar']))
                        {
                            $id = $_POST['idAlt'];
                            $nomeProduto = $_POST['nomeAlt'];
                            $imgProduto = $_POST['imgAlt'];
                            $valorProduto = $_POST['valorProduto'];
                            $promoProduto = $_POST['promoProduto'];

                            // Atualiza os dados na tabela tblogin
                            $sql = "UPDATE tbprodutos SET nomeProduto='$nomeProduto', imagemProduto='$imgProduto', valorProduto='$valorProduto', promo='$promoProduto' WHERE id=" . $id;
                            $result = mysqli_query($conexao, $sql);

                            if($result)
                            {
                                echo "<br><font size=4 color='green' face='verdana'>Dados alterados com sucesso</font><br><br>";
                            }
                            else
                            {
                                echo mysqli_error($conexao);
                            }
                        }

                ?>
            </div>

    </section>
    
</body>
</php>