-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Nov-2018 às 18:03
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cacademico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(10) UNSIGNED NOT NULL,
  `pessoa_id` int(10) UNSIGNED NOT NULL,
  `matricula` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `pessoa_id`, `matricula`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7, 20180001, '2018-10-31 17:02:04', '2018-10-31 17:02:04', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenadores`
--

CREATE TABLE `coordenadores` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_funcional` int(11) NOT NULL,
  `pessoa_id` int(10) UNSIGNED NOT NULL,
  `salario` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `coordenadores`
--

INSERT INTO `coordenadores` (`id`, `id_funcional`, `pessoa_id`, `salario`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4585, 5, 1800, '2018-10-30 22:17:27', '2018-10-30 22:17:27', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periodo_id` int(10) UNSIGNED NOT NULL,
  `coordenador_id` int(10) UNSIGNED NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargahoraria` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `periodo_id`, `coordenador_id`, `descricao`, `cargahoraria`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'MATEMÁTICA BÁSICA I', 1, 1, 'Revisar e aprofundar conceitos básicos de matemática do Ensino Fundamental e Médio, proporcionando ao aluno um melhor aproveitamento do seu curso.\r\n\r\nObjetivos Gerais\r\n\r\nSanar possíveis déficits de aprendizagem que os alunos possam ter sobre  conteúdos de Matemática do Ensino Fundamental e Médio;\r\nContribuir para uma melhor formação do aluno;\r\nFornecer ao aluno subsídios para interpretar e resolver problemas matemáticos.\r\n \r\n Objetivos Específicos\r\n\r\nCompreender a divisão dos números em conjuntos numéricos;\r\nFazer operações com os números em todos os conjuntos numéricos;\r\nResolver expressões numéricas;\r\nInterpretar problemas matemáticos, identificando os dados relevantes e a operação necessária para a resolução;\r\nAplicar as operações em conjuntos numéricos na resolução de problemas;\r\nPerceber a relação entre razão e proporção;\r\nResolver problemas que envolvam razão e proporção;\r\nCompreender o algoritmo de resolução de regras de três simples e composta;\r\nCalcular porcentagens em variadas situações;\r\nPerceber a relação entre porcentagem e regra de três simples.', 40, '2018-10-31 23:25:51', '2018-11-02 16:17:17', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso_professor`
--

CREATE TABLE `curso_professor` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) UNSIGNED NOT NULL,
  `professor_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `curso_professor`
--

INSERT INTO `curso_professor` (`id`, `curso_id`, `professor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 1, '2018-11-01 17:10:00', '2018-11-01 20:32:38', '2018-11-01 20:32:38'),
(8, 1, 1, '2018-11-01 20:34:23', '2018-11-01 20:34:30', '2018-11-01 20:34:30'),
(9, 1, 1, '2018-11-01 20:39:21', '2018-11-01 20:39:21', NULL),
(10, 1, 2, '2018-11-02 16:16:36', '2018-11-02 16:16:36', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `diretores`
--

CREATE TABLE `diretores` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_funcional` int(10) UNSIGNED NOT NULL,
  `pessoa_id` int(10) UNSIGNED NOT NULL,
  `salario` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `diretores`
--

INSERT INTO `diretores` (`id`, `id_funcional`, `pessoa_id`, `salario`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4589, 3, 2000.00, '2018-10-25 05:40:01', '2018-10-25 05:40:01', NULL),
(2, 4581, 4, 2000.00, '2018-10-25 06:43:02', '2018-10-25 06:43:02', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolas`
--

CREATE TABLE `escolas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diretor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `escolas`
--

INSERT INTO `escolas` (`id`, `nome`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `diretor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ESCOLA TÉCNICA MAGALHÃE BARATA', 'RUA MUNICIPALIDADE', 1283, 'TELEGRÁFO', 'BELÉM', 'PA', '66000-000', 2, '2018-10-27 16:55:41', '2018-10-27 16:58:13', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_24_234042_create_escolas_table', 2),
(4, '2018_10_24_235013_create_pessoas_table', 3),
(5, '2018_10_25_004714_create_diretores_table', 4),
(6, '2018_10_27_041331_create_coordenadores_table', 5),
(7, '2018_10_27_041648_create_professores_table', 6),
(8, '2018_10_27_041911_create_alunos_table', 7),
(9, '2018_10_27_042909_create_periodos_table', 8),
(10, '2018_10_27_044355_create_testes_table', 9),
(11, '2018_10_31_184449_create_cursos_table', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota_frequencia`
--

CREATE TABLE `nota_frequencia` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) UNSIGNED NOT NULL,
  `frequencia` int(11) DEFAULT NULL,
  `nota` decimal(10,2) DEFAULT NULL,
  `situacao` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `turma_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `nota_frequencia`
--

INSERT INTO `nota_frequencia` (`id`, `aluno_id`, `frequencia`, `nota`, `situacao`, `turma_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, NULL, 'Pendente', 5, '2018-11-05 12:57:16', '2018-11-05 14:57:16', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('andervilo@gmail.com', '$2y$10$HS/o4JYA2ppN.IrpZ0goUOLo6tNDkHvfS1KfF6PpslHH.nLcCvMBu', '2018-10-26 02:28:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodos`
--

CREATE TABLE `periodos` (
  `id` int(10) UNSIGNED NOT NULL,
  `escola_id` int(10) UNSIGNED NOT NULL,
  `ano` int(11) NOT NULL,
  `anual` tinyint(1) DEFAULT '0',
  `semestre1` tinyint(1) DEFAULT '0',
  `semestre2` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `periodos`
--

INSERT INTO `periodos` (`id`, `escola_id`, `ano`, `anual`, `semestre1`, `semestre2`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2018, 0, 0, 1, '2018-10-31 19:12:23', '2018-11-01 08:08:06', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt_nasc` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `cpf`, `rg`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `telefone`, `celular`, `email`, `dt_nasc`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ANDERSON NAZARENO ALCANTARA DE OLIVEIRA', '999.999.999-99', '12345', 'Passagem Mario Rocha, 19', 123, 'Pedreira', 'Belém', 'PA', '66083-410', '91982366407', '91982366407', 'andervilo@gmail.com', '1982-10-11', '2018-10-25 02:53:01', '2018-10-25 02:53:01', NULL),
(3, 'Julio Couto', '999.999.999-99', '12345', 'Passagem Mário Rocha', 19, 'Pedreira', 'Belém', 'PA', '66083-410', '9147854236', '9147854236', 'lferreira@gmail.com.', '1982-10-05', '2018-10-25 05:40:01', '2018-10-30 22:52:27', NULL),
(4, 'Roberto Fernandez', '999.999.999-99', '12345', 'Passagem Mário Rocha', 19, 'Pedreira', 'Belém', 'PA', '66083-410', '9147854236', '9132654895', 'andervilo@gmail.com', '1978-04-12', '2018-10-25 06:43:02', '2018-10-25 06:43:02', NULL),
(5, 'Mario Silva', '999.999.999-99', '12346', 'Passagem Mário Rocha', 19, 'TELEGRÁFO', 'Belém', 'PA', '66083-410', '9147854236', '9147854236', 'mariosilva@gmail.com', '1980-04-21', '2018-10-30 22:17:27', '2018-10-30 22:52:48', NULL),
(6, 'Ronaldo Rocha', '999.999.999-99', '12347', 'Passagem Mario Rocha, 19', 19, 'Pedreira', 'Belém', 'PA', '66083-410', '91982366407', '9147854236', 'ronaldorocha@gmail.com', '1978-11-30', '2018-10-30 22:39:28', '2018-10-30 22:53:04', NULL),
(7, 'Francisco Barbosa', '999.999.999-99', '12348', 'Passagem Mario Rocha, 19', 123, 'MARCO', 'Belém', 'PA', '66083-410', '91982366407', '9147854236', 'fbarbosa@gmail.com', '1994-12-10', '2018-10-31 17:02:03', '2018-10-31 17:07:49', NULL),
(8, 'Marcelo Oliveira', '999.999.999-99', '123415', 'Passagem Mário Rocha', 123, 'MARCO', 'Belém', 'PA', '66083-410', '9147854236', '9147854236', 'andervilo@gmail.com', '1984-04-22', '2018-11-02 16:16:23', '2018-11-02 16:16:23', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_funcional` int(11) NOT NULL,
  `pessoa_id` int(10) UNSIGNED NOT NULL,
  `salario` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `id_funcional`, `pessoa_id`, `salario`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4586, 6, 1800, '2018-10-30 22:39:28', '2018-10-30 22:39:28', NULL),
(2, 4570, 8, 1800, '2018-11-02 16:16:23', '2018-11-02 16:16:23', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `recursos`
--

CREATE TABLE `recursos` (
  `id` int(11) UNSIGNED NOT NULL,
  `descricao` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_patrimonial` int(11) NOT NULL,
  `data_aquisicao` date NOT NULL,
  `valor_aquisicao` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `recursos`
--

INSERT INTO `recursos` (`id`, `descricao`, `id_patrimonial`, `data_aquisicao`, `valor_aquisicao`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TV LED 50\" SANSUNG', 20180001, '2018-01-10', '3000.00', '2018-11-05 06:14:33', '2018-11-05 06:14:33', NULL),
(2, 'Notebook DELL 15\" XYZVW', 20180002, '2018-01-15', '5000.00', '2018-11-05 06:16:06', '2018-11-05 06:16:06', NULL),
(3, 'Projetor Epson PWL+', 20180003, '2018-01-15', '2350.00', '2018-11-05 06:17:00', '2018-11-05 06:17:00', NULL),
(4, 'TV LED 50\" SANSUNG', 20180004, '2018-01-10', '3000.00', '2018-11-05 06:14:33', '2018-11-05 06:14:33', NULL),
(5, 'TV LED 50\" SANSUNG', 20180005, '2018-01-10', '3000.00', '2018-11-05 06:14:33', '2018-11-05 06:14:33', NULL),
(6, 'Notebook DELL 15\" XYZVW', 20180006, '2018-01-15', '5000.00', '2018-11-05 06:16:06', '2018-11-05 06:16:06', NULL),
(7, 'Notebook DELL 15\" XYZVW', 20180007, '2018-01-15', '5000.00', '2018-11-05 06:16:06', '2018-11-05 06:16:06', NULL),
(8, 'Notebook DELL 15\" XYZVW', 20180008, '2018-01-15', '5000.00', '2018-11-05 06:16:06', '2018-11-05 06:16:06', NULL),
(9, 'Projetor Epson PWL+', 20180009, '2018-01-15', '2350.00', '2018-11-05 06:17:00', '2018-11-05 06:17:00', NULL),
(10, 'Projetor Epson PWL+', 20180010, '2018-01-15', '2350.00', '2018-11-05 06:17:00', '2018-11-05 06:17:00', NULL),
(11, 'Projetor Epson PWL+', 20180011, '2018-01-15', '2350.00', '2018-11-05 06:17:00', '2018-11-05 06:17:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE `salas` (
  `id` int(11) UNSIGNED NOT NULL,
  `numero` int(11) NOT NULL,
  `capacidade` int(10) UNSIGNED NOT NULL,
  `setor` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `andar` int(3) UNSIGNED DEFAULT NULL,
  `corredor` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`id`, `numero`, `capacidade`, `setor`, `andar`, `corredor`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 101, 40, '1', 1, NULL, '2018-11-05 03:10:08', '2018-11-05 03:10:38', NULL),
(2, 102, 45, '1', 1, NULL, '2018-11-05 03:10:32', '2018-11-05 03:10:32', NULL),
(3, 103, 45, '1', 1, NULL, '2018-11-05 03:10:55', '2018-11-05 03:10:55', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `testes`
--

CREATE TABLE `testes` (
  `id` int(10) UNSIGNED NOT NULL,
  `teste1` tinyint(1) NOT NULL,
  `teste2` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(11) UNSIGNED NOT NULL,
  `curso_id` int(11) UNSIGNED NOT NULL,
  `professor_id` int(11) UNSIGNED NOT NULL,
  `identificador` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `curso_id`, `professor_id`, `identificador`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 1, 'MB001', '2018-11-05 03:50:02', '2018-11-05 03:50:02', NULL),
(8, 1, 2, 'MB004', '2018-11-05 05:16:18', '2018-11-05 06:02:42', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_recurso`
--

CREATE TABLE `turma_recurso` (
  `id` int(11) UNSIGNED NOT NULL,
  `recurso_id` int(11) UNSIGNED NOT NULL,
  `turma_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `turma_recurso`
--

INSERT INTO `turma_recurso` (`id`, `recurso_id`, `turma_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 5, '2018-11-05 18:46:15', '2018-11-05 18:54:45', NULL),
(2, 8, 5, '2018-11-05 18:46:32', '2018-11-05 18:46:32', NULL),
(3, 9, 5, '2018-11-05 18:46:40', '2018-11-05 18:48:14', '2018-11-05 18:48:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_sala`
--

CREATE TABLE `turma_sala` (
  `id` int(11) UNSIGNED NOT NULL,
  `turma_id` int(11) UNSIGNED NOT NULL,
  `sala_id` int(11) UNSIGNED NOT NULL,
  `dia_semana` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fim` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `turma_sala`
--

INSERT INTO `turma_sala` (`id`, `turma_id`, `sala_id`, `dia_semana`, `hora_inicio`, `hora_fim`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 1, NULL, NULL, NULL, '2018-11-05 03:50:02', '2018-11-05 03:50:02', NULL),
(4, 8, 2, NULL, NULL, NULL, '2018-11-05 05:16:18', '2018-11-05 05:16:18', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anderson Oliveira', 'andervilo@gmail.com', '$2y$10$il2055cM7F1gATg4uOBsIOxUpYsXEWqJ5ouOHRFQ7z6RcHqCcLkPC', 'eaLNgvcN2DaqEtGTDFEGMPHxjgdW8F4Ee8JYMCu8qUQYWDCALz4arkYA7T0n', '2018-10-25 02:20:33', '2018-10-25 02:20:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alunos_pessoa_id_foreign` (`pessoa_id`);

--
-- Indexes for table `coordenadores`
--
ALTER TABLE `coordenadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coordenadores_pessoa_id_foreign` (`pessoa_id`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursos_periodo_id_foreign` (`periodo_id`),
  ADD KEY `cursos_coordenador_id_foreign` (`coordenador_id`);

--
-- Indexes for table `curso_professor`
--
ALTER TABLE `curso_professor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idxprofessor` (`professor_id`),
  ADD KEY `idxcurso` (`curso_id`,`professor_id`) USING BTREE;

--
-- Indexes for table `diretores`
--
ALTER TABLE `diretores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diretores_pessoa_id_foreign` (`pessoa_id`);

--
-- Indexes for table `escolas`
--
ALTER TABLE `escolas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota_frequencia`
--
ALTER TABLE `nota_frequencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idxaluno` (`aluno_id`),
  ADD KEY `idxturma` (`turma_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periodos_escola_id_foreign` (`escola_id`);

--
-- Indexes for table `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professores_pessoa_id_foreign` (`pessoa_id`);

--
-- Indexes for table `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unprati` (`id_patrimonial`);

--
-- Indexes for table `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unqnumero` (`numero`);

--
-- Indexes for table `testes`
--
ALTER TABLE `testes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identificador` (`identificador`),
  ADD KEY `idxcurso` (`curso_id`),
  ADD KEY `idxprofessor` (`professor_id`);

--
-- Indexes for table `turma_recurso`
--
ALTER TABLE `turma_recurso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idxrecurso` (`recurso_id`),
  ADD KEY `idxturma` (`turma_id`);

--
-- Indexes for table `turma_sala`
--
ALTER TABLE `turma_sala`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turma_id` (`turma_id`),
  ADD KEY `sala_id` (`sala_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coordenadores`
--
ALTER TABLE `coordenadores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `curso_professor`
--
ALTER TABLE `curso_professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `diretores`
--
ALTER TABLE `diretores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `escolas`
--
ALTER TABLE `escolas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nota_frequencia`
--
ALTER TABLE `nota_frequencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `salas`
--
ALTER TABLE `salas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testes`
--
ALTER TABLE `testes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `turma_recurso`
--
ALTER TABLE `turma_recurso`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `turma_sala`
--
ALTER TABLE `turma_sala`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_pessoa_id_foreign` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`);

--
-- Limitadores para a tabela `coordenadores`
--
ALTER TABLE `coordenadores`
  ADD CONSTRAINT `coordenadores_pessoa_id_foreign` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`);

--
-- Limitadores para a tabela `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_coordenador_id_foreign` FOREIGN KEY (`coordenador_id`) REFERENCES `coordenadores` (`id`),
  ADD CONSTRAINT `cursos_periodo_id_foreign` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`id`);

--
-- Limitadores para a tabela `curso_professor`
--
ALTER TABLE `curso_professor`
  ADD CONSTRAINT `FK_Curso` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `FK_Professor` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`);

--
-- Limitadores para a tabela `diretores`
--
ALTER TABLE `diretores`
  ADD CONSTRAINT `diretores_pessoa_id_foreign` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`);

--
-- Limitadores para a tabela `nota_frequencia`
--
ALTER TABLE `nota_frequencia`
  ADD CONSTRAINT `nota_frequencia_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`),
  ADD CONSTRAINT `nota_frequencia_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`);

--
-- Limitadores para a tabela `periodos`
--
ALTER TABLE `periodos`
  ADD CONSTRAINT `periodos_escola_id_foreign` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`);

--
-- Limitadores para a tabela `professores`
--
ALTER TABLE `professores`
  ADD CONSTRAINT `professores_pessoa_id_foreign` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`);

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `FK_Cursos` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `turmas_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`);

--
-- Limitadores para a tabela `turma_recurso`
--
ALTER TABLE `turma_recurso`
  ADD CONSTRAINT `turma_recurso_ibfk_1` FOREIGN KEY (`recurso_id`) REFERENCES `recursos` (`id`),
  ADD CONSTRAINT `turma_recurso_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`);

--
-- Limitadores para a tabela `turma_sala`
--
ALTER TABLE `turma_sala`
  ADD CONSTRAINT `turma_sala_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`),
  ADD CONSTRAINT `turma_sala_ibfk_2` FOREIGN KEY (`sala_id`) REFERENCES `salas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
