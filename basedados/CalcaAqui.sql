-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Maio-2024 às 02:28
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `calcaaqui`
--

DROP DATABASE IF EXISTS CalcaAqui;

CREATE DATABASE CalcaAqui;

USE CalcaAqui;

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
                                                                                                                (1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin@admin.com', 'Admin', 'Outro', 1),
                                                                                                                (2, 'Pedro', '202cb962ac59075b964b07152d234b70', 'pedro@pedro.com', 'Pedro', 'Masculino', 2),
                                                                                                                (3, 'João', '202cb962ac59075b964b07152d234b70', 'joao@joao.com', 'Joao', 'Masculino', 2),
                                                                                                                (4, 'Rodrigo', '202cb962ac59075b964b07152d234b70', 'rodrigo@rodrigo.com', 'Rodrigo', 'Masculino', 2);

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
                            `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `id_utilizador`, `feedback`, `rating`) VALUES
                                                                                  (1, 2, 'No inicio não estava com muita fé, mas como não tinha outra alternativa optei pelo CalçaAqui, melhor decisão possível. Que trabalho bem feito', 4),
                                                                                  (2, 3, 'Excelente serviços, foi tudo muito prático e rápido, uma semana e já tive o meu serviço pronto, recomendo ', 4),
                                                                                  (3, 4, 'Foram muito atenciosos, viram o meu problema e resolveram num instante, quem me dera que fossem todos assim!', 5);

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
                                    `senha` varchar(10) NOT NULL,
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
                                                                              (1, 'Costura de Calçado', 'costura.jpg', 'Além de repararmos as costuras danificadas, oferecemos uma ampla gama de serviços de costura para calçados, como ajustes personalizados para garantir que se ajusta perfeitamente ao seu pé. Utilizamos materiais da mais alta qualidade e técnicas de costura especializadas para assegurar não apenas a restauração da funcionalidade, mas também a preservação da estética original dos seus sapatos. A nossa equipa é experiente e dedicada, e está comprometida a proporcionar um serviço excepcional, onde cada par de sapatos é tratado com cuidado e com atenção aos detalhes. Confie em nós para restaurar os seus sapatos favoritos, mantendo-os elegantes e confortáveis por muito mais tempo.'),
                                                                              (2, 'Muda de Capas e Solas', 'muda_solas.jpg', 'Com a nossa equipa altamente qualificada e através de materiais de alta qualidade, restauramos a integridade e o visual dos seus sapatos favoritos. Seja para consertar aquela ranhura na sola ou para renovar completamente o aspecto das capas, o nosso serviço personalizado visa atender as suas necessidades individuais. Além disso, não garantimos apenas a durabilidade, mas também um estilo e conforto duradouro, para que possa aproveitar os seus sapatos por muito mais tempo. Deixe-nos cuidar dos detalhes, enquanto desfruta dos seus “novos” sapatos.'),
                                                                              (3, 'Engraxamento', 'engraxamento.jpg', 'Complementamos os nossos serviços com uma variedade de opções personalizadas para atender às suas necessidades específicas. Seja a aplicação de produtos impermeabilizantes para proteger os seus sapatos em dias chuvosos, ou a utilização de técnicas de restauração para devolver o vigor aos calçados desgastados, estamos comprometidos a oferecer um serviço completo e de alta qualidade. Além disso, a nossa equipa está sempre disponível para oferecer conselhos especializados sobre cuidados a ter com os sapatos e recomendações de produtos para manter a sua coleção em ótimo estado. Garantimos que os seus sapatos irão brilhar, mas também serão duráveis e adequados para qualquer ocasião.'),
                                                                              (4, 'Limpeza de Calçado', 'limpeza.jpg', 'O nosso serviço de limpeza de calçado é feito com produtos de alta qualidade e técnicas especializadas para remover manchas difíceis, renovar cores murchas e eliminar odores indesejados. Além disso, oferecemos um cuidado personalizado, adaptado às necessidades específicas de cada material, seja couro, camurça, tecido ou sintético. A nossa equipa dedicada está comprometida a proporcionar um serviço excepcional, garantindo que os seus sapatos favoritos estejam sempre prontos para qualquer ocasião, com uma aparência impecável e uma vida útil prolongada.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
                          `id` int(11) NOT NULL,
                          `status` varchar(50) NOT NULL,
                          `cor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `status`, `cor`) VALUES
                                                 (1, 'Em Espera', 'lightblue'),
                                                 (2, 'Em Progresso', 'Yellow'),
                                                 (3, 'Concluído', 'Green'),
                                                 (4, 'Recusar', 'Red');

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
                                                                    (1, 'admin', 'admin@admin.com'),
                                                                    (2, 'Pedro', 'pedro@pedro.com'),
                                                                    (3, 'João', 'joao@joao.com'),
                                                                    (4, 'Rodrigo', 'rodrigo@rodrigo.com');

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
-- Índices para tabela `status`
--
ALTER TABLE `status`
    ADD PRIMARY KEY (`id`);

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
    MODIFY `id_utilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `feedback`
--
ALTER TABLE `feedback`
    MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pedido_reparacao`
--
ALTER TABLE `pedido_reparacao`
    MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
    MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipo_utilizador`
--
ALTER TABLE `tipo_utilizador`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
