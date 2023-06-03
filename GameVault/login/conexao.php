<?php
    $local='localhost';
    $user='root';
    $pass='';
    $bd='bdgamevault';
    $conexao=mysqli_connect($local,$user,$pass,$bd);

    if (!$conexao) {
        echo "Erro ao conectar ao banco de dados: " . mysqli_connect_error();
        exit();
    }

?>