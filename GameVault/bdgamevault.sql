-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Maio-2023 às 21:45
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdgamevault`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblogin`
--

CREATE TABLE `tblogin` (
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `admin` char(1) NOT NULL,
  `id` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` int(11) NOT NULL,
  `dt_nasc` date NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `numero` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tblogin`
--

INSERT INTO `tblogin` (`email`, `senha`, `admin`, `id`, `nome`, `cpf`, `dt_nasc`, `telefone`, `endereco`, `cep`, `numero`) VALUES
('admin@admin.com', '123', 's', 0, 'admin', 0, '0001-01-01', '', '', '', 0),
('ricardo@gmail.com', '123', '', 1, 'Ricardo', 0, '1983-05-17', '', '', '', 0),
('yagogames@gmail.com', '1234', '', 2, 'Yago', 0, '2015-05-10', '', 'gominho', '', 0),
('radio@gmail.com', '489621', '', 13, 'Junior', 0, '1568-05-08', '', '', '', 0),
('gabriel@gmail.com', 'ashd', '', 17, 'Gabriel Almeida', 0, '2001-05-19', '', '', '', 0),
('randomggupkilla@gmail.com', '7895', '', 19, 'Santos ', 0, '2003-08-18', '', '', '', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tblogin`
--
ALTER TABLE `tblogin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
