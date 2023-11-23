-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/11/2023 às 10:35
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `snf_bombeiros`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alertas_e_noticias`
--

CREATE TABLE `alertas_e_noticias` (
  `noticia_id` int(11) NOT NULL,
  `noticia_nome` varchar(255) NOT NULL,
  `noticia_conteudo` longtext DEFAULT NULL,
  `noticia_imagem` mediumblob NOT NULL,
  `data_noticia` date DEFAULT NULL,
  `noticia_comentario_habilitado` varchar(3) NOT NULL,
  `noticia_comentario` longtext DEFAULT NULL,
  `noticia_criador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cabecalho_ocorrencia`
--

CREATE TABLE `cabecalho_ocorrencia` (
  `cabecalho_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipes`
--

CREATE TABLE `equipes` (
  `equipe_id` int(11) NOT NULL,
  `equipe_nome` varchar(90) NOT NULL,
  `equipe_motorista` varchar(90) NOT NULL,
  `equipe_primeiro_socorrista` varchar(90) NOT NULL,
  `equipe_segundo_socorrista` varchar(90) NOT NULL,
  `equipe_terceiro_socorrista` varchar(90) NOT NULL,
  `equipe_demandante` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `equipes`
--

INSERT INTO `equipes` (`equipe_id`, `equipe_nome`, `equipe_motorista`, `equipe_primeiro_socorrista`, `equipe_segundo_socorrista`, `equipe_terceiro_socorrista`, `equipe_demandante`) VALUES
(3, 'Ratos do sistema', '41', '42', '41', '41', '41');

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipes_usuarios`
--

CREATE TABLE `equipes_usuarios` (
  `equipe_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `ocorrencia_id` int(11) NOT NULL,
  `nome_paciente` varchar(90) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `idade` int(6) DEFAULT NULL,
  `acompanhante` varchar(90) DEFAULT NULL,
  `idade_acompanhante` int(6) DEFAULT NULL,
  `num_ocorrencia` int(6) NOT NULL,
  `local_ocorrencia` varchar(90) NOT NULL,
  `data` date NOT NULL,
  `equipe_atendimento` int(6) NOT NULL,
  `num_desp` int(6) NOT NULL,
  `aconteceu_outras_vezes` varchar(3) DEFAULT NULL,
  `qt_tempo_aconteceu` varchar(45) DEFAULT NULL,
  `problema_saude` varchar(3) DEFAULT NULL,
  `tipo_problema_saude` varchar(45) DEFAULT NULL,
  `medicacao` varchar(3) DEFAULT NULL,
  `medicacao_horario` varchar(45) NOT NULL,
  `medicamento_usado` varchar(45) NOT NULL,
  `alergia` varchar(3) NOT NULL,
  `alergia_tipo` varchar(45) NOT NULL,
  `ingeriu_alimento` varchar(3) NOT NULL,
  `horario_ingestao` varchar(45) NOT NULL,
  `abertura_ocular` varchar(135) NOT NULL,
  `resposta_verbal` varchar(135) NOT NULL,
  `resposta_motora` varchar(135) NOT NULL,
  `total_gcs` int(6) NOT NULL,
  `tipo_ocorrencia` varchar(255) NOT NULL,
  `disturbio_comportamento` varchar(3) NOT NULL,
  `capacete` varchar(3) NOT NULL,
  `cinto` varchar(3) NOT NULL,
  `avariado_parabrisa` varchar(3) NOT NULL,
  `caminhando` varchar(3) NOT NULL,
  `avariado_painel` varchar(3) NOT NULL,
  `torcido_vol` varchar(3) NOT NULL,
  `problemas_suspeitos` varchar(90) NOT NULL,
  `problema_resp` varchar(45) NOT NULL,
  `problema_diabetes` varchar(45) NOT NULL,
  `problema_obstérico` varchar(45) NOT NULL,
  `forma_transporte` varchar(90) NOT NULL,
  `sinais_sintomas` varchar(135) NOT NULL,
  `local_cianose` varchar(45) NOT NULL,
  `forma_conducao` varchar(45) NOT NULL,
  `vitima_era` varchar(90) NOT NULL,
  `dec_transporte` varchar(45) NOT NULL,
  `pressao_arterial` varchar(45) NOT NULL,
  `pulso` varchar(45) NOT NULL,
  `respiracao` varchar(45) NOT NULL,
  `saturacao` varchar(45) NOT NULL,
  `temperatura` int(6) NOT NULL,
  `perfusao` varchar(45) NOT NULL,
  `quilometragem_final` int(12) NOT NULL,
  `hospital` varchar(90) NOT NULL,
  `hch` varchar(45) NOT NULL,
  `num_usb` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente_acompanhante`
--

CREATE TABLE `paciente_acompanhante` (
  `acompanhante_id` int(11) NOT NULL,
  `acompanhante_nome` varchar(90) DEFAULT NULL,
  `acompanhante_cpf` int(11) DEFAULT NULL,
  `acompanhante_telefone` int(11) DEFAULT NULL,
  `acompanhante_idade` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente_atendido`
--

CREATE TABLE `paciente_atendido` (
  `paciente_id` int(11) NOT NULL,
  `paciente_nome` varchar(90) DEFAULT NULL,
  `paciente_idade` int(3) DEFAULT NULL,
  `paciente_cpf` int(11) DEFAULT NULL,
  `paciente_genero` varchar(10) DEFAULT NULL,
  `paciente_telefone` int(11) DEFAULT NULL,
  `paciente_possui_acompanhante` varchar(3) DEFAULT NULL,
  `paciente_acompanhante` int(11) DEFAULT NULL,
  `paciente_encaminhado` varchar(3) DEFAULT NULL,
  `paciente_hospital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `problemas_sus_ocorrencia`
--

CREATE TABLE `problemas_sus_ocorrencia` (
  `prob_sus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `snf_hospitais`
--

CREATE TABLE `snf_hospitais` (
  `hospital_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_ocorrencia`
--

CREATE TABLE `tipo_ocorrencia` (
  `tp_ocorrencia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios_medicos`
--

CREATE TABLE `usuarios_medicos` (
  `medicos_id` int(11) NOT NULL,
  `medicos_nome` varchar(90) NOT NULL,
  `medicos_cpf` varchar(14) NOT NULL,
  `medicos_pwd` longtext NOT NULL,
  `medicos_email` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios_socorristas`
--

CREATE TABLE `usuarios_socorristas` (
  `usuarios_id` int(11) NOT NULL,
  `usuarios_username` varchar(90) NOT NULL,
  `usuarios_pwd` longtext NOT NULL,
  `usuarios_num_fibra` int(6) NOT NULL,
  `usuarios_e_cmdt` varchar(3) NOT NULL,
  `usuarios_cmdt_cod` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alertas_e_noticias`
--
ALTER TABLE `alertas_e_noticias`
  ADD PRIMARY KEY (`noticia_id`),
  ADD KEY `noticia_criador` (`noticia_criador`);

--
-- Índices de tabela `cabecalho_ocorrencia`
--
ALTER TABLE `cabecalho_ocorrencia`
  ADD PRIMARY KEY (`cabecalho_id`);

--
-- Índices de tabela `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`equipe_id`);

--
-- Índices de tabela `equipes_usuarios`
--
ALTER TABLE `equipes_usuarios`
  ADD PRIMARY KEY (`equipe_id`,`usuario_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD PRIMARY KEY (`ocorrencia_id`),
  ADD KEY `equipes` (`equipe_atendimento`);

--
-- Índices de tabela `paciente_acompanhante`
--
ALTER TABLE `paciente_acompanhante`
  ADD PRIMARY KEY (`acompanhante_id`);

--
-- Índices de tabela `paciente_atendido`
--
ALTER TABLE `paciente_atendido`
  ADD PRIMARY KEY (`paciente_id`),
  ADD KEY `paciente_hospital` (`paciente_hospital`),
  ADD KEY `paciente_acompanhante` (`paciente_acompanhante`);

--
-- Índices de tabela `problemas_sus_ocorrencia`
--
ALTER TABLE `problemas_sus_ocorrencia`
  ADD PRIMARY KEY (`prob_sus_id`);

--
-- Índices de tabela `snf_hospitais`
--
ALTER TABLE `snf_hospitais`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Índices de tabela `tipo_ocorrencia`
--
ALTER TABLE `tipo_ocorrencia`
  ADD PRIMARY KEY (`tp_ocorrencia_id`);

--
-- Índices de tabela `usuarios_medicos`
--
ALTER TABLE `usuarios_medicos`
  ADD PRIMARY KEY (`medicos_id`);

--
-- Índices de tabela `usuarios_socorristas`
--
ALTER TABLE `usuarios_socorristas`
  ADD PRIMARY KEY (`usuarios_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alertas_e_noticias`
--
ALTER TABLE `alertas_e_noticias`
  MODIFY `noticia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `cabecalho_ocorrencia`
--
ALTER TABLE `cabecalho_ocorrencia`
  MODIFY `cabecalho_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `equipes`
--
ALTER TABLE `equipes`
  MODIFY `equipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  MODIFY `ocorrencia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `paciente_acompanhante`
--
ALTER TABLE `paciente_acompanhante`
  MODIFY `acompanhante_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `paciente_atendido`
--
ALTER TABLE `paciente_atendido`
  MODIFY `paciente_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `problemas_sus_ocorrencia`
--
ALTER TABLE `problemas_sus_ocorrencia`
  MODIFY `prob_sus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `snf_hospitais`
--
ALTER TABLE `snf_hospitais`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_ocorrencia`
--
ALTER TABLE `tipo_ocorrencia`
  MODIFY `tp_ocorrencia_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios_medicos`
--
ALTER TABLE `usuarios_medicos`
  MODIFY `medicos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuarios_socorristas`
--
ALTER TABLE `usuarios_socorristas`
  MODIFY `usuarios_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `alertas_e_noticias`
--
ALTER TABLE `alertas_e_noticias`
  ADD CONSTRAINT `alertas_e_noticias_ibfk_1` FOREIGN KEY (`noticia_criador`) REFERENCES `usuarios_socorristas` (`usuarios_id`);

--
-- Restrições para tabelas `equipes_usuarios`
--
ALTER TABLE `equipes_usuarios`
  ADD CONSTRAINT `equipes_usuarios_ibfk_1` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`equipe_id`),
  ADD CONSTRAINT `equipes_usuarios_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios_socorristas` (`usuarios_id`);

--
-- Restrições para tabelas `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD CONSTRAINT `equipes` FOREIGN KEY (`equipe_atendimento`) REFERENCES `equipes` (`equipe_id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `paciente_atendido`
--
ALTER TABLE `paciente_atendido`
  ADD CONSTRAINT `paciente_atendido_ibfk_1` FOREIGN KEY (`paciente_hospital`) REFERENCES `snf_hospitais` (`hospital_id`),
  ADD CONSTRAINT `paciente_atendido_ibfk_2` FOREIGN KEY (`paciente_acompanhante`) REFERENCES `paciente_acompanhante` (`acompanhante_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
