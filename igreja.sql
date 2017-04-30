-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Abr-2017 às 01:43
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `igreja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `valor` float NOT NULL,
  `vencimento` date NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`id`, `nome`, `tipo`, `valor`, `vencimento`, `funcionario_id`, `status`) VALUES
(1, 'luz', 'anual', 10023, '1992-07-25', 1, 0),
(2, 'luz', 'mensal', 500.63, '2007-07-25', 1, 0),
(3, 'luzes', 'anual', 50063, '0725-07-20', 1, 0),
(4, 'agua', 'mensal', 10000, '2017-07-30', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada`
--

CREATE TABLE `entrada` (
  `id` int(11) NOT NULL,
  `valor` decimal(20,2) NOT NULL,
  `data` date NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `menbro_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `entrada`
--

INSERT INTO `entrada` (`id`, `valor`, `data`, `tipo`, `menbro_id`, `status`) VALUES
(16, '526100.00', '2017-04-10', 'dizimo', 1, 0),
(17, '12.00', '2017-04-10', 'oferta', 1, 0),
(18, '16.49', '2017-04-10', 'dizimo', 1, 0),
(19, '1050.80', '2017-04-10', 'oferta', 1, 0),
(20, '1050.00', '2017-04-10', 'oferta', 1, 0),
(21, '56.36', '2017-04-10', 'oferta', 1, 0),
(22, '1000569.00', '2017-04-10', 'dizimo', 1, 0),
(23, '20000569.36', '2017-04-10', 'oferta', 1, 0),
(24, '3000000000.00', '2017-04-10', 'oferta', 1, 0),
(25, '50000000.00', '2017-04-10', 'dizimo', 1, 0),
(26, '1000000000000.00', '2017-04-10', 'oferta', 1, 0),
(27, '56.69', '2017-04-10', 'oferta', 1, 0),
(28, '1000000000.00', '2017-04-10', 'dizimo', 1, 0),
(29, '999999999999999999.99', '2017-04-10', 'dizimo', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `usuario`, `senha`, `cargo`) VALUES
(1, 'rafael faria ', 'rafa92', '$1$7x2.C/1.$X0JzzqR4SA/I4/9Gew0VI1', 'administrador'),
(16, 'Rafael Faria Ivo Pereira', 'rafa92ivp@hotmail.com', '$2y$10$oPDwmHPReflhwVN007mjLOQSoE/URE7ZXX4Bbo462MhoZKz1MQ5uu', 'administrador'),
(17, 'Rafael Faria Ivo Pereira', 'mariana ', '$2y$10$QdJ.eIPBPTjNOvJ30WIruuGb3TRr.eahZpJ.nZmNUKB9vUm29bQrW', 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menbro`
--

CREATE TABLE `menbro` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(9) NOT NULL,
  `telefone` varchar(10) NOT NULL,
  `nascimento` date NOT NULL,
  `cep` varchar(12) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `mae` varchar(45) NOT NULL,
  `pai` varchar(45) NOT NULL,
  `profissao` varchar(45) NOT NULL,
  `escolaridade` varchar(45) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `data_de_consagracao` date NOT NULL,
  `igreja` varchar(45) NOT NULL,
  `data_de_batismo` date NOT NULL,
  `data_de_transferencia` date DEFAULT NULL,
  `data_cadastro` date NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `menbro`
--

INSERT INTO `menbro` (`id`, `nome`, `cpf`, `rg`, `telefone`, `nascimento`, `cep`, `endereco`, `bairro`, `cidade`, `estado`, `mae`, `pai`, `profissao`, `escolaridade`, `cargo`, `data_de_consagracao`, `igreja`, `data_de_batismo`, `data_de_transferencia`, `data_cadastro`, `funcionario_id`, `status`) VALUES
(1, 'rafael faria ', '15127232740', '151272327', '21982-8209', '2015-09-16', '26530-010', 'rua antonio cardoso', 'centro', 'nilopolis', 'rj', 'mae', 'pai', 'ti', 'fundamental', 'Pastor', '2017-04-14', 'deus e fiel', '2017-04-11', '2017-04-14', '2017-04-02', 1, 1),
(23, 'Rafael Faria Ivo Pereira', '55555555523', '555555555', '77777-7777', '1992-07-25', '26530-010', 'Antônio Cardoso Leal', 'Centro', 'Nilópolis', 'RJ', 'maz', 'aaaa', 'aaaaa', 'fundamental', 'Presbitero', '1969-12-31', 'deusa', '1995-07-25', '1969-12-31', '2017-04-10', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_despesas_funcionario1_idx` (`funcionario_id`);

--
-- Indexes for table `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_entrada_menbro_idx` (`menbro_id`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `senha_UNIQUE` (`senha`),
  ADD UNIQUE KEY `login_UNIQUE` (`usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `menbro`
--
ALTER TABLE `menbro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD UNIQUE KEY `rg_UNIQUE` (`rg`),
  ADD KEY `fk_menbro_funcionario1_idx` (`funcionario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `despesas`
--
ALTER TABLE `despesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `menbro`
--
ALTER TABLE `menbro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `despesas`
--
ALTER TABLE `despesas`
  ADD CONSTRAINT `fk_despesas_funcionario1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `fk_entrada_menbro` FOREIGN KEY (`menbro_id`) REFERENCES `menbro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `menbro`
--
ALTER TABLE `menbro`
  ADD CONSTRAINT `fk_menbro_funcionario1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
