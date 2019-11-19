-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 19/11/2019 às 20:46
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
  `veiculo_id_veiculo` int(4) DEFAULT NULL,
  `motorista_id_motorista` int(3) DEFAULT NULL,
  `data_corrida` varchar(20) NOT NULL,
  `horario_ida` varchar(20) NOT NULL,
  `horario_volta` varchar(20) NOT NULL,
  `usuario_id_usuario` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `corridas`
--

INSERT INTO `corridas` (`id_corrida`, `veiculo_id_veiculo`, `motorista_id_motorista`, `data_corrida`, `horario_ida`, `horario_volta`, `usuario_id_usuario`) VALUES
(7, 1, 130, '17/02', 'Vai', 'Volta 12h', 296),
(12, 1, 92, '9/11', 'Nao vai', 'Volta 12h', 296),
(13, 1, 126, '11/11', 'Nao vai', 'Volta 12h', 296),
(14, 1, 126, '9/11', 'Nao vai ', 'Volta 12h', 299);

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
(181, 116, 13812371, 'rua', 2, 'jariva', 'sc', 'joinville', 'casa'),
(183, 118, 81232179, 'rua', 1, 'jariva', 'sc', 'jlle', 'casa'),
(187, 122, 81128732, 'rua', 44, 'jariva', 'sc', 'jlle', 'casa'),
(190, 125, 19283912, 'rua', 1, 'itaum', 'sc', 'joinville', 'casa'),
(191, 126, 11251241, 'rua', 1, 'itaum', 'sc', 'joinville', 'casa'),
(192, 127, 3123123, 'rua', 1, 'itaum', 'sc', 'joinville', 'casa'),
(196, 131, 19283921, 'rua', 2, 'nsei', 'sc', 'jaragua', 'casa'),
(218, 153, 12983812, 'rsjds', 2, 'casasa', 'sc', 'casasa', 'casa'),
(219, 154, 18231293, 'xv de novembro', 890, 'gloria', 'sc', 'joinville', 'apt 08'),
(220, 155, 12893812, 'lages', 889, 'norte', 'sc', 'mafra', 'casa');

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
(92, 1, 253, 7812381293, 1),
(110, 1, 272, 1414124124, 1),
(126, 1, 289, 1131232131, 1),
(130, 1, 293, 7218931232, 1),
(139, 1, 349, 8912389213, 1),
(140, 1, 350, 1111111111, 1);

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
(116, 1, 296, 2917238127, 'informatica', '3info2', 110),
(118, 1, 305, 2018391231, 'informatica', '3info2', NULL),
(122, 1, 310, 1283912831, 'informatica', '3info2', 126),
(125, 1, 313, 2017309888, 'informatica', '3info2', NULL),
(126, 1, 316, 2017309488, 'informatica', '3info2', 126),
(127, 1, 317, 2217309488, 'informatica', '3info2', NULL),
(131, 1, 321, 2189312312, 'informatica', '3info3', 130),
(153, 1, 344, 1289381293, 'hdjhasjdhasj', 'hjasdhjasd', NULL),
(154, 1, 345, 2017309777, 'agropecuaria', '3agro2', 139),
(155, 1, 346, 2191293123, 'lica', 'lica2', NULL);

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
(253, 2, 12938219381, 8912831, 'motora@gmail', 'luciano2', 'zanella', 'Masculino', 13892183912, 'd9b1d7db4cd6e70935368a1efb10e377', 1, NULL),
(272, 1, 123123123, 123123, 'bruske@gmail', 'bruske', 'ober', 'Masculino', 1231231233, 'b59c67bf196a4758191e42f76670ceba', 1, NULL),
(289, 2, 16749216478, 7987698, 'a@a', 'a', 'a', 'Masculino', 7128937129, '202cb962ac59075b964b07152d234b70', 1, '1574100299.JPG'),
(293, 2, 12412512412, 1312321, 'j@j', 'motorista', 'motorista', 'Masculino', 1391203128, '202cb962ac59075b964b07152d234b70', 1, NULL),
(296, 1, 73712893721, 7381273, 'bp@gmail', 'brenon', 'paul', 'Masculino', 73819237921, '202cb962ac59075b964b07152d234b70', 1, NULL),
(299, 1, 32323, 32323, 'kkl@kl', 'klkl', 'klkl', 'Masculino', 2222223333, '50a2c33221d835c9a5062f6eaa44abc1', 0, NULL),
(305, 1, 18391293821, 1231231, 'c@gmail.com', 'iiiooo', 'iiioo', 'Masculino', 18232189391, '202cb962ac59075b964b07152d234b70', 1, NULL),
(310, 1, 71289321788, 1273872, 'hehe@gmail', 'hehe', 'hehe', 'Masculino', 12378129371, '202cb962ac59075b964b07152d234b70', 1, '1574077741.png'),
(313, 1, 38901237809, 1283910, 'jaja@jaja', 'jjaja', 'jaja', 'Masculino', 81293812938, '202cb962ac59075b964b07152d234b70', 0, NULL),
(316, 1, 31231231231, 1312312, 'jajaa@jaja', 'jjaja', 'jaja', 'Masculino', 81293812938, '202cb962ac59075b964b07152d234b70', 0, NULL),
(317, 1, 31231231222, 1222312, 'ajajaa@jaja', 'jjaja', 'jaja', 'Masculino', 81293212938, '202cb962ac59075b964b07152d234b70', 0, NULL),
(321, 1, 80931820983, 1839012, 'ioioio@ioio', 'ioioio', 'ioioioio', 'Masculino', 18293821938, '202cb962ac59075b964b07152d234b70', 0, NULL),
(344, 1, 93812938129, 8192382, 'aeaeqwe@aa', 'aew', 'aew', 'Masculino', 12938193812, '202cb962ac59075b964b07152d234b70', 0, NULL),
(345, 1, 93812938192, 2189312, 'josue@gmail', 'josue', 'silva', 'Masculino', 47932382938, '3d988dc765ab71877e076a474c6232dd', 1, NULL),
(346, 1, 38129839128, 1289321, 'maria@gmail', 'maria', 'maria', 'Masculino', 12893812931, '202cb962ac59075b964b07152d234b70', 1, '1574019317.JPG'),
(349, 2, 12893128391, 1289312, 'anselmo@gmail', 'Anselmo', 'Wolf', 'Masculino', 8193891283, '202cb962ac59075b964b07152d234b70', 1, NULL),
(350, 2, 11111111111, 1111111, '0@0', 'Indefinido', 'Indefinido', '1', 11111111111, '202cb962ac59075b964b07152d234b70', 1, NULL);

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
-- Despejando dados para a tabela `veiculos`
--

INSERT INTO `veiculos` (`id_veiculo`, `cnpj`, `cod_empresa`, `placa`, `marca`, `modelo`, `ano`, `cor`) VALUES
(1, 1, 1, 'mka2706', 'kk', 'onix', 2020, 'azxyl');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `corridas`
--
ALTER TABLE `corridas`
  ADD PRIMARY KEY (`id_corrida`),
  ADD KEY `veiculo_id_veiculo` (`veiculo_id_veiculo`),
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
  MODIFY `id_corrida` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id_end_passageiro` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT de tabela `motoristas`
--
ALTER TABLE `motoristas`
  MODIFY `id_motorista` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de tabela `passageiros`
--
ALTER TABLE `passageiros`
  MODIFY `id_passageiro` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de tabela `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  MODIFY `tip_user` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

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
  ADD CONSTRAINT `corridas_ibfk_1` FOREIGN KEY (`veiculo_id_veiculo`) REFERENCES `veiculos` (`id_veiculo`),
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
