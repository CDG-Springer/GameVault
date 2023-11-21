-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/11/2023 às 19:03
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

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
-- Estrutura para tabela `tblogin`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblogin`
--

INSERT INTO `tblogin` (`email`, `senha`, `admin`, `id`, `nome`, `cpf`, `dt_nasc`, `telefone`, `endereco`, `cep`, `numero`) VALUES
('admin', '$2y$10$DmaRXZ0xeMJWdLc3BquKAuUviwl6xRpF2Pb1DfTMxkOH4arCOoe5.', 's', 32, 'admin', 0, '2003-02-26', '', '', '', 0),
('ricardo@gmail.com', '$2y$10$V6DJcserDAwo2dktgW.SzuyrR9uFDhkb6s403QLaBxeqRkj7/zGie', '', 33, 'Ricardo', 0, '1989-02-18', '', '', '', 0),
('Lebar@gmail.com', '$2y$10$bCVPrisdLt7c7sTyq5Pb1uxZSKGk8cGxIpUCcfXO8DXugS5W7OdFi', '', 40, 'Lebar', 0, '2003-02-26', '', '', '', 0),
('gugas@gmail.com', '$2y$10$/jnjpnK44tMimP1TKyCOvetUkn00qq2hzVKtluTKnUD2UeKi/APhe', '', 41, 'Gustavo Gonçalves', 0, '1999-04-18', '', '', '', 0),
('matheusbarros@gmail.com', '$2y$10$LPOeDC8RQ/Z3rAX6FDG9bOZ2Fc2RDE4HTsV2pGtZw9jKwxCSs5HCm', '', 42, 'Matheus Barros', 0, '2002-07-26', '', '', '', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbprodutos`
--

CREATE TABLE `tbprodutos` (
  `id` int(255) NOT NULL,
  `nomeProduto` varchar(255) NOT NULL,
  `imagemProduto` varchar(255) NOT NULL,
  `valorProduto` varchar(255) NOT NULL,
  `promo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbprodutos`
--

INSERT INTO `tbprodutos` (`id`, `nomeProduto`, `imagemProduto`, `valorProduto`, `promo`) VALUES
(2, 'Elden Ring', 'https://image.api.playstation.com/vulcan/ap/rnd/202107/0902/A7nZdVLWTZmM1XWhZCzEu10U.jpg', '299', 'S'),
(3, 'Red Dead Redemption 2', 'https://image.api.playstation.com/gs2-sec/appkgo/prod/CUSA08519_00/12/i_3da1cf7c41dc7652f9b639e1680d96436773658668c7dc3930c441291095713b/i/icon0.png', '300', 'S'),
(4, 'Lies of P', 'https://image.api.playstation.com/vulcan/ap/rnd/202305/2308/06b354c8015b3c71e54f43aa883aab4641285d4a91734681.png', '199', 'N'),
(6, 'Star Field', 'https://sm.ign.com/ign_br/game/s/starfield/starfield_23ps.jpg', '299', 'S'),
(7, 'Armored Core VI', 'https://www.adrenaline.com.br/wp-content/plugins/seox-image-magick/imagick_convert.php?width=500&height=500&format=webp&quality=91&imagick=uploads.adrenaline.com.br/2023/07/armored-core-vi-fires-of-rubicon-armored-core-vi-fires-of-rubicon-capa.jpg', '199', 'S'),
(9, 'Dark Souls Remastered', 'https://image.api.playstation.com/cdn/UP0700/CUSA08692_00/JxilRmpXkS3CCXUnr0gZTBOlqso3plaw.png', '199', 'S'),
(10, 'Borderlands 3', 'https://image.api.playstation.com/vulcan/ap/rnd/202010/2323/p50N4PBK9rNanGYKFecTvac5.png', '19', 'N'),
(11, 'Dark Souls 3', 'https://static.bandainamcoent.eu/high/dark-souls/dark-souls-3/00-page-setup/ds3_game-thumbnail.jpg', '149', 'N'),
(13, 'Doom Eternal', 'https://www.arkade.com.br/wp-content/uploads/2020/03/doom-eternal-capa.jpeg', '59', 'N'),
(14, 'Baldurs Gate 3', 'https://cdn.wccftech.com/wp-content/uploads/2020/10/Baldurs-Gate-3-Preview-01-Header.jpg', '199', 'N'),
(15, 'Spider Man 2', 'https://assetsio.reedpopcdn.com/spider-man-2-cover.jpg?width=1200&height=1200&fit=bounds&quality=70&format=jpg&auto=webp', '299', 'N'),
(16, 'God of War RAGNAROK', 'https://upload.wikimedia.org/wikipedia/pt/a/a5/God_of_War_Ragnar%C3%B6k_capa.jpg', '159', 'N'),
(18, 'Battlefield IV', 'https://image.api.playstation.com/cdn/UP0006/CUSA00110_00/VaulrBDwbGorU7Ykfjg5sNrJ5X9resKm.png', '49', 'S'),
(19, 'Sekiro', 'https://upload.wikimedia.org/wikipedia/pt/7/7b/Sekiro_Shadows_Die_Twice_capa.png', '2', 'S');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbprodutos`
--
ALTER TABLE `tbprodutos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tblogin`
--
ALTER TABLE `tblogin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `tbprodutos`
--
ALTER TABLE `tbprodutos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
