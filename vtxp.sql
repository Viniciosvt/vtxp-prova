-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/12/2024 às 02:06
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vtxp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf_cnpj` varchar(150) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `telefone` varchar(150) NOT NULL,
  `categorias` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `foto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `cpf_cnpj`, `endereco`, `telefone`, `categorias`, `email`, `foto`) VALUES
(1, 'Machado', '21394812743', 'Rua Guilherme', '(32) 4239131321', 'Safadin', 'machado@gmail.com', 'c551c05c6a8c8a105e0d53d5bc709985.jpg'),
(2, 'Vinicios', '3226616900', 'Rua Joao Caro 290', '(42) 981291042', 'Bosta lixo cuzinho', 'viniciosvteixeira@gmail.com', '2543f40215e9cd7b1b27a6be2b3d5ddb.jpg'),
(3, 'Julia', '0924823947', 'Rua Visconde Bom Retiro ', '(42) marcha', 'Gostosinha meu amor', 'gopstosinah@gmail.com', 'images.jpg'),
(4, '4328907329', 'Rua Curitiba', '(42) 423253431', 'Salve', 'safadabunduda@gmail.com', 'Luana', 'cenoura_250834906.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `foto_forncedor`
--

CREATE TABLE `foto_forncedor` (
  `id` int(11) NOT NULL,
  `fornecedor_id` int(11) NOT NULL,
  `url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `foto_semente`
--

CREATE TABLE `foto_semente` (
  `id` int(150) NOT NULL,
  `semente_id` int(150) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `foto_semente`
--

INSERT INTO `foto_semente` (`id`, `semente_id`, `url`) VALUES
(1, 1, '0a0d78c84e5bac4b2fa715d97e6f1c78.jpg'),
(3, 2, 'ee32183a6148077d8559a6e80e76e77f.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sementes`
--

CREATE TABLE `sementes` (
  `id` int(150) NOT NULL,
  `nome_semente` varchar(150) NOT NULL,
  `dt_entrada` date NOT NULL,
  `dt_saida` date NOT NULL,
  `tipo_semente` varchar(150) NOT NULL,
  `fornecedor` varchar(150) NOT NULL,
  `foto_semente` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sementes`
--

INSERT INTO `sementes` (`id`, `nome_semente`, `dt_entrada`, `dt_saida`, `tipo_semente`, `fornecedor`, `foto_semente`) VALUES
(1, 'vinicios vaz teixeira', '2024-11-26', '2024-12-19', 'vinicios', 'vini@gmail.com', 'ee0bd7afcb0d30e433c31d89c7a95b20.jpg'),
(3, 'Abóbora', '2024-12-06', '2025-01-04', 'Cor alaranjada', 'Eduardo', 'eb495fc6c5a248d7e96c586ce8e1b4d2.jpg'),
(5, 'a', '2024-12-20', '2024-12-20', 'a', 'a', 'cenoura_250834906.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(100) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `permissoes` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `permissoes`) VALUES
(1, 'vini', 'vini@gmail.com', '$2y$10$vZa8G.6PpYQFWnM12nXEOe7rMq.6pMzvEFahIGe0EHOm0dvzRxHzu', 'add,edit,del,super'),
(2, 'Machado', 'machado@gmail.com', '202cb962ac59075b964b07152d234b70', 'add,edit,del,super');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `foto_forncedor`
--
ALTER TABLE `foto_forncedor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `foto_semente`
--
ALTER TABLE `foto_semente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sementes`
--
ALTER TABLE `sementes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `foto_forncedor`
--
ALTER TABLE `foto_forncedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `foto_semente`
--
ALTER TABLE `foto_semente`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sementes`
--
ALTER TABLE `sementes`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
