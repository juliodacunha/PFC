-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 01/10/2019 às 02:45
-- Versão do servidor: 10.4.6-MariaDB
-- Versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pfc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `corridas`
--

CREATE TABLE `corridas` (
  `id_corrida` int(10) NOT NULL,
  `passageiro_id_passageiro` int(5) DEFAULT NULL,
  `veiculo_id_veiculo` int(4) DEFAULT NULL,
  `motorista_id_motorista` int(3) DEFAULT NULL,
  `data` date NOT NULL,
  `horario_ida` time NOT NULL,
  `horario_volta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(2) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `cnpj`, `nome`) VALUES
(1, '53.333.785/0001-80', 'Turismo Federal');

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id_end_passageiro` int(5) NOT NULL,
  `id_passageiro_id` int(5) DEFAULT NULL,
  `cep` int(8) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` bigint(6) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `complemento` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `enderecos`
--

INSERT INTO `enderecos` (`id_end_passageiro`, `id_passageiro_id`, `cep`, `rua`, `numero`, `bairro`, `estado`, `cidade`, `complemento`) VALUES
(86, 59, 123, 'ae', 1, 'ae', 'ae', 'ae', 'ae');

-- --------------------------------------------------------

--
-- Estrutura para tabela `motoristas`
--

CREATE TABLE `motoristas` (
  `id_motorista` int(3) NOT NULL,
  `emp_idempresa` int(2) DEFAULT NULL,
  `user_iduser` int(8) DEFAULT NULL,
  `cnh` bigint(10) NOT NULL,
  `ativo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `motoristas`
--

INSERT INTO `motoristas` (`id_motorista`, `emp_idempresa`, `user_iduser`, `cnh`, `ativo`) VALUES
(37, 1, 141, 1123123123, 1),
(39, 1, 143, 1231312312, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `passageiros`
--

CREATE TABLE `passageiros` (
  `id_passageiro` int(5) NOT NULL,
  `emp_cod_empresa` int(2) DEFAULT NULL,
  `id_usuario_id` int(8) DEFAULT NULL,
  `matricula` int(10) NOT NULL,
  `curso` varchar(40) NOT NULL,
  `turma` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `passageiros`
--

INSERT INTO `passageiros` (`id_passageiro`, `emp_cod_empresa`, `id_usuario_id`, `matricula`, `curso`, `turma`) VALUES
(59, 1, 139, 1231231231, 'ae55', 'aeaea');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_usuarios`
--

CREATE TABLE `tipo_usuarios` (
  `tip_user` int(1) NOT NULL,
  `descricao` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`tip_user`, `descricao`) VALUES
(1, 'Passageiro'),
(2, 'Motorista');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(8) NOT NULL,
  `tipuser_tip_user` int(1) DEFAULT NULL,
  `cpf` bigint(12) NOT NULL,
  `rg` int(7) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `sobrenome` varchar(15) NOT NULL,
  `sexo` varchar(11) NOT NULL,
  `telefone` bigint(20) NOT NULL,
  `senha` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `tipuser_tip_user`, `cpf`, `rg`, `email`, `nome`, `sobrenome`, `sexo`, `telefone`, `senha`) VALUES
(139, 1, 123123, 123123, 'ae@ae', 'oi', 'oi', 'Masculino', 12312365767, '28dd2c7955ce926456240b2ff0100bde'),
(141, 1, 123, 123, '123@123', 'nome', 'sobrenome', 'Masculino', 1231231231, '7812e8b74f6837fba66f86fe86688a2b'),
(143, 1, 14141414141, 123123123, 'a@a', 'nome', 'senha', 'Masculino', 1231231232, '0cc175b9c0f1b6a831c399e269772661');

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id_veiculo` int(4) NOT NULL,
  `cnpj` int(14) DEFAULT NULL,
  `cod_empresa` int(2) DEFAULT NULL,
  `placa` varchar(7) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `ano` int(4) NOT NULL,
  `cor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `corridas`
--
ALTER TABLE `corridas`
  ADD PRIMARY KEY (`id_corrida`),
  ADD KEY `passageiro_id_passageiro` (`passageiro_id_passageiro`),
  ADD KEY `veiculo_id_veiculo` (`veiculo_id_veiculo`),
  ADD KEY `motorista_id_motorista` (`motorista_id_motorista`);

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`),
  ADD UNIQUE KEY `cnpj` (`cnpj`);

--
-- Índices de tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id_end_passageiro`),
  ADD UNIQUE KEY `cep` (`cep`),
  ADD KEY `id_passageiro_id` (`id_passageiro_id`);

--
-- Índices de tabela `motoristas`
--
ALTER TABLE `motoristas`
  ADD PRIMARY KEY (`id_motorista`),
  ADD UNIQUE KEY `cnh` (`cnh`),
  ADD KEY `emp_idempresa` (`emp_idempresa`),
  ADD KEY `user_iduser` (`user_iduser`);

--
-- Índices de tabela `passageiros`
--
ALTER TABLE `passageiros`
  ADD PRIMARY KEY (`id_passageiro`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD KEY `emp_cod_empresa` (`emp_cod_empresa`),
  ADD KEY `id_usuario_id` (`id_usuario_id`);

--
-- Índices de tabela `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  ADD PRIMARY KEY (`tip_user`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `rg` (`rg`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `tipuser_tip_user` (`tipuser_tip_user`);

--
-- Índices de tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id_veiculo`),
  ADD UNIQUE KEY `placa` (`placa`),
  ADD KEY `cnpj` (`cnpj`),
  ADD KEY `cod_empresa` (`cod_empresa`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id_end_passageiro` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de tabela `motoristas`
--
ALTER TABLE `motoristas`
  MODIFY `id_motorista` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `passageiros`
--
ALTER TABLE `passageiros`
  MODIFY `id_passageiro` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de tabela `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  MODIFY `tip_user` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id_veiculo` int(4) NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `corridas`
--
ALTER TABLE `corridas`
  ADD CONSTRAINT `corridas_ibfk_1` FOREIGN KEY (`passageiro_id_passageiro`) REFERENCES `passageiros` (`id_passageiro`),
  ADD CONSTRAINT `corridas_ibfk_2` FOREIGN KEY (`veiculo_id_veiculo`) REFERENCES `veiculos` (`id_veiculo`),
  ADD CONSTRAINT `corridas_ibfk_3` FOREIGN KEY (`motorista_id_motorista`) REFERENCES `motoristas` (`id_motorista`);

--
-- Restrições para tabelas `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `enderecos_ibfk_1` FOREIGN KEY (`id_passageiro_id`) REFERENCES `passageiros` (`id_passageiro`);

--
-- Restrições para tabelas `motoristas`
--
ALTER TABLE `motoristas`
  ADD CONSTRAINT `motoristas_ibfk_1` FOREIGN KEY (`emp_idempresa`) REFERENCES `empresas` (`id_empresa`),
  ADD CONSTRAINT `motoristas_ibfk_2` FOREIGN KEY (`user_iduser`) REFERENCES `usuarios` (`id_usuario`);

--
-- Restrições para tabelas `passageiros`
--
ALTER TABLE `passageiros`
  ADD CONSTRAINT `passageiros_ibfk_1` FOREIGN KEY (`emp_cod_empresa`) REFERENCES `empresas` (`id_empresa`),
  ADD CONSTRAINT `passageiros_ibfk_2` FOREIGN KEY (`id_usuario_id`) REFERENCES `usuarios` (`id_usuario`);

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipuser_tip_user`) REFERENCES `tipo_usuarios` (`tip_user`);

--
-- Restrições para tabelas `veiculos`
--
ALTER TABLE `veiculos`
  ADD CONSTRAINT `veiculos_ibfk_1` FOREIGN KEY (`cnpj`) REFERENCES `empresas` (`id_empresa`),
  ADD CONSTRAINT `veiculos_ibfk_2` FOREIGN KEY (`cod_empresa`) REFERENCES `empresas` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
