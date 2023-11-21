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

            // Faz a consulta SQL baseado nos dados fornecidos nas variáveis $email
            $sql = "SELECT * FROM tblogin WHERE email = '$email';";

            // Executa o comando do $sql e armazena o resultado na variável $resultado
            $resultado = mysqli_query($conexao, $sql);

            // Verifica se encontrou algum registro
            if (mysqli_num_rows($resultado) > 0) {

                // Obtém os dados do registro
                $registro = mysqli_fetch_array($resultado);

                // Obtém a senha criptografada do banco de dados
                $senha_cript = $registro['senha'];

                // Verifica se a senha digitada corresponde à senha armazenada
                if (password_verify($senha, $senha_cript)) {

                    // Senha correta, continue com o processo de login
                    $nomeUsuario = $registro['nome'];
                    $permissaoUsuario = $registro['admin'];

                    $_SESSION['nomeUsuario'] = $nomeUsuario;
                    $_SESSION['permissaoUsuario'] = $permissaoUsuario;

                    // Pega a coluna ADMIN na variável REGISTRO
                    $admin = $registro['admin'];

                    // Verifica se o usuário é um administrador
                    if ($admin == 's') {
                        // Redireciona para o dashboard
                        header('Location: ../dashboard/dashboard.php');
                    } else {
                        // Se não for, redireciona para index.php
                        header('Location: ../index.php');
                        exit();
                    }
                } else {
                    // Senha incorreta
                    echo "<script>alert('E-mail ou senha incorretos'); window.location.href = 'login.php';</script>";
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
