-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 15-Abr-2019 às 20:51
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_autor`
--

CREATE TABLE `tb_autor` (
  `aut_id` decimal(28,0) NOT NULL,
  `aut_dtnasc` date NOT NULL,
  `aut_nome` varchar(70) NOT NULL,
  `aut_sexo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_editora`
--

CREATE TABLE `tb_editora` (
  `edi_id` decimal(28,0) NOT NULL,
  `edi_nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_emprestimo`
--

CREATE TABLE `tb_emprestimo` (
  `emp_id` decimal(28,0) NOT NULL,
  `tb_lei_id` decimal(28,0) NOT NULL,
  `tb_livro_liv_id` decimal(28,0) NOT NULL,
  `tb_funcionario_fun_id` decimal(28,0) NOT NULL,
  `emp_data` date NOT NULL,
  `emp_data_devolucao` date NOT NULL,
  `emp_data_entregue` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_endereco`
--

CREATE TABLE `tb_endereco` (
  `end_id` decimal(28,0) NOT NULL,
  `end_rua` varchar(100) NOT NULL,
  `end_numero` varchar(10) NOT NULL,
  `end_bairro` varchar(100) NOT NULL,
  `end_cidade` varchar(50) NOT NULL,
  `end_estado` varchar(50) NOT NULL,
  `end_cep` varchar(10) NOT NULL,
  `end_complemento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `fun_id` decimal(28,0) NOT NULL,
  `fun_nome` varchar(100) NOT NULL,
  `fun_sexo` char(1) NOT NULL,
  `fun_email` varchar(100) NOT NULL,
  `fun_password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_genero`
--

CREATE TABLE `tb_genero` (
  `gen_id` decimal(28,0) NOT NULL,
  `gen_genero` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_leitor`
--

CREATE TABLE `tb_leitor` (
  `lei_id` decimal(28,0) NOT NULL,
  `lei_nome` varchar(70) NOT NULL,
  `lei_email` varchar(100) NOT NULL,
  `lei_dt_nascimeto` date NOT NULL,
  `lei_sexo` char(1) NOT NULL,
  `tb_end_id` decimal(28,0) NOT NULL,
  `tb_tel_id` decimal(28,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_livro`
--

CREATE TABLE `tb_livro` (
  `liv_id` decimal(28,0) NOT NULL,
  `liv_nome` varchar(100) NOT NULL,
  `liv_ano_publicao` varchar(4) NOT NULL,
  `liv_edicao` varchar(3) NOT NULL,
  `liv_isbd` varchar(13) NOT NULL,
  `liv_estado` varchar(50) NOT NULL,
  `tb_editora_edi_id` decimal(28,0) NOT NULL,
  `tb_autor_aut_id` decimal(28,0) NOT NULL,
  `tb_genero_gen_id` decimal(28,0) NOT NULL,
  `liv_capa` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_telefone`
--

CREATE TABLE `tb_telefone` (
  `tel_id` decimal(28,0) NOT NULL,
  `tel_numero` varchar(15) NOT NULL,
  `tb_tip_tel_id` decimal(28,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_tel`
--

CREATE TABLE `tb_tipo_tel` (
  `tip_tel_id` decimal(28,0) NOT NULL,
  `tip_tel_tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_autor`
--
ALTER TABLE `tb_autor`
  ADD PRIMARY KEY (`aut_id`);

--
-- Indexes for table `tb_editora`
--
ALTER TABLE `tb_editora`
  ADD PRIMARY KEY (`edi_id`);

--
-- Indexes for table `tb_emprestimo`
--
ALTER TABLE `tb_emprestimo`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `tb_emp_tb_fun_fk` (`tb_funcionario_fun_id`),
  ADD KEY `tb_emp_tb_lei_fk` (`tb_lei_id`),
  ADD KEY `tb_emp_tb_liv_fk` (`tb_livro_liv_id`);

--
-- Indexes for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD PRIMARY KEY (`end_id`);

--
-- Indexes for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD PRIMARY KEY (`fun_id`);

--
-- Indexes for table `tb_genero`
--
ALTER TABLE `tb_genero`
  ADD PRIMARY KEY (`gen_id`);

--
-- Indexes for table `tb_leitor`
--
ALTER TABLE `tb_leitor`
  ADD PRIMARY KEY (`lei_id`),
  ADD KEY `tb_usu_tb_end_fk` (`tb_end_id`),
  ADD KEY `tb_usu_tb_tel_fk` (`tb_tel_id`);

--
-- Indexes for table `tb_livro`
--
ALTER TABLE `tb_livro`
  ADD PRIMARY KEY (`liv_id`),
  ADD KEY `tb_liv_tb_aut_fk` (`tb_autor_aut_id`),
  ADD KEY `tb_liv_tb_edit_fk` (`tb_editora_edi_id`),
  ADD KEY `tb_livro_tb_genero_fk` (`tb_genero_gen_id`);

--
-- Indexes for table `tb_telefone`
--
ALTER TABLE `tb_telefone`
  ADD PRIMARY KEY (`tel_id`),
  ADD KEY `tb_tel_tb_tip_tel_fk` (`tb_tip_tel_id`);

--
-- Indexes for table `tb_tipo_tel`
--
ALTER TABLE `tb_tipo_tel`
  ADD PRIMARY KEY (`tip_tel_id`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_emprestimo`
--
ALTER TABLE `tb_emprestimo`
  ADD CONSTRAINT `tb_emp_tb_fun_fk` FOREIGN KEY (`tb_funcionario_fun_id`) REFERENCES `tb_funcionario` (`fun_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_emp_tb_lei_fk` FOREIGN KEY (`tb_lei_id`) REFERENCES `tb_leitor` (`lei_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_emp_tb_liv_fk` FOREIGN KEY (`tb_livro_liv_id`) REFERENCES `tb_livro` (`liv_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_leitor`
--
ALTER TABLE `tb_leitor`
  ADD CONSTRAINT `tb_usu_tb_end_fk` FOREIGN KEY (`tb_end_id`) REFERENCES `tb_endereco` (`end_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_usu_tb_tel_fk` FOREIGN KEY (`tb_tel_id`) REFERENCES `tb_telefone` (`tel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_livro`
--
ALTER TABLE `tb_livro`
  ADD CONSTRAINT `tb_liv_tb_aut_fk` FOREIGN KEY (`tb_autor_aut_id`) REFERENCES `tb_autor` (`aut_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_liv_tb_edit_fk` FOREIGN KEY (`tb_editora_edi_id`) REFERENCES `tb_editora` (`edi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_livro_tb_genero_fk` FOREIGN KEY (`tb_genero_gen_id`) REFERENCES `tb_genero` (`gen_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_telefone`
--
ALTER TABLE `tb_telefone`
  ADD CONSTRAINT `tb_tel_tb_tip_tel_fk` FOREIGN KEY (`tb_tip_tel_id`) REFERENCES `tb_tipo_tel` (`tip_tel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
