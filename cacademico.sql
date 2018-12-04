-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 04/12/2018 às 13:09
-- Versão do servidor: 5.7.24-0ubuntu0.18.04.1
-- Versão do PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cacademico`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
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
-- Fazendo dump de dados para tabela `alunos`
--

INSERT INTO `alunos` (`id`, `pessoa_id`, `matricula`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7, 20180001, '2018-10-31 17:02:04', '2018-10-31 17:02:04', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `coordenadores`
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
-- Fazendo dump de dados para tabela `coordenadores`
--

INSERT INTO `coordenadores` (`id`, `id_funcional`, `pessoa_id`, `salario`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4585, 5, 1800, '2018-10-30 22:17:27', '2018-10-30 22:17:27', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
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
-- Fazendo dump de dados para tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `periodo_id`, `coordenador_id`, `descricao`, `cargahoraria`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'MATEMÁTICA BÁSICA I', 1, 1, 'Revisar e aprofundar conceitos básicos de matemática do Ensino Fundamental e Médio, proporcionando ao aluno um melhor aproveitamento do seu curso.\r\n\r\nObjetivos Gerais\r\n\r\nSanar possíveis déficits de aprendizagem que os alunos possam ter sobre  conteúdos de Matemática do Ensino Fundamental e Médio;\r\nContribuir para uma melhor formação do aluno;\r\nFornecer ao aluno subsídios para interpretar e resolver problemas matemáticos.\r\n \r\n Objetivos Específicos\r\n\r\nCompreender a divisão dos números em conjuntos numéricos;\r\nFazer operações com os números em todos os conjuntos numéricos;\r\nResolver expressões numéricas;\r\nInterpretar problemas matemáticos, identificando os dados relevantes e a operação necessária para a resolução;\r\nAplicar as operações em conjuntos numéricos na resolução de problemas;\r\nPerceber a relação entre razão e proporção;\r\nResolver problemas que envolvam razão e proporção;\r\nCompreender o algoritmo de resolução de regras de três simples e composta;\r\nCalcular porcentagens em variadas situações;\r\nPerceber a relação entre porcentagem e regra de três simples.', 40, '2018-10-31 23:25:51', '2018-11-02 16:17:17', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso_professor`
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
-- Fazendo dump de dados para tabela `curso_professor`
--

INSERT INTO `curso_professor` (`id`, `curso_id`, `professor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 1, '2018-11-01 17:10:00', '2018-11-01 20:32:38', '2018-11-01 20:32:38'),
(8, 1, 1, '2018-11-01 20:34:23', '2018-11-01 20:34:30', '2018-11-01 20:34:30'),
(9, 1, 1, '2018-11-01 20:39:21', '2018-11-01 20:39:21', NULL),
(10, 1, 2, '2018-11-02 16:16:36', '2018-11-02 16:16:36', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `diretores`
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
-- Fazendo dump de dados para tabela `diretores`
--

INSERT INTO `diretores` (`id`, `id_funcional`, `pessoa_id`, `salario`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4589, 3, 2000.00, '2018-10-25 05:40:01', '2018-10-25 05:40:01', NULL),
(2, 4581, 4, 2000.00, '2018-10-25 06:43:02', '2018-10-25 06:43:02', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `escolas`
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
-- Fazendo dump de dados para tabela `escolas`
--

INSERT INTO `escolas` (`id`, `nome`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `diretor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ESCOLA TÉCNICA MAGALHÃE BARATA', 'RUA MUNICIPALIDADE', 1283, 'TELEGRÁFO', 'BELÉM', 'PA', '66000-000', 2, '2018-10-27 16:55:41', '2018-10-27 16:58:13', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `migrations`
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
(11, '2018_10_31_184449_create_cursos_table', 10),
(12, '2018_11_22_155342_create_permission_tables', 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `nota_frequencia`
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
-- Fazendo dump de dados para tabela `nota_frequencia`
--

INSERT INTO `nota_frequencia` (`id`, `aluno_id`, `frequencia`, `nota`, `situacao`, `turma_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, NULL, 'Pendente', 5, '2018-11-05 12:57:16', '2018-11-05 14:57:16', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('andervilo@gmail.com', '$2y$10$HS/o4JYA2ppN.IrpZ0goUOLo6tNDkHvfS1KfF6PpslHH.nLcCvMBu', '2018-10-26 02:28:29');

-- --------------------------------------------------------

--
-- Estrutura para tabela `periodos`
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
-- Fazendo dump de dados para tabela `periodos`
--

INSERT INTO `periodos` (`id`, `escola_id`, `ano`, `anual`, `semestre1`, `semestre2`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2018, 0, 0, 1, '2018-10-31 19:12:23', '2018-11-01 08:08:06', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'criar_turma', 'web', '2018-11-23 03:02:18', '2018-11-23 03:04:35', NULL),
(4, 'excluir_turma', 'web', '2018-11-23 03:04:26', '2018-11-23 03:04:26', NULL),
(5, 'editar_turma', 'web', '2018-11-23 18:19:58', '2018-11-23 18:19:58', NULL),
(6, 'ver_turmas', 'web', '2018-11-23 18:20:19', '2018-11-23 18:20:19', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoas`
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
-- Fazendo dump de dados para tabela `pessoas`
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
-- Estrutura para tabela `professores`
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
-- Fazendo dump de dados para tabela `professores`
--

INSERT INTO `professores` (`id`, `id_funcional`, `pessoa_id`, `salario`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4586, 6, 1800, '2018-10-30 22:39:28', '2018-10-30 22:39:28', NULL),
(2, 4570, 8, 1800, '2018-11-02 16:16:23', '2018-11-02 16:16:23', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `recursos`
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
-- Fazendo dump de dados para tabela `recursos`
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
(11, 'Projetor Epson PWL+', 20180011, '2018-01-15', '2350.00', '2018-11-05 06:17:00', '2018-11-05 06:17:00', NULL),
(12, 'TV LED 60\" SANSUNG', 20180045, '2018-11-22', '5000.00', '2018-11-22 16:14:22', '2018-11-22 19:14:22', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Diretor', 'web', '2018-11-23 02:02:00', '2018-11-23 02:02:00', NULL),
(2, 'Administrador', 'web', '2018-11-24 19:59:00', '2018-11-24 19:59:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `rotas`
--

CREATE TABLE `rotas` (
  `id` int(11) UNSIGNED NOT NULL,
  `uri` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `rotas`
--

INSERT INTO `rotas` (`id`, `uri`, `method`, `action`, `module`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'api/user', 'GET', 'Closure', '', '2018-11-25 22:48:40', '2018-11-25 22:48:40', NULL),
(2, 'api/escolas', 'GET', 'index', '', '2018-11-25 22:48:41', '2018-11-25 22:48:41', NULL),
(3, 'api/escolas/create', 'GET', 'create', '', '2018-11-25 22:48:41', '2018-11-25 22:48:41', NULL),
(4, 'api/escolas', 'POST', 'store', '', '2018-11-25 22:48:41', '2018-11-25 22:48:41', NULL),
(5, 'api/escolas/{escola}', 'GET', 'show', '', '2018-11-25 22:48:42', '2018-11-25 22:48:42', NULL),
(6, 'api/escolas/{escola}/edit', 'GET', 'edit', '', '2018-11-25 22:48:42', '2018-11-25 22:48:42', NULL),
(7, 'api/escolas/{escola}', 'PUT', 'update', '', '2018-11-25 22:48:42', '2018-11-25 22:48:42', NULL),
(8, 'api/escolas/{escola}', 'DELETE', 'destroy', '', '2018-11-25 22:48:42', '2018-11-25 22:48:42', NULL),
(9, 'api/pessoas', 'GET', 'index', '', '2018-11-25 22:48:42', '2018-11-25 22:48:42', NULL),
(10, 'api/pessoas/create', 'GET', 'create', '', '2018-11-25 22:48:42', '2018-11-25 22:48:42', NULL),
(11, 'api/pessoas', 'POST', 'store', '', '2018-11-25 22:48:42', '2018-11-25 22:48:42', NULL),
(12, 'api/pessoas/{pessoa}', 'GET', 'show', '', '2018-11-25 22:48:42', '2018-11-25 22:48:42', NULL),
(13, 'api/pessoas/{pessoa}/edit', 'GET', 'edit', '', '2018-11-25 22:48:42', '2018-11-25 22:48:42', NULL),
(14, 'api/pessoas/{pessoa}', 'PUT', 'update', '', '2018-11-25 22:48:42', '2018-11-25 22:48:42', NULL),
(15, 'api/pessoas/{pessoa}', 'DELETE', 'destroy', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(16, 'api/diretores', 'GET', 'index', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(17, 'api/diretores/create', 'GET', 'create', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(18, 'api/diretores', 'POST', 'store', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(19, 'api/diretores/{diretore}', 'GET', 'show', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(20, 'api/diretores/{diretore}/edit', 'GET', 'edit', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(21, 'api/diretores/{diretore}', 'PUT', 'update', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(22, 'api/diretores/{diretore}', 'DELETE', 'destroy', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(23, 'api/coordenadores', 'GET', 'index', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(24, 'api/coordenadores/create', 'GET', 'create', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(25, 'api/coordenadores', 'POST', 'store', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(26, 'api/coordenadores/{coordenadore}', 'GET', 'show', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(27, 'api/coordenadores/{coordenadore}/edit', 'GET', 'edit', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(28, 'api/coordenadores/{coordenadore}', 'PUT', 'update', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(29, 'api/coordenadores/{coordenadore}', 'DELETE', 'destroy', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(30, 'api/professores', 'GET', 'index', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(31, 'api/professores/create', 'GET', 'create', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(32, 'api/professores', 'POST', 'store', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(33, 'api/professores/{professore}', 'GET', 'show', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(34, 'api/professores/{professore}/edit', 'GET', 'edit', '', '2018-11-25 22:48:43', '2018-11-25 22:48:43', NULL),
(35, 'api/professores/{professore}', 'PUT', 'update', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(36, 'api/professores/{professore}', 'DELETE', 'destroy', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(37, 'api/alunos', 'GET', 'index', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(38, 'api/alunos/create', 'GET', 'create', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(39, 'api/alunos', 'POST', 'store', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(40, 'api/alunos/{aluno}', 'GET', 'show', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(41, 'api/alunos/{aluno}/edit', 'GET', 'edit', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(42, 'api/alunos/{aluno}', 'PUT', 'update', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(43, 'api/alunos/{aluno}', 'DELETE', 'destroy', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(44, 'api/periodos', 'GET', 'index', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(45, 'api/periodos/create', 'GET', 'create', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(46, 'api/periodos', 'POST', 'store', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(47, 'api/periodos/{periodo}', 'GET', 'show', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(48, 'api/periodos/{periodo}/edit', 'GET', 'edit', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(49, 'api/periodos/{periodo}', 'PUT', 'update', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(50, 'api/periodos/{periodo}', 'DELETE', 'destroy', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(51, 'api/testes', 'GET', 'index', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(52, 'api/testes/create', 'GET', 'create', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(53, 'api/testes', 'POST', 'store', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(54, 'api/testes/{testis}', 'GET', 'show', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(55, 'api/testes/{testis}/edit', 'GET', 'edit', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(56, 'api/testes/{testis}', 'PUT', 'update', '', '2018-11-25 22:48:44', '2018-11-25 22:48:44', NULL),
(57, 'api/testes/{testis}', 'DELETE', 'destroy', '', '2018-11-25 22:48:45', '2018-11-25 22:48:45', NULL),
(58, 'api/cursos', 'GET', 'index', '', '2018-11-25 22:48:45', '2018-11-25 22:48:45', NULL),
(59, 'api/cursos/create', 'GET', 'create', '', '2018-11-25 22:48:45', '2018-11-25 22:48:45', NULL),
(60, 'api/cursos', 'POST', 'store', '', '2018-11-25 22:48:45', '2018-11-25 22:48:45', NULL),
(61, 'api/cursos/{curso}', 'GET', 'show', '', '2018-11-25 22:48:45', '2018-11-25 22:48:45', NULL),
(62, 'api/cursos/{curso}/edit', 'GET', 'edit', '', '2018-11-25 22:48:45', '2018-11-25 22:48:45', NULL),
(63, 'api/cursos/{curso}', 'PUT', 'update', '', '2018-11-25 22:48:45', '2018-11-25 22:48:45', NULL),
(64, 'api/cursos/{curso}', 'DELETE', 'destroy', '', '2018-11-25 22:48:45', '2018-11-25 22:48:45', NULL),
(65, 'api/curso_professors', 'GET', 'index', '', '2018-11-25 22:48:45', '2018-11-25 22:48:45', NULL),
(66, 'api/curso_professors/create', 'GET', 'create', '', '2018-11-25 22:48:45', '2018-11-25 22:48:45', NULL),
(67, 'api/curso_professors', 'POST', 'store', '', '2018-11-25 22:48:45', '2018-11-25 22:48:45', NULL),
(68, 'api/curso_professors/{curso_professor}', 'GET', 'show', '', '2018-11-25 22:48:45', '2018-11-25 22:48:45', NULL),
(69, 'api/curso_professors/{curso_professor}/edit', 'GET', 'edit', '', '2018-11-25 22:48:45', '2018-11-25 22:48:45', NULL),
(70, 'api/curso_professors/{curso_professor}', 'PUT', 'update', '', '2018-11-25 22:48:45', '2018-11-25 22:48:45', NULL),
(71, 'api/curso_professors/{curso_professor}', 'DELETE', 'destroy', '', '2018-11-25 22:48:45', '2018-11-25 22:48:45', NULL),
(72, 'api/turmas', 'GET', 'index', '', '2018-11-25 22:48:45', '2018-11-25 22:48:45', NULL),
(73, 'api/turmas/create', 'GET', 'create', '', '2018-11-25 22:48:45', '2018-11-25 22:48:45', NULL),
(74, 'api/turmas', 'POST', 'store', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(75, 'api/turmas/{turma}', 'GET', 'show', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(76, 'api/turmas/{turma}/edit', 'GET', 'edit', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(77, 'api/turmas/{turma}', 'PUT', 'update', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(78, 'api/turmas/{turma}', 'DELETE', 'destroy', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(79, 'api/salas', 'GET', 'index', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(80, 'api/salas/create', 'GET', 'create', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(81, 'api/salas', 'POST', 'store', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(82, 'api/salas/{sala}', 'GET', 'show', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(83, 'api/salas/{sala}/edit', 'GET', 'edit', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(84, 'api/salas/{sala}', 'PUT', 'update', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(85, 'api/salas/{sala}', 'DELETE', 'destroy', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(86, 'api/recursos', 'GET', 'index', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(87, 'api/recursos/create', 'GET', 'create', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(88, 'api/recursos', 'POST', 'store', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(89, 'api/recursos/{recurso}', 'GET', 'show', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(90, 'api/recursos/{recurso}/edit', 'GET', 'edit', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(91, 'api/recursos/{recurso}', 'PUT', 'update', '', '2018-11-25 22:48:46', '2018-11-25 22:48:46', NULL),
(92, 'api/recursos/{recurso}', 'DELETE', 'destroy', '', '2018-11-25 22:48:47', '2018-11-25 22:48:47', NULL),
(93, 'api/nota_frequencias', 'GET', 'index', '', '2018-11-25 22:48:47', '2018-11-25 22:48:47', NULL),
(94, 'api/nota_frequencias/create', 'GET', 'create', '', '2018-11-25 22:48:47', '2018-11-25 22:48:47', NULL),
(95, 'api/nota_frequencias', 'POST', 'store', '', '2018-11-25 22:48:47', '2018-11-25 22:48:47', NULL),
(96, 'api/nota_frequencias/{nota_frequencia}', 'GET', 'show', '', '2018-11-25 22:48:47', '2018-11-25 22:48:47', NULL),
(97, 'api/nota_frequencias/{nota_frequencia}/edit', 'GET', 'edit', '', '2018-11-25 22:48:47', '2018-11-25 22:48:47', NULL),
(98, 'api/nota_frequencias/{nota_frequencia}', 'PUT', 'update', '', '2018-11-25 22:48:47', '2018-11-25 22:48:47', NULL),
(99, 'api/nota_frequencias/{nota_frequencia}', 'DELETE', 'destroy', '', '2018-11-25 22:48:47', '2018-11-25 22:48:47', NULL),
(100, 'api/turma_recursos', 'GET', 'index', '', '2018-11-25 22:48:47', '2018-11-25 22:48:47', NULL),
(101, 'api/turma_recursos/create', 'GET', 'create', '', '2018-11-25 22:48:47', '2018-11-25 22:48:47', NULL),
(102, 'api/turma_recursos', 'POST', 'store', '', '2018-11-25 22:48:47', '2018-11-25 22:48:47', NULL),
(103, 'api/turma_recursos/{turma_recurso}', 'GET', 'show', '', '2018-11-25 22:48:47', '2018-11-25 22:48:47', NULL),
(104, 'api/turma_recursos/{turma_recurso}/edit', 'GET', 'edit', '', '2018-11-25 22:48:47', '2018-11-25 22:48:47', NULL),
(105, 'api/turma_recursos/{turma_recurso}', 'PUT', 'update', '', '2018-11-25 22:48:47', '2018-11-25 22:48:47', NULL),
(106, 'api/turma_recursos/{turma_recurso}', 'DELETE', 'destroy', '', '2018-11-25 22:48:47', '2018-11-25 22:48:47', NULL),
(107, 'api/turma_salas', 'GET', 'index', '', '2018-11-25 22:48:47', '2018-11-25 22:48:47', NULL),
(108, 'api/turma_salas/create', 'GET', 'create', '', '2018-11-25 22:48:47', '2018-11-25 22:48:47', NULL),
(109, 'api/turma_salas', 'POST', 'store', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(110, 'api/turma_salas/{turma_sala}', 'GET', 'show', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(111, 'api/turma_salas/{turma_sala}/edit', 'GET', 'edit', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(112, 'api/turma_salas/{turma_sala}', 'PUT', 'update', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(113, 'api/turma_salas/{turma_sala}', 'DELETE', 'destroy', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(114, 'api/rotas', 'GET', 'index', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(115, 'api/rotas/create', 'GET', 'create', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(116, 'api/rotas', 'POST', 'store', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(117, 'api/rotas/{rota}', 'GET', 'show', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(118, 'api/rotas/{rota}/edit', 'GET', 'edit', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(119, 'api/rotas/{rota}', 'PUT', 'update', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(120, 'api/rotas/{rota}', 'DELETE', 'destroy', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(121, '/', 'GET', 'Closure', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(122, 'login', 'GET', 'showLoginForm', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(123, 'login', 'POST', 'login', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(124, 'logout', 'POST', 'logout', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(125, 'register', 'GET', 'showRegistrationForm', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(126, 'register', 'POST', 'register', '', '2018-11-25 22:48:48', '2018-11-25 22:48:48', NULL),
(127, 'password/reset', 'GET', 'showLinkRequestForm', '', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(128, 'password/email', 'POST', 'sendResetLinkEmail', '', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(129, 'password/reset/{token}', 'GET', 'showResetForm', '', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(130, 'password/reset', 'POST', 'reset', '', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(131, 'home', 'GET', 'index', 'Home', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(132, 'generator_builder', 'GET', 'builder', '', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(133, 'field_template', 'GET', 'fieldTemplate', '', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(134, 'generator_builder/generate', 'POST', 'generate', '', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(135, 'escolas', 'GET', 'index', 'Escolas', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(136, 'escolas/create', 'GET', 'create', 'Escolas', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(137, 'escolas', 'POST', 'store', 'Escolas', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(138, 'escolas/{escola}', 'GET', 'show', 'Escolas', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(139, 'escolas/{escola}/edit', 'GET', 'edit', 'Escolas', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(140, 'escolas/{escola}', 'PUT', 'update', 'Escolas', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(141, 'escolas/{escola}', 'DELETE', 'destroy', 'Escolas', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(142, 'pessoas', 'GET', 'index', 'Pessoas', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(143, 'pessoas/create', 'GET', 'create', 'Pessoas', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(144, 'pessoas', 'POST', 'store', 'Pessoas', '2018-11-25 22:48:49', '2018-11-25 22:48:49', NULL),
(145, 'pessoas/{pessoa}', 'GET', 'show', 'Pessoas', '2018-11-25 22:48:50', '2018-11-25 22:48:50', NULL),
(146, 'pessoas/{pessoa}/edit', 'GET', 'edit', 'Pessoas', '2018-11-25 22:48:50', '2018-11-25 22:48:50', NULL),
(147, 'pessoas/{pessoa}', 'PUT', 'update', 'Pessoas', '2018-11-25 22:48:50', '2018-11-25 22:48:50', NULL),
(148, 'pessoas/{pessoa}', 'DELETE', 'destroy', 'Pessoas', '2018-11-25 22:48:50', '2018-11-25 22:48:50', NULL),
(149, 'diretores', 'GET', 'index', 'Diretores', '2018-11-25 22:48:50', '2018-11-25 22:48:50', NULL),
(150, 'diretores/create', 'GET', 'create', 'Diretores', '2018-11-25 22:48:50', '2018-11-25 22:48:50', NULL),
(151, 'diretores', 'POST', 'store', 'Diretores', '2018-11-25 22:48:50', '2018-11-25 22:48:50', NULL),
(152, 'diretores/{diretore}', 'GET', 'show', 'Diretores', '2018-11-25 22:48:50', '2018-11-25 22:48:50', NULL),
(153, 'diretores/{diretore}/edit', 'GET', 'edit', 'Diretores', '2018-11-25 22:48:50', '2018-11-25 22:48:50', NULL),
(154, 'diretores/{diretore}', 'PUT', 'update', 'Diretores', '2018-11-25 22:48:50', '2018-11-25 22:48:50', NULL),
(155, 'diretores/{diretore}', 'DELETE', 'destroy', 'Diretores', '2018-11-25 22:48:50', '2018-11-25 22:48:50', NULL),
(156, 'coordenadores', 'GET', 'index', 'Coordenadores', '2018-11-25 22:48:50', '2018-11-25 22:48:50', NULL),
(157, 'coordenadores/create', 'GET', 'create', 'Coordenadores', '2018-11-25 22:48:50', '2018-11-25 22:48:50', NULL),
(158, 'coordenadores', 'POST', 'store', 'Coordenadores', '2018-11-25 22:48:50', '2018-11-25 22:48:50', NULL),
(159, 'coordenadores/{coordenadore}', 'GET', 'show', 'Coordenadores', '2018-11-25 22:48:50', '2018-11-25 22:48:50', NULL),
(160, 'coordenadores/{coordenadore}/edit', 'GET', 'edit', 'Coordenadores', '2018-11-25 22:48:50', '2018-11-25 22:48:50', NULL),
(161, 'coordenadores/{coordenadore}', 'PUT', 'update', 'Coordenadores', '2018-11-25 22:48:50', '2018-11-25 22:48:50', NULL),
(162, 'coordenadores/{coordenadore}', 'DELETE', 'destroy', 'Coordenadores', '2018-11-25 22:48:51', '2018-11-25 22:48:51', NULL),
(163, 'professores', 'GET', 'index', 'Professores', '2018-11-25 22:48:51', '2018-11-25 22:48:51', NULL),
(164, 'professores/create', 'GET', 'create', 'Professores', '2018-11-25 22:48:51', '2018-11-25 22:48:51', NULL),
(165, 'professores', 'POST', 'store', 'Professores', '2018-11-25 22:48:51', '2018-11-25 22:48:51', NULL),
(166, 'professores/{professore}', 'GET', 'show', 'Professores', '2018-11-25 22:48:51', '2018-11-25 22:48:51', NULL),
(167, 'professores/{professore}/edit', 'GET', 'edit', 'Professores', '2018-11-25 22:48:51', '2018-11-25 22:48:51', NULL),
(168, 'professores/{professore}', 'PUT', 'update', 'Professores', '2018-11-25 22:48:51', '2018-11-25 22:48:51', NULL),
(169, 'professores/{professore}', 'DELETE', 'destroy', 'Professores', '2018-11-25 22:48:51', '2018-11-25 22:48:51', NULL),
(170, 'alunos', 'GET', 'index', 'Alunos', '2018-11-25 22:48:51', '2018-11-25 22:48:51', NULL),
(171, 'alunos/create', 'GET', 'create', 'Alunos', '2018-11-25 22:48:51', '2018-11-25 22:48:51', NULL),
(172, 'alunos', 'POST', 'store', 'Alunos', '2018-11-25 22:48:51', '2018-11-25 22:48:51', NULL),
(173, 'alunos/{aluno}', 'GET', 'show', 'Alunos', '2018-11-25 22:48:51', '2018-11-25 22:48:51', NULL),
(174, 'alunos/{aluno}/edit', 'GET', 'edit', 'Alunos', '2018-11-25 22:48:51', '2018-11-25 22:48:51', NULL),
(175, 'alunos/{aluno}', 'PUT', 'update', 'Alunos', '2018-11-25 22:48:51', '2018-11-25 22:48:51', NULL),
(176, 'alunos/{aluno}', 'DELETE', 'destroy', 'Alunos', '2018-11-25 22:48:51', '2018-11-25 22:48:51', NULL),
(177, 'periodos', 'GET', 'index', 'Periodos', '2018-11-25 22:48:51', '2018-11-25 22:48:51', NULL),
(178, 'periodos/create', 'GET', 'create', 'Periodos', '2018-11-25 22:48:52', '2018-11-25 22:48:52', NULL),
(179, 'periodos', 'POST', 'store', 'Periodos', '2018-11-25 22:48:52', '2018-11-25 22:48:52', NULL),
(180, 'periodos/{periodo}', 'GET', 'show', 'Periodos', '2018-11-25 22:48:52', '2018-11-25 22:48:52', NULL),
(181, 'periodos/{periodo}/edit', 'GET', 'edit', 'Periodos', '2018-11-25 22:48:52', '2018-11-25 22:48:52', NULL),
(182, 'periodos/{periodo}', 'PUT', 'update', 'Periodos', '2018-11-25 22:48:52', '2018-11-25 22:48:52', NULL),
(183, 'periodos/{periodo}', 'DELETE', 'destroy', 'Periodos', '2018-11-25 22:48:52', '2018-11-25 22:48:52', NULL),
(184, 'cursos', 'GET', 'index', 'Cursos', '2018-11-25 22:48:52', '2018-11-25 22:48:52', NULL),
(185, 'cursos/create', 'GET', 'create', 'Cursos', '2018-11-25 22:48:52', '2018-11-25 22:48:52', NULL),
(186, 'cursos', 'POST', 'store', 'Cursos', '2018-11-25 22:48:52', '2018-11-25 22:48:52', NULL),
(187, 'cursos/{curso}', 'GET', 'show', 'Cursos', '2018-11-25 22:48:52', '2018-11-25 22:48:52', NULL),
(188, 'cursos/{curso}/edit', 'GET', 'edit', 'Cursos', '2018-11-25 22:48:52', '2018-11-25 22:48:52', NULL),
(189, 'cursos/{curso}', 'PUT', 'update', 'Cursos', '2018-11-25 22:48:52', '2018-11-25 22:48:52', NULL),
(190, 'cursos/{curso}', 'DELETE', 'destroy', 'Cursos', '2018-11-25 22:48:52', '2018-11-25 22:48:52', NULL),
(191, 'cursoProfessors', 'GET', 'index', 'CursoProfessor', '2018-11-25 22:48:52', '2018-11-25 22:48:52', NULL),
(192, 'cursoProfessors/create', 'GET', 'create', 'CursoProfessor', '2018-11-25 22:48:52', '2018-11-25 22:48:52', NULL),
(193, 'cursoProfessors', 'POST', 'store', 'CursoProfessor', '2018-11-25 22:48:52', '2018-11-25 22:48:52', NULL),
(194, 'cursoProfessors/{cursoProfessor}', 'GET', 'show', 'CursoProfessor', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(195, 'cursoProfessors/{cursoProfessor}/edit', 'GET', 'edit', 'CursoProfessor', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(196, 'cursoProfessors/{cursoProfessor}', 'PUT', 'update', 'CursoProfessor', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(197, 'cursoProfessors/{cursoProfessor}', 'DELETE', 'destroy', 'CursoProfessor', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(198, 'cursoProfessors/create/{id}', 'GET', 'create', 'CursoProfessor', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(199, 'turmas/create/{id}', 'GET', 'create', 'Turmas', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(200, 'turmas/curso/{id}', 'GET', 'index', 'Turmas', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(201, 'turmas', 'GET', 'index', 'Turmas', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(202, 'turmas/create', 'GET', 'create', 'Turmas', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(203, 'turmas', 'POST', 'store', 'Turmas', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(204, 'turmas/{turma}', 'GET', 'show', 'Turmas', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(205, 'turmas/{turma}/edit', 'GET', 'edit', 'Turmas', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(206, 'turmas/{turma}', 'PUT', 'update', 'Turmas', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(207, 'turmas/{turma}', 'DELETE', 'destroy', 'Turmas', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(208, 'salas', 'GET', 'index', 'Salas', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(209, 'salas/create', 'GET', 'create', 'Salas', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(210, 'salas', 'POST', 'store', 'Salas', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(211, 'salas/{sala}', 'GET', 'show', 'Salas', '2018-11-25 22:48:53', '2018-11-25 22:48:53', NULL),
(212, 'salas/{sala}/edit', 'GET', 'edit', 'Salas', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(213, 'salas/{sala}', 'PUT', 'update', 'Salas', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(214, 'salas/{sala}', 'DELETE', 'destroy', 'Salas', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(215, 'recursos', 'GET', 'index', 'Recursos', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(216, 'recursos/create', 'GET', 'create', 'Recursos', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(217, 'recursos', 'POST', 'store', 'Recursos', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(218, 'recursos/{recurso}', 'GET', 'show', 'Recursos', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(219, 'recursos/{recurso}/edit', 'GET', 'edit', 'Recursos', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(220, 'recursos/{recurso}', 'PUT', 'update', 'Recursos', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(221, 'recursos/{recurso}', 'DELETE', 'destroy', 'Recursos', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(222, 'notaFrequencias', 'GET', 'index', 'NotaFrequencia', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(223, 'notaFrequencias/create', 'GET', 'create', 'NotaFrequencia', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(224, 'notaFrequencias', 'POST', 'store', 'NotaFrequencia', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(225, 'notaFrequencias/{notaFrequencia}', 'GET', 'show', 'NotaFrequencia', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(226, 'notaFrequencias/{notaFrequencia}/edit', 'GET', 'edit', 'NotaFrequencia', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(227, 'notaFrequencias/{notaFrequencia}', 'PUT', 'update', 'NotaFrequencia', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(228, 'notaFrequencias/{notaFrequencia}', 'DELETE', 'destroy', 'NotaFrequencia', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(229, 'notaFrequencias/turma/{id}', 'GET', 'index', 'NotaFrequencia', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(230, 'notaFrequencias/create/turma/{id}', 'GET', 'create', 'NotaFrequencia', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(231, 'turmaRecursos', 'GET', 'index', 'TurmaRecurso', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(232, 'turmaRecursos/create', 'GET', 'create', 'TurmaRecurso', '2018-11-25 22:48:54', '2018-11-25 22:48:54', NULL),
(233, 'turmaRecursos', 'POST', 'store', 'TurmaRecurso', '2018-11-25 22:48:55', '2018-11-25 22:48:55', NULL),
(234, 'turmaRecursos/{turmaRecurso}', 'GET', 'show', 'TurmaRecurso', '2018-11-25 22:48:55', '2018-11-25 22:48:55', NULL),
(235, 'turmaRecursos/{turmaRecurso}/edit', 'GET', 'edit', 'TurmaRecurso', '2018-11-25 22:48:55', '2018-11-25 22:48:55', NULL),
(236, 'turmaRecursos/{turmaRecurso}', 'PUT', 'update', 'TurmaRecurso', '2018-11-25 22:48:55', '2018-11-25 22:48:55', NULL),
(237, 'turmaRecursos/{turmaRecurso}', 'DELETE', 'destroy', 'TurmaRecurso', '2018-11-25 22:48:55', '2018-11-25 22:48:55', NULL),
(238, 'turmaRecursos/turma/{id}', 'GET', 'index', 'TurmaRecurso', '2018-11-25 22:48:55', '2018-11-25 22:48:55', NULL),
(239, 'turmaRecursos/create/turma/{id}', 'GET', 'create', 'TurmaRecurso', '2018-11-25 22:48:55', '2018-11-25 22:48:55', NULL),
(240, 'turmaSalas', 'GET', 'index', 'TurmaSala', '2018-11-25 22:48:55', '2018-11-25 22:48:55', NULL),
(241, 'turmaSalas/create', 'GET', 'create', 'TurmaSala', '2018-11-25 22:48:55', '2018-11-25 22:48:55', NULL),
(242, 'turmaSalas', 'POST', 'store', 'TurmaSala', '2018-11-25 22:48:55', '2018-11-25 22:48:55', NULL),
(243, 'turmaSalas/{turmaSala}', 'GET', 'show', 'TurmaSala', '2018-11-25 22:48:55', '2018-11-25 22:48:55', NULL),
(244, 'turmaSalas/{turmaSala}/edit', 'GET', 'edit', 'TurmaSala', '2018-11-25 22:48:55', '2018-11-25 22:48:55', NULL),
(245, 'turmaSalas/{turmaSala}', 'PUT', 'update', 'TurmaSala', '2018-11-25 22:48:55', '2018-11-25 22:48:55', NULL),
(246, 'turmaSalas/{turmaSala}', 'DELETE', 'destroy', 'TurmaSala', '2018-11-25 22:48:55', '2018-11-25 22:48:55', NULL),
(247, 'users', 'GET', 'index', 'Users', '2018-11-25 22:48:56', '2018-11-25 22:48:56', NULL),
(248, 'users/create', 'GET', 'create', 'Users', '2018-11-25 22:48:56', '2018-11-25 22:48:56', NULL),
(249, 'users', 'POST', 'store', 'Users', '2018-11-25 22:48:56', '2018-11-25 22:48:56', NULL),
(250, 'users/{user}', 'GET', 'show', 'Users', '2018-11-25 22:48:56', '2018-11-25 22:48:56', NULL),
(251, 'users/{user}/edit', 'GET', 'edit', 'Users', '2018-11-25 22:48:56', '2018-11-25 22:48:56', NULL),
(252, 'users/{user}', 'PUT', 'update', 'Users', '2018-11-25 22:48:56', '2018-11-25 22:48:56', NULL),
(253, 'users/{user}', 'DELETE', 'destroy', 'Users', '2018-11-25 22:48:56', '2018-11-25 22:48:56', NULL),
(254, 'roles', 'GET', 'index', 'Roles', '2018-11-25 22:48:56', '2018-11-25 22:48:56', NULL),
(255, 'roles/create', 'GET', 'create', 'Roles', '2018-11-25 22:48:56', '2018-11-25 22:48:56', NULL),
(256, 'roles', 'POST', 'store', 'Roles', '2018-11-25 22:48:56', '2018-11-25 22:48:56', NULL),
(257, 'roles/{role}', 'GET', 'show', 'Roles', '2018-11-25 22:48:56', '2018-11-25 22:48:56', NULL),
(258, 'roles/{role}/edit', 'GET', 'edit', 'Roles', '2018-11-25 22:48:56', '2018-11-25 22:48:56', NULL),
(259, 'roles/{role}', 'PUT', 'update', 'Roles', '2018-11-25 22:48:56', '2018-11-25 22:48:56', NULL),
(260, 'roles/{role}', 'DELETE', 'destroy', 'Roles', '2018-11-25 22:48:57', '2018-11-25 22:48:57', NULL),
(261, 'permissions', 'GET', 'index', 'Permissions', '2018-11-25 22:48:57', '2018-11-25 22:48:57', NULL),
(262, 'permissions/create', 'GET', 'create', 'Permissions', '2018-11-25 22:48:57', '2018-11-25 22:48:57', NULL),
(263, 'permissions', 'POST', 'store', 'Permissions', '2018-11-25 22:48:57', '2018-11-25 22:48:57', NULL),
(264, 'permissions/{permission}', 'GET', 'show', 'Permissions', '2018-11-25 22:48:57', '2018-11-25 22:48:57', NULL),
(265, 'permissions/{permission}/edit', 'GET', 'edit', 'Permissions', '2018-11-25 22:48:57', '2018-11-25 22:48:57', NULL),
(266, 'permissions/{permission}', 'PUT', 'update', 'Permissions', '2018-11-25 22:48:57', '2018-11-25 22:48:57', NULL),
(267, 'permissions/{permission}', 'DELETE', 'destroy', 'Permissions', '2018-11-25 22:48:57', '2018-11-25 22:48:57', NULL),
(268, 'uprotas', 'GET', 'Closure', '', '2018-11-25 22:48:57', '2018-11-25 22:48:57', NULL),
(269, 'rotas', 'GET', 'index', 'Rotas', '2018-11-25 22:48:57', '2018-11-25 22:48:57', NULL),
(270, 'rotas/create', 'GET', 'create', 'Rotas', '2018-11-25 22:48:57', '2018-11-25 22:48:57', NULL),
(271, 'rotas', 'POST', 'store', 'Rotas', '2018-11-25 22:48:57', '2018-11-25 22:48:57', NULL),
(272, 'rotas/{rota}', 'GET', 'show', 'Rotas', '2018-11-25 22:48:57', '2018-11-25 22:48:57', NULL),
(273, 'rotas/{rota}/edit', 'GET', 'edit', 'Rotas', '2018-11-25 22:48:57', '2018-11-25 22:48:57', NULL),
(274, 'rotas/{rota}', 'PUT', 'update', 'Rotas', '2018-11-25 22:48:57', '2018-11-25 22:48:57', NULL),
(275, 'rotas/{rota}', 'DELETE', 'destroy', 'Rotas', '2018-11-25 22:48:57', '2018-11-25 22:48:57', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `salas`
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
-- Fazendo dump de dados para tabela `salas`
--

INSERT INTO `salas` (`id`, `numero`, `capacidade`, `setor`, `andar`, `corredor`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 101, 40, '1', 1, NULL, '2018-11-05 03:10:08', '2018-11-05 03:10:38', NULL),
(2, 102, 45, '1', 1, NULL, '2018-11-05 03:10:32', '2018-11-05 03:10:32', NULL),
(3, 103, 45, '1', 1, NULL, '2018-11-05 03:10:55', '2018-11-05 03:10:55', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `testes`
--

CREATE TABLE `testes` (
  `id` int(10) UNSIGNED NOT NULL,
  `teste1` tinyint(1) NOT NULL,
  `teste2` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `turmas`
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
-- Fazendo dump de dados para tabela `turmas`
--

INSERT INTO `turmas` (`id`, `curso_id`, `professor_id`, `identificador`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 1, 'MB001', '2018-11-05 03:50:02', '2018-11-05 03:50:02', NULL),
(8, 1, 2, 'MB004', '2018-11-05 05:16:18', '2018-11-05 06:02:42', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma_recurso`
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
-- Fazendo dump de dados para tabela `turma_recurso`
--

INSERT INTO `turma_recurso` (`id`, `recurso_id`, `turma_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 9, 5, '2018-11-05 18:46:15', '2018-11-05 18:54:45', NULL),
(2, 8, 5, '2018-11-05 18:46:32', '2018-11-05 18:46:32', NULL),
(3, 9, 5, '2018-11-05 18:46:40', '2018-11-05 18:48:14', '2018-11-05 18:48:14');

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma_sala`
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
-- Fazendo dump de dados para tabela `turma_sala`
--

INSERT INTO `turma_sala` (`id`, `turma_id`, `sala_id`, `dia_semana`, `hora_inicio`, `hora_fim`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 1, NULL, NULL, NULL, '2018-11-05 03:50:02', '2018-11-05 03:50:02', NULL),
(4, 8, 2, NULL, NULL, NULL, '2018-11-05 05:16:18', '2018-11-05 05:16:18', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Anderson Oliveira', 'andervilo@gmail.com', '$2y$10$4xfY5qWMBVIP80by60JYNuFFCmmrneQwcHuGMTc.5ZLPixyAkcJlK', 'eaLNgvcN2DaqEtGTDFEGMPHxjgdW8F4Ee8JYMCu8qUQYWDCALz4arkYA7T0n', '2018-10-25 02:20:33', '2018-11-23 02:06:10', NULL),
(2, 'José Maria Trindade', 'jmtrindade@mail.com', '$2y$10$BFPknyGFJVGafGJsUyw/GOH18hBqba/xA/pDm6cFkXmYua1gocW.O', NULL, '2018-11-22 20:15:58', '2018-11-22 20:15:58', NULL),
(3, 'Fernando Mitre', 'mitre@mail.com', '$2y$10$nPty8WBK0CNNbIOvALj92OGk3A56jhwT3PsqPgzGgdLZzNS0N/aEu', NULL, '2018-11-22 20:18:51', '2018-11-22 20:18:51', NULL);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alunos_pessoa_id_foreign` (`pessoa_id`);

--
-- Índices de tabela `coordenadores`
--
ALTER TABLE `coordenadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coordenadores_pessoa_id_foreign` (`pessoa_id`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursos_periodo_id_foreign` (`periodo_id`),
  ADD KEY `cursos_coordenador_id_foreign` (`coordenador_id`);

--
-- Índices de tabela `curso_professor`
--
ALTER TABLE `curso_professor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idxprofessor` (`professor_id`),
  ADD KEY `idxcurso` (`curso_id`,`professor_id`) USING BTREE;

--
-- Índices de tabela `diretores`
--
ALTER TABLE `diretores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diretores_pessoa_id_foreign` (`pessoa_id`);

--
-- Índices de tabela `escolas`
--
ALTER TABLE `escolas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Índices de tabela `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Índices de tabela `nota_frequencia`
--
ALTER TABLE `nota_frequencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idxaluno` (`aluno_id`),
  ADD KEY `idxturma` (`turma_id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices de tabela `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periodos_escola_id_foreign` (`escola_id`);

--
-- Índices de tabela `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professores_pessoa_id_foreign` (`pessoa_id`);

--
-- Índices de tabela `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unprati` (`id_patrimonial`);

--
-- Índices de tabela `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Índices de tabela `rotas`
--
ALTER TABLE `rotas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_uni_uri_meth` (`uri`,`method`),
  ADD KEY `idx_uri_meth` (`uri`,`method`);

--
-- Índices de tabela `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unqnumero` (`numero`);

--
-- Índices de tabela `testes`
--
ALTER TABLE `testes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identificador` (`identificador`),
  ADD KEY `idxcurso` (`curso_id`),
  ADD KEY `idxprofessor` (`professor_id`);

--
-- Índices de tabela `turma_recurso`
--
ALTER TABLE `turma_recurso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idxrecurso` (`recurso_id`),
  ADD KEY `idxturma` (`turma_id`);

--
-- Índices de tabela `turma_sala`
--
ALTER TABLE `turma_sala`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turma_id` (`turma_id`),
  ADD KEY `sala_id` (`sala_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `coordenadores`
--
ALTER TABLE `coordenadores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `curso_professor`
--
ALTER TABLE `curso_professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de tabela `diretores`
--
ALTER TABLE `diretores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `escolas`
--
ALTER TABLE `escolas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de tabela `nota_frequencia`
--
ALTER TABLE `nota_frequencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `rotas`
--
ALTER TABLE `rotas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;
--
-- AUTO_INCREMENT de tabela `salas`
--
ALTER TABLE `salas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `testes`
--
ALTER TABLE `testes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de tabela `turma_recurso`
--
ALTER TABLE `turma_recurso`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `turma_sala`
--
ALTER TABLE `turma_sala`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_pessoa_id_foreign` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`);

--
-- Restrições para tabelas `coordenadores`
--
ALTER TABLE `coordenadores`
  ADD CONSTRAINT `coordenadores_pessoa_id_foreign` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`);

--
-- Restrições para tabelas `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_coordenador_id_foreign` FOREIGN KEY (`coordenador_id`) REFERENCES `coordenadores` (`id`),
  ADD CONSTRAINT `cursos_periodo_id_foreign` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`id`);

--
-- Restrições para tabelas `curso_professor`
--
ALTER TABLE `curso_professor`
  ADD CONSTRAINT `FK_Curso` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `FK_Professor` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`);

--
-- Restrições para tabelas `diretores`
--
ALTER TABLE `diretores`
  ADD CONSTRAINT `diretores_pessoa_id_foreign` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`);

--
-- Restrições para tabelas `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `nota_frequencia`
--
ALTER TABLE `nota_frequencia`
  ADD CONSTRAINT `nota_frequencia_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`),
  ADD CONSTRAINT `nota_frequencia_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`);

--
-- Restrições para tabelas `periodos`
--
ALTER TABLE `periodos`
  ADD CONSTRAINT `periodos_escola_id_foreign` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`);

--
-- Restrições para tabelas `professores`
--
ALTER TABLE `professores`
  ADD CONSTRAINT `professores_pessoa_id_foreign` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`);

--
-- Restrições para tabelas `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `FK_Cursos` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `turmas_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`);

--
-- Restrições para tabelas `turma_recurso`
--
ALTER TABLE `turma_recurso`
  ADD CONSTRAINT `turma_recurso_ibfk_1` FOREIGN KEY (`recurso_id`) REFERENCES `recursos` (`id`),
  ADD CONSTRAINT `turma_recurso_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`);

--
-- Restrições para tabelas `turma_sala`
--
ALTER TABLE `turma_sala`
  ADD CONSTRAINT `turma_sala_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`),
  ADD CONSTRAINT `turma_sala_ibfk_2` FOREIGN KEY (`sala_id`) REFERENCES `salas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
