<?php
    include('conexao.php');
    include('../session.php');

    // Recebe os dados do formulário
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

    // Verifica se o email e senha foram informados
    if ($email != '' && $senha != '') {
        // Conecta ao banco de dados
        if ($conexao) {

            // faz a consulta SQL baseado nos dados fornecidos nas variaveis $email e $senha
            $sql = "SELECT * FROM tblogin WHERE email = '$email' && senha = '$senha';";

            // executa o comando do $sql e armaena o resultado na variavel $resultado
            $resultado = mysqli_query($conexao, $sql);

            // Verifica se encontrou algum registro, se o resultado for maior que 0, executar o comando
            if (mysqli_num_rows($resultado) > 0) {
                // Obtém os dados do registro
                $registro = mysqli_fetch_array($resultado);

                $nomeUsuario = $registro['nome'];
                $permissaoUsuario = $registro['admin'];

                $_SESSION['nomeUsuario'] = $nomeUsuario;
                $_SESSION['permissaoUsuario'] = $permissaoUsuario;

                // pega a coluna ADMIN na variavel REGISTRO 
                $admin = $registro['admin'];

                // Verifica se o usuário é um administrador, se sim, ele tme acesso ao dashboard
                if ($admin == 's') {
                    // Redireciona para o dashboard
                    header('Location: ../dashboard/verDados.php');
                } else {
                    // Se não for, edireciona para index.php
                    header('Location: ../index.php');
                    exit();
                }
            } else {
                // Se não encontrou nada, exibe uma mensagem de erro
                echo "<script>alert('E-mail ou senha incorretos'); window.location.href = 'login.php';</script>";
            }
        } else {
            // Se não conseguiu conectar ao banco de dados, exibe uma mensagem de erro
            echo "Erro ao conectar ao banco de dados: " . mysqli_connect_error();
            exit();
        }
    } else {
        // Se e-mail ou senha não foram preenchidos, exibe uma mensagem de erro
        echo "<script>alert('Por favor, preencha todos os campos'); window.location.href = 'login.php';</script>";
    }

?>