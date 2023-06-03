<?php
    include('../conexao.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $dt_nasc = $_POST['dt_nasc'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if (!empty($nome) && !empty($senha) && !empty($nome) && !empty($dt_nasc)) {
            $sql = "INSERT INTO tblogin (email, senha, nome, dt_nasc) VALUES ('$email', '$senha', '$nome', '$dt_nasc')";
            $resultado = mysqli_query($conexao, $sql);

            if ($resultado) {
                echo "<script>alert('Registro inserido com sucesso'); window.location.href = '../login.php';</script>";
            } else {
                echo "Ocorreu um erro ao inserir o registro.";
            }
        } else {
            echo "Por favor, preencha todos os campos.";
        }
    }
?>