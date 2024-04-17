-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 17-Abr-2024 às 15:49
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `CalcaAqui`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
                         `id_utilizador` int(11) NOT NULL,
                         `username` varchar(40) NOT NULL,
                         `password` varchar(40) NOT NULL,
                         `email` varchar(70) NOT NULL,
                         `nome` varchar(70) NOT NULL,
                         `genero` varchar(40) DEFAULT NULL,
                         `tipo_utilizador` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`id_utilizador`, `username`, `password`, `email`, `nome`, `genero`, `tipo_utilizador`) VALUES
    (3, 'fbchjea', '123', 'gvwejkg@nfvkjws.com', 'Rodrigo Salvado', 'masculino', 2);

--
-- Acionadores `conta`
--
DELIMITER $$
CREATE TRIGGER `popula_util` AFTER INSERT ON `conta` FOR EACH ROW INSERT INTO utilizador (id_utilizador, username, email) VALUES (new.id_utilizador, new.username, new.email)
    $$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `feedback`
--

CREATE TABLE `feedback` (
                            `id_feedback` int(11) NOT NULL,
                            `id_utilizador` int(11) NOT NULL,
                            `feedback` text NOT NULL,
                            `servico` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_reparacao`
--

CREATE TABLE `pedido_reparacao` (
                                    `id_pedido` int(11) NOT NULL,
                                    `id_utilizador` int(11) NOT NULL,
                                    `data` datetime NOT NULL DEFAULT current_timestamp(),
                                    `foto` varchar(100) DEFAULT NULL,
                                    `descricao` text DEFAULT NULL,
                                    `notas` text DEFAULT NULL,
                                    `servico` varchar(50) NOT NULL,
                                    `calcado` varchar(50) NOT NULL,
                                    `status_pedido` varchar(40) NOT NULL DEFAULT 'Em Espera'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
                           `id_servico` int(11) NOT NULL,
                           `tipo_servico` varchar(50) NOT NULL,
                           `foto` varchar(50) NOT NULL,
                           `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id_servico`, `tipo_servico`, `foto`, `descricao`) VALUES
                                                                              (1, 'Costura de Sapatos', 'costura_sapato.jpeg', 'Sed lorem ipsum dolor sit amet nullam consequat feugiat consequat magna adipiscing magna etiam amet veroeros. Lorem ipsum dolor tempus sit cursus. Tempus nisl et nullam lorem ipsum dolor sit amet aliquam.'),
                                                                              (2, 'Mudar Sola de Sapato', 'mudar_sola.jpg', 'Serviço onde mudamos sola de sapatos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_utilizador`
--

CREATE TABLE `tipo_utilizador` (
                                   `id` int(11) NOT NULL,
                                   `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tipo_utilizador`
--

INSERT INTO `tipo_utilizador` (`id`, `nome`) VALUES
                                                 (1, 'admin'),
                                                 (2, 'utilizador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
                              `id_utilizador` int(11) NOT NULL,
                              `username` varchar(100) NOT NULL,
                              `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id_utilizador`, `username`, `email`) VALUES
    (3, 'fbchjea', 'gvwejkg@nfvkjws.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `conta`
--
ALTER TABLE `conta`
    ADD PRIMARY KEY (`id_utilizador`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `feedback`
--
ALTER TABLE `feedback`
    ADD PRIMARY KEY (`id_feedback`);

--
-- Índices para tabela `pedido_reparacao`
--
ALTER TABLE `pedido_reparacao`
    ADD PRIMARY KEY (`id_pedido`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
    ADD PRIMARY KEY (`id_servico`);

--
-- Índices para tabela `tipo_utilizador`
--
ALTER TABLE `tipo_utilizador`
    ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
    ADD PRIMARY KEY (`id_utilizador`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `conta`
--
ALTER TABLE `conta`
    MODIFY `id_utilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `feedback`
--
ALTER TABLE `feedback`
    MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido_reparacao`
--
ALTER TABLE `pedido_reparacao`
    MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
    MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tipo_utilizador`
--
ALTER TABLE `tipo_utilizador`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
