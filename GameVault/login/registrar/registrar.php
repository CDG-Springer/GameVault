<?php
    include('../conexao.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nome = $_POST['nome'];
        $dt_nasc = $_POST['dt_nasc'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        if (!empty($nome) && !empty($senha) && !empty($email) && !empty($dt_nasc)) {

            // Verifica se o e-mail já existe
            $verifica = "SELECT * FROM tblogin WHERE email = '$email'";
            $resultado_verifica = mysqli_query($conexao, $verifica);

            if (mysqli_num_rows($resultado_verifica) > 0) {
                echo "<script>alert('E-mail já cadastrado'); window.location.href = 'cadastro.php';</script>";
            } else {
                // Insere o novo registro
                $sql = "INSERT INTO tblogin (email, senha, nome, dt_nasc) VALUES ('$email', '$senha', '$nome', '$dt_nasc')";
                $resultado = mysqli_query($conexao, $sql);

                if ($resultado) {
                    echo "<script>alert('Registro inserido com sucesso'); window.location.href = '../login.php';</script>";
                } else {
                    echo "Ocorreu um erro ao inserir o registro.";
                }
            }

        } else {
            echo "Por favor, preencha todos os campos.";
        }
    }
?>
