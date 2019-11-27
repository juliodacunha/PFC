-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 27/11/2019 às 13:50
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
  `motorista_id_motorista` int(3) DEFAULT NULL,
  `data_corrida` varchar(20) NOT NULL,
  `horario_ida` varchar(20) NOT NULL,
  `horario_volta` varchar(20) NOT NULL,
  `usuario_id_usuario` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `corridas`
--

INSERT INTO `corridas` (`id_corrida`, `motorista_id_motorista`, `data_corrida`, `horario_ida`, `horario_volta`, `usuario_id_usuario`) VALUES
(32, 144, '28/11', 'Nao vai', 'Volta 12h', 354),
(33, 144, '22/11', 'Vai', 'Nao volta', 354),
(34, 144, '29/11', 'Nao vai', 'Volta 12h', 354),
(36, 144, '5/01', 'Nao vai', 'Nao volta', 354);

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
(221, 156, 89204665, 'Recife', 892, 'AmÃ©rica', 'SC', 'Joinville', 'Casa azul'),
(222, 157, 89223390, 'Dos UniversitÃ¡rios', 78, 'Jardim Sofia', 'SC', 'Joinville', 'Casa azul'),
(223, 158, 89216215, 'Evaristo da Veiga', 788, 'GlÃ³ria', 'SC', 'Joinville', 'Casa branca'),
(224, 159, 89227186, 'ServidÃ£o Santo Amadeu', 788, 'IririÃº', 'SC', 'Joinville', 'Apt 08'),
(225, 160, 89203358, 'IjuÃ­', 788, 'Anita Garibaldi', 'SC', 'Joinville', 'Apt 02'),
(226, 161, 89229220, 'Ouro Preto', 788, 'FÃ¡tima', 'SC', 'Joinville', 'Casa branca'),
(227, 162, 89226667, 'Iapetus', 88, 'Jardim ParaÃ­so', 'SC', 'Joinville', 'Casa de 1 andar'),
(228, 163, 89207575, 'Rua Pedro EstevÃ£o', 623, 'Guanabara', 'SC', 'Joinville', 'Casa grande'),
(229, 164, 89239655, 'Rua Elza Nielson', 127, 'Pirabeiraba', 'SC', 'Joinville', 'Rio Bonito'),
(230, 166, 89207550, 'Rua Professora LÃºcia Lopes', 788, 'Guanabara', 'SC', 'Joinville', 'Kitnet'),
(231, 167, 89225630, 'Rua Francisco Klein', 25, 'Aventureiro', 'SC', 'Joinville', 'Bar do Pedro');

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
(144, 1, 368, 7128312738, 1),
(145, 1, 369, 2718372189, 1),
(146, 1, 370, 8129382131, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `passageiros`
--

CREATE TABLE `passageiros` (
  `id_passageiro` int(5) NOT NULL,
  `emp_cod_empresa` int(2) DEFAULT NULL,
  `id_usuario_id` int(8) DEFAULT NULL,
  `matricula` bigint(10) NOT NULL,
  `curso` varchar(40) NOT NULL,
  `turma` varchar(40) NOT NULL,
  `id_motorista_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `passageiros`
--

INSERT INTO `passageiros` (`id_passageiro`, `emp_cod_empresa`, `id_usuario_id`, `matricula`, `curso`, `turma`, `id_motorista_id`) VALUES
(156, 1, 354, 2017839283, 'AgropecuÃ¡ria', '3agro1', 144),
(157, 1, 355, 2017309273, 'InformÃ¡tica', '3info2', NULL),
(158, 1, 356, 2018173812, 'InformÃ¡tica', '2info2', NULL),
(159, 1, 357, 2017812931, 'InformÃ¡tica', '3INFO3', NULL),
(160, 1, 358, 2017183921, 'InformÃ¡tica', '3INFO@', NULL),
(161, 1, 359, 2017128391, 'AgropecuÃ¡ria', '3AGRO1', NULL),
(162, 1, 360, 2017128931, 'InformÃ¡tica', '3INFO1', NULL),
(163, 1, 361, 2017182931, 'InformÃ¡tica', '3INFO2', NULL),
(164, 1, 362, 2016182392, 'QuÃ­mica', '4QUIMI', NULL),
(166, 1, 365, 2018129321, 'AgropecuÃ¡ria', '2AGRO2', NULL),
(167, 1, 367, 2019182931, 'AgropecuÃ¡ria', '1AGRO1', NULL);

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
  `senha` longtext NOT NULL,
  `aprovado` int(1) UNSIGNED NOT NULL DEFAULT 0,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `tipuser_tip_user`, `cpf`, `rg`, `email`, `nome`, `sobrenome`, `sexo`, `telefone`, `senha`, `aprovado`, `imagem`) VALUES
(354, 1, 18931289312, 8293482, 'gabriel@gmail.com', 'Gabriel', 'Barbosa', 'Masculino', 47828392328, '202cb962ac59075b964b07152d234b70', 1, '1574440228.jpg'),
(355, 1, 12873217831, 8392173, 'filipe@gmail.com', 'Filipe', 'Luis', 'Masculino', 47987283728, '202cb962ac59075b964b07152d234b70', 1, '1574277082.jpg'),
(356, 1, 17823213123, 6819381, 'bruno@gmail.com', 'Bruno', 'Henrique', 'Masculino', 47981371283, '202cb962ac59075b964b07152d234b70', 0, '1574277206.jpg'),
(357, 1, 17289137129, 6182931, 'diego@gmail.com', 'Diego', 'Ribas', 'Masculino', 47981263712, '202cb962ac59075b964b07152d234b70', 0, '1574420933.jpg'),
(358, 1, 12783127832, 6712831, 'giorgian@gmail.com', 'Giorgian', 'Arrascaeta', 'Masculino', 47912783127, '202cb962ac59075b964b07152d234b70', 0, '1574421096.jpg'),
(359, 1, 18123718371, 5712938, 'willian@gmail.com', 'Willian', 'ArÃ£o', 'Masculino', 47912783217, '202cb962ac59075b964b07152d234b70', 0, '1574421170.jpg'),
(360, 1, 12178327381, 7128312, 'dejan@gmail.com', 'Dejan', 'Petkovic', 'Masculino', 47921783173, '202cb962ac59075b964b07152d234b70', 0, '1574428286.jpg'),
(361, 1, 12731893972, 7128372, 'david@gmail.com', 'David', 'Braz', 'Masculino', 47988123671, '202cb962ac59075b964b07152d234b70', 0, '1574428352.jpeg'),
(362, 1, 12712837128, 6712839, 'philippe@gmail.com', 'Philippe', 'Coutinho', 'Masculino', 47981273812, '202cb962ac59075b964b07152d234b70', 0, '1574428519.jpg'),
(363, 1, 12713891273, 6712893, 'lucas@gmail.com', 'Lucas', 'Paquetá', 'Masculino', 47981738217, '202cb962ac59075b964b07152d234b70', 0, '1574428630.jpeg'),
(365, 1, 81293812938, 8129382, 'alisson@gmail.com', 'Alisson', 'Becker', 'Masculino', 47981278321, '202cb962ac59075b964b07152d234b70', 0, '1574428719.jpg'),
(367, 1, 17283717312, 6127381, 'roberto@gmail.com', 'Roberto', 'Firmino', 'Masculino', 47917283127, '202cb962ac59075b964b07152d234b70', 0, '1574428915.jpg'),
(368, 2, 12632900948, 6819577, 'julio@gmail.com', 'Julio', 'Da Cunha', 'Masculino', 4798127832, '202cb962ac59075b964b07152d234b70', 1, '1574429076.jpg'),
(369, 2, 12681293821, 6718237, 'iris@gmail.com', 'Iris', 'Mebs', 'Feminino', 4798172837, '202cb962ac59075b964b07152d234b70', 0, '1574429106.jpg'),
(370, 2, 17238127381, 6127382, 'andre@gmail.com', 'Andre', 'Oliveira', 'Masculino', 4797128312, '202cb962ac59075b964b07152d234b70', 0, '1574429140.jpg');

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
  ADD KEY `motorista_id_motorista` (`motorista_id_motorista`),
  ADD KEY `corridas_ibfk_3` (`usuario_id_usuario`);

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
  ADD KEY `id_usuario_id` (`id_usuario_id`),
  ADD KEY `id_motorista_id` (`id_motorista_id`);

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
-- AUTO_INCREMENT de tabela `corridas`
--
ALTER TABLE `corridas`
  MODIFY `id_corrida` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id_end_passageiro` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT de tabela `motoristas`
--
ALTER TABLE `motoristas`
  MODIFY `id_motorista` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT de tabela `passageiros`
--
ALTER TABLE `passageiros`
  MODIFY `id_passageiro` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT de tabela `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  MODIFY `tip_user` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id_veiculo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `corridas`
--
ALTER TABLE `corridas`
  ADD CONSTRAINT `corridas_ibfk_2` FOREIGN KEY (`motorista_id_motorista`) REFERENCES `motoristas` (`id_motorista`),
  ADD CONSTRAINT `corridas_ibfk_3` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuarios` (`id_usuario`);

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
  ADD CONSTRAINT `passageiros_ibfk_2` FOREIGN KEY (`id_usuario_id`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `passageiros_ibfk_3` FOREIGN KEY (`id_motorista_id`) REFERENCES `motoristas` (`id_motorista`);

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
