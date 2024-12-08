-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/12/2024 às 00:35
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
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `foto_semente` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sementes`
--

INSERT INTO `sementes` (`id`, `nome_semente`, `dt_entrada`, `dt_saida`, `tipo_semente`, `fornecedor`, `foto_semente`) VALUES
(1, 'vinicios vaz teixeira', '2024-11-26', '0000-00-00', 'vinicios', 'vini@gmail.com', '');

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
(1, 'vini', 'vini@gmail.com', '$2y$10$fxakdcp75Dntd9yA43OVg.XEoa/lTGCKhkLc2mrqxXZkta.vDxgaC', 'add,edit,del,super');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
