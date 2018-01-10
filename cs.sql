-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Dez-2017 às 21:34
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrossel`
--

CREATE TABLE `carrossel` (
  `id_carrossel` int(11) NOT NULL,
  `titulo_carrossel` varchar(255) NOT NULL COMMENT 'Texto principal',
  `comentario_carrossel` varchar(255) DEFAULT NULL,
  `id_imagem_carrossel` int(11) NOT NULL COMMENT 'Busca da tabela imagem',
  `data_cadastro_carrossel` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo_carrossel` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(255) NOT NULL,
  `id_imagem_cliente` int(11) NOT NULL COMMENT 'Logo do cliente',
  `url_cliente` varchar(255) DEFAULT NULL COMMENT 'Levar para a página do cliente',
  `data_cadastro_cliente` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo_cliente` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `id_imagem` int(11) NOT NULL,
  `id_categoria_imagem` int(11) DEFAULT NULL,
  `caminho_imagem` varchar(255) NOT NULL COMMENT 'Local físico no Sv',
  `nome_imagem` varchar(255) NOT NULL COMMENT 'Usando para ALT',
  `data_cadastro_imagem` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo_imagem` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_categoria`
--

CREATE TABLE `imagem_categoria` (
  `id_imagem_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(60) NOT NULL,
  `data_cadastro_categoria` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo_categoria` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nome_menu` varchar(255) NOT NULL,
  `comentario_menu` varchar(255) DEFAULT NULL,
  `url_menu` int(11) DEFAULT NULL,
  `data_cadastro_menu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo_menu` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE `noticia` (
  `id_noticia` int(11) NOT NULL,
  `titulo_noticia` varchar(255) NOT NULL,
  `texto_noticia` varchar(255) NOT NULL COMMENT 'Texto, com tags HTML para descrever a notícia na sua pg dedicada',
  `url_noticia` varchar(255) NOT NULL COMMENT 'Link para levar da home para a página da notícia',
  `imagem_noticia` int(11) DEFAULT NULL COMMENT 'Imagem da página principal. Se nula carregar uma imagem default',
  `imagem_banner_noticia` int(11) DEFAULT NULL COMMENT 'Imagem principal da página dedicada da notícia. Se nula carregar uma imagem default',
  `data_cadastro_noticia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo_noticia` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solucao`
--

CREATE TABLE `solucao` (
  `id_solucao` int(11) NOT NULL,
  `nome_solucao` varchar(255) NOT NULL,
  `url_solucao` varchar(255) DEFAULT NULL COMMENT 'Levar para página dedicada',
  `icone_solucao` int(11) DEFAULT NULL COMMENT 'Ícone da gestão. Se nula carregar uma imagem default',
  `icone_branco_solucao` int(11) DEFAULT NULL COMMENT 'Ícone branco, para card de destaque',
  `imagem_card_solucao` int(11) DEFAULT NULL COMMENT 'Imagem do card de destaque',
  `imagem_banner_solucao` int(11) DEFAULT NULL COMMENT 'Imagem principal da página dedicada da gestão',
  `comentario_solucao` varchar(255) DEFAULT NULL,
  `texto_solucao` text COMMENT 'Texto, com tags HTML para descrever a gestão na sua pg dedicada',
  `tags_solucao` varchar(255) DEFAULT NULL COMMENT 'Melhoria de SEO',
  `destaque_solucao` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Se ativo (1), faz com que a solucao fique na parte de destaques. Max 3',
  `ativo_solucao` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solucao_vantagem`
--

CREATE TABLE `solucao_vantagem` (
  `id_solucao_vantagem` int(11) NOT NULL,
  `id_solucao_sv` int(11) NOT NULL,
  `icone_sv` varchar(255) DEFAULT NULL,
  `texto_sv` varchar(255) DEFAULT NULL,
  `data_cadastro_sv` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `logon_usuario` varchar(255) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL,
  `nome_usuario` varchar(255) DEFAULT NULL,
  `data_cadastro_usuario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo_usuario` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrossel`
--
ALTER TABLE `carrossel`
  ADD PRIMARY KEY (`id_carrossel`),
  ADD KEY `fk_carrossel_imagem` (`id_imagem_carrossel`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fk_cliente_imagem` (`id_imagem_cliente`);

--
-- Indexes for table `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id_imagem`),
  ADD KEY `fk_imagem_imagem_categoria` (`id_categoria_imagem`);

--
-- Indexes for table `imagem_categoria`
--
ALTER TABLE `imagem_categoria`
  ADD PRIMARY KEY (`id_imagem_categoria`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indexes for table `solucao`
--
ALTER TABLE `solucao`
  ADD PRIMARY KEY (`id_solucao`);

--
-- Indexes for table `solucao_vantagem`
--
ALTER TABLE `solucao_vantagem`
  ADD PRIMARY KEY (`id_solucao_vantagem`),
  ADD KEY `fk_solucao_solucao_vantagem` (`id_solucao_sv`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrossel`
--
ALTER TABLE `carrossel`
  MODIFY `id_carrossel` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id_imagem` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `imagem_categoria`
--
ALTER TABLE `imagem_categoria`
  MODIFY `id_imagem_categoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `solucao`
--
ALTER TABLE `solucao`
  MODIFY `id_solucao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `carrossel`
--
ALTER TABLE `carrossel`
  ADD CONSTRAINT `fk_carrossel_imagem` FOREIGN KEY (`id_imagem_carrossel`) REFERENCES `imagem` (`id_imagem`);

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_imagem` FOREIGN KEY (`id_imagem_cliente`) REFERENCES `imagem` (`id_imagem`);

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `fk_imagem_imagem_categoria` FOREIGN KEY (`id_categoria_imagem`) REFERENCES `imagem_categoria` (`id_imagem_categoria`);

--
-- Limitadores para a tabela `solucao_vantagem`
--
ALTER TABLE `solucao_vantagem`
  ADD CONSTRAINT `fk_solucao_solucao_vantagem` FOREIGN KEY (`id_solucao_sv`) REFERENCES `solucao` (`id_solucao`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
