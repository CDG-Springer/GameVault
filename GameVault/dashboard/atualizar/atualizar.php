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
    <link rel="stylesheet" href="atualizar.css">
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
                <li><a href="atualizar.php">Atualizar dados</a></li>
                <li><a href="../ver_produtos/verProdutos.php">Ver Items</a></li>
                <li><a href="../inserir_produto/inserirProduto.php">Novo item</a></li>
                <li><a href="../atualizar_produto/atualizarProduto.php">Atualizar produto</a></li>
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
                <label>Alterar usuarios</label>

                <form name="dados" method="post" action="">
                    <input type="text" placeholder="Insira o ID para alteração" name="id" size="5" maxlength="5" style="color:red; font-size:18px;"><br>
                    <input type="submit" name="btnpesquisar" value="Pesquisa" class="button"">
                </form>

                <?php
                    include("../../login/conexao.php");
                    if(isset($_POST['id']))
                    {
                        $codigo = $_POST['id'];
                        $sql = "select * from tblogin where id = ".$codigo;
                        $result = mysqli_query($conexao,$sql);
                        while($reg=mysqli_fetch_array($result))
                        {
                            echo "<form method='post'>";
                            echo "<input type='text' placeholder='Nome' name='idalt' value='$reg[id]' style='width: 0; height: 0; opacity: 0'><br>";
                            echo "<input type='text' placeholder='Nome' name='nomealt' value='$reg[nome]'><br>";
                            echo "<input type='text' placeholder='Email' name='emailalt' value='$reg[email]'><br>";
                            echo "<input type='text' placeholder='Senha' name='senhaalt' value='$reg[senha]'><br>";
                            echo "<input type='date' placeholder='Data de Nascimento' name='dt_nascalt' value='$reg[dt_nasc]'><br>";
                            echo '<input type="submit" name="btnalterar" value="alterar">';
                            echo '</form';

                        }
                    }
                ?>

                <?php
                    include ("../../login/conexao.php");
                    if(isset($_POST['btnalterar']))
                        {
                            $id = $_POST['idalt'];
                            $nome = $_POST['nomealt'];
                            $email = $_POST['emailalt'];
                            $senha = $_POST['senhaalt'];
                            $dt_nasc = $_POST['dt_nascalt'];

                            // Atualiza os dados na tabela tblogin
                            $sql = "UPDATE tblogin SET nome='$nome', email='$email', senha='$senha', dt_nasc='$dt_nasc' WHERE id=".$id;
                            $result = mysqli_query($conexao, $sql);

                            if($result)
                            {
                                echo "<br><font size=4 color='green' face='verdana'>Dados alterados com sucesso</font><br><br>";
                            }
                            else
                            {
                                echo "<br><font size=4 color='red' face='verdana'>Erro ao alterar os dados</font><br><br>";
                            }
                        }

                ?>
            </div>

    </section>
    
</body>
</php>