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
                <li><a href="inserir.php">Inserir dados</a></li>
                <li><a href="../deletar/deletar.php">Deletar dados</a></li>
                <li><a href="../atualizar/atualizar.php">Atualizar dados</a></li>
                <li><a href="../ver_produtos/verProdutos.php">Ver Items</a></li>
                <li><a href="../inserir_produto/inserirProduto.php">Novo item</a></li>
                <li><a href="../atualizar_produto/atualizarProduto.php">Atualizar produto</a></li>
                <li><a href="../deletar_produto/deletar.php">Deletar produto</a></li>
                <!-- <li><i class="bi bi-cart4"></i></li> -->
                <li><a href="../login/login.php"><i class="bi bi-box-arrow-in-right"></i></a></li>
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
                    <input type="text" name="email" placeholder="Insira o email" required><br>
                    <input type="text" name="senha" placeholder="Insira a senha" required><br>
                    <input type="text" name="nome" placeholder="Insira o nome" required><br>
                    <input type="date" name="dt_nasc" placeholder="Insira a data de nascimento" required><br>

                    <input type="submit">
                </form>
            </div>
            <?php
                include('../../login/conexao.php');

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $email = $_POST['email'];
                    $senha = $_POST['senha'];
                    $nome = $_POST['nome'];
                    $dt_nasc = $_POST['dt_nasc'];

                    if (!empty($email) && !empty($senha) && !empty($nome) && !empty($dt_nasc)) {
                        $sql = "INSERT INTO tblogin (email, senha, nome, dt_nasc) VALUES ('$email', '$senha', '$nome', '$dt_nasc')";
                        $resultado = mysqli_query($conexao, $sql);

                        if ($resultado) {
                            echo "<script>alert('Registro inserido com sucesso'); window.location.href = '../dashboard.php';</script>";
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