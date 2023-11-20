CREATE DATABASE leilao;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `contato` (
  `idContato` int(11) NOT NULL,
  `Descr` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`idContato`, `Descr`) VALUES
(1, 'bla'),
(2, 'talcoisa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `desapego`
--

CREATE TABLE `desapego` (
  `idDesapego` int(11) NOT NULL,
  `NomeProduto` varchar(100) NOT NULL,
  `Valor` varchar(50) NOT NULL,
  `Link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `desapego`
--

INSERT INTO `desapego` (`idDesapego`, `NomeProduto`, `Valor`, `Link`) VALUES
(9, 'tal', '22', 'https://cdn.sistemawbuy.com.br/arquivos/8396f6cdc4ecfdde50f447ad12127860/produtos/TOU1ZU5/download-41-64a724f0be233.jpeg'),
(12, 'qqq', '100', 'https://tse4.mm.bing.net/th?id=OIP.wm5y5PxukIKIVY7D34jKWAHaI9&pid=Api&P=0&h=180');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lance`
--

CREATE TABLE `lance` (
  `idLance` int(11) NOT NULL,
  `ValorLance` varchar(50) NOT NULL,
  `idDesapego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lance`
--

INSERT INTO `lance` (`idLance`, `ValorLance`, `idDesapego`) VALUES
(12, '333333', 0),
(13, 'dddd', 0),
(16, '33', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Senha` varchar(50) NOT NULL,
  `ConfSenha` varchar(50) NOT NULL,
  `Nasc` date NOT NULL,
  `Sexo` varchar(50) NOT NULL,
  `CEP` varchar(50) NOT NULL,
  `Perfil` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `Nome`, `Email`, `Senha`, `ConfSenha`, `Nasc`, `Sexo`, `CEP`, `Perfil`) VALUES
(1, 'Pabline Eduarda do Nascimento', 'pablineduda@gmail.com', '123', '123', '2004-08-10', 'female', '37860-000', 1),
(2, 'ADM', 'adm@adm', 'adm1', 'adm1', '2023-09-06', 'indif', 'indif', 0),
(3, 'Pabline Eduarda do Nascimento', 'teste@teste', '123', '123', '2000-12-14', 'female', '37860-000', 1),
(4, 'teste', 'email@ea', '123', '123', '2000-02-10', 'female', '121212', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`idContato`);

--
-- Índices para tabela `desapego`
--
ALTER TABLE `desapego`
  ADD PRIMARY KEY (`idDesapego`);

--
-- Índices para tabela `lance`
--
ALTER TABLE `lance`
  ADD PRIMARY KEY (`idLance`),
  ADD KEY `idDesapego` (`idDesapego`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `idContato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `desapego`
--
ALTER TABLE `desapego`
  MODIFY `idDesapego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `lance`
--
ALTER TABLE `lance`
  MODIFY `idLance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
