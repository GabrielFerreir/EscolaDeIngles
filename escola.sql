-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Jul-2017 às 18:47
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escola`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `orgExp` varchar(8) NOT NULL,
  `dataNascimento` date NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `modulo` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `email`, `endereco`, `bairro`, `cidade`, `estado`, `cep`, `cpf`, `rg`, `orgExp`, `dataNascimento`, `telefone`, `celular`, `modulo`) VALUES
(34, 'Gustavo', 'Gustavo@gmail.com', 'Gu', 'GUGU', 'Franca', 'SP', '14402-336', '46690669866', '123456789101', 'SP-SEC', '1997-06-21', '992851348', '992851348', '1° modulo'),
(33, 'Joaquim', 'Joaquim@gmail.com', 'Jo', 'Joa', 'Franca', 'SP', '14402-336', '02057238829', '123456789101', 'SP-SEC', '1980-06-08', '992851348', '992851348', '1° modulo'),
(32, 'Joaquim', 'Joaquim@gmail.com', 'Jo', 'Joa', 'Franca', 'SP', '14402-336', '02057238829', '123456789101', 'SP-SEC', '1980-06-08', '992851348', '992851348', '1° modulo'),
(31, 'Joaquim', 'Joaquim@gmail.com', 'Jo', 'Joa', 'Franca', 'SP', '14402-336', '02057238829', '123456789101', 'SP-SEC', '1980-06-08', '992851348', '992851348', '1° modulo'),
(27, 'Adnan ', 'adnankjebailey@hotmail.com', 'Angelo Paludetto', 'Jardim', 'Franca', 'SP', '14402-222', '02057138828', '123456789101', 'SP-SEC', '1985-10-17', '992851348', '992851348', '1° modulo'),
(30, 'Lula', 'lulala@gmail.com', 'Lula', 'Lula', 'Franca', 'SP', '14402-336', '02057133828', '123456789101', 'SP-SEC', '1980-12-12', '99999999999', '1313131313', '1° modulo'),
(29, 'Joylson', 'JoYJo@gmail.com', 'Rua do Joylson', 'Aeroporto', 'Franca', 'SP', '14402-336', '46690669866', '123456789101', 'SP-SEC', '1999-02-10', '9192919121', '992851348', '1° modulo'),
(28, 'Sthan', 'Sthan@gmail.com', 'Rua do Sthan', 'Leporace', 'Franca', 'SP', '14402-336', '46690669866', '123456789101', 'SP-SEC', '1999-04-12', '9192919121', '992851348', '1° modulo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `id_despesa` int(12) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `valor` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`id_despesa`, `nome`, `data`, `valor`) VALUES
(1, 'Professor Roberto', '2017-07-05', '1500'),
(2, 'Marketing', '2017-06-25', '400'),
(3, 'Adnan', '2017-06-25', '700');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id_pagamento` int(12) NOT NULL,
  `id_alunos` int(12) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `mensalidade` int(12) NOT NULL,
  `data` date NOT NULL,
  `condicao` int(1) NOT NULL,
  `valor` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id_pagamento`, `id_alunos`, `tipo`, `mensalidade`, `data`, `condicao`, `valor`) VALUES
(11, 28, 'Mensalidade', 2, '2017-06-11', 0, '170'),
(10, 28, 'Mensalidade', 1, '2017-06-10', 1, '170'),
(4, 27, 'Mensalidade', 1, '2017-06-08', 1, '180'),
(5, 27, 'Mensalidade', 2, '2017-07-15', 1, '170'),
(6, 27, 'Mensalidade', 3, '2017-08-16', 1, '170'),
(7, 27, 'Mensalidade', 4, '2017-09-15', 1, '170'),
(8, 27, 'Mensalidade', 5, '2017-12-15', 0, '170'),
(9, 27, 'Mensalidade', 6, '2018-01-15', 0, '170'),
(12, 28, 'Mensalidade', 3, '2017-08-10', 0, '170'),
(13, 28, 'Mensalidade', 4, '2017-09-10', 0, '170'),
(14, 28, 'Mensalidade', 5, '2017-10-10', 0, '170'),
(15, 28, 'Mensalidade', 6, '2017-11-10', 0, '170'),
(16, 29, 'Mensalidade', 1, '2017-06-17', 1, '170'),
(17, 29, 'Mensalidade', 2, '2017-07-20', 1, '170'),
(18, 29, 'Mensalidade', 3, '2017-08-20', 1, '170'),
(19, 29, 'Mensalidade', 4, '2017-09-20', 1, '170'),
(20, 29, 'Mensalidade', 5, '2017-10-20', 0, '170'),
(21, 29, 'Mensalidade', 6, '2017-11-20', 0, '170'),
(22, 30, 'Mensalidade', 1, '2016-11-01', 1, '500'),
(23, 30, 'Mensalidade', 2, '2016-12-01', 1, '450'),
(24, 30, 'Mensalidade', 3, '2017-01-01', 1, '410'),
(25, 30, 'Mensalidade', 4, '2017-02-01', 1, '370'),
(26, 30, 'Mensalidade', 5, '2017-03-01', 1, '330'),
(27, 30, 'Mensalidade', 6, '2017-04-01', 1, '280'),
(29, 29, 'Reposição: 22/06/2017', 0, '2017-07-20', 1, '30'),
(30, 27, 'Reposição: 22/06/2017', 0, '2017-07-22', 1, '30'),
(31, 28, 'Reposição: 22/06/2017', 0, '2017-07-22', 1, '30'),
(32, 28, 'Reposição: 23/06/2017', 0, '2017-07-23', 1, '30'),
(33, 28, 'Reposição: 24/06/2017', 0, '2017-07-24', 1, '30'),
(34, 27, 'Reposição: 23/06/2017', 0, '2017-07-22', 1, '30'),
(35, 33, 'Mensalidade', 1, '2017-06-26', 0, '170'),
(36, 33, 'Mensalidade', 2, '2017-07-26', 0, '170'),
(37, 33, 'Mensalidade', 3, '2017-08-26', 0, '170'),
(38, 33, 'Mensalidade', 4, '2017-09-26', 0, '170'),
(39, 33, 'Mensalidade', 5, '2017-10-26', 0, '170'),
(40, 33, 'Mensalidade', 6, '2017-11-26', 0, '170'),
(41, 33, 'Mensalidade', 7, '2017-12-26', 0, '170'),
(42, 33, 'Mensalidade', 8, '2018-01-26', 0, '170'),
(43, 33, 'Mensalidade', 9, '2018-02-26', 0, '170'),
(44, 33, 'Mensalidade', 10, '2018-03-26', 0, '170'),
(45, 33, 'Mensalidade', 11, '2018-04-26', 0, '170'),
(46, 33, 'Mensalidade', 12, '2018-05-26', 0, '170'),
(47, 33, 'Mensalidade', 1, '2017-06-26', 0, '170'),
(48, 34, 'Mensalidade', 1, '2017-06-26', 1, '170'),
(49, 34, 'Mensalidade', 2, '2017-07-26', 0, '170'),
(50, 34, 'Mensalidade', 3, '2017-08-26', 0, '170'),
(51, 34, 'Mensalidade', 4, '2017-09-26', 0, '170'),
(52, 34, 'Mensalidade', 5, '2017-10-26', 0, '170'),
(53, 34, 'Mensalidade', 6, '2017-11-26', 0, '170'),
(54, 34, 'Mensalidade', 7, '2017-12-26', 0, '170'),
(55, 34, 'Mensalidade', 8, '2018-01-26', 0, '170'),
(56, 34, 'Mensalidade', 9, '2018-02-26', 0, '170'),
(57, 34, 'Mensalidade', 10, '2018-03-26', 0, '170'),
(58, 34, 'Mensalidade', 11, '2018-04-26', 0, '170'),
(59, 34, 'Mensalidade', 12, '2018-05-26', 0, '170');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`id_despesa`);

--
-- Indexes for table `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id_pagamento`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `despesas`
--
ALTER TABLE `despesas`
  MODIFY `id_despesa` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id_pagamento` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
