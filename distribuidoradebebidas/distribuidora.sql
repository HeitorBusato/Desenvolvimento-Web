-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25-Maio-2017 às 01:27
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `distribuidora`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bebidas`
--

CREATE TABLE `bebidas` (
  `id_bebida` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `volume` varchar(7) NOT NULL,
  `preco` float NOT NULL,
  `peso` float NOT NULL,
  `qde_estoque` int(11) NOT NULL,
  `fabricante` varchar(20) NOT NULL,
  `dataFabricacao` date NOT NULL,
  `id_categoria` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `bebidas`
--

INSERT INTO `bebidas` (`id_bebida`, `nome`, `descricao`, `volume`, `preco`, `peso`, `qde_estoque`, `fabricante`, `dataFabricacao`, `id_categoria`) VALUES
(1, 'Água Mineral Natural Sem Gas','Nascendo a uma altitude de 1000 metros acima do nível do mar, a nossa Água Mineral é composta por elementos naturais e minerais em perfeito equilíbrio.', '510ml', '0.67', '0.5', 40,'Bem Leve', '2021-09-08' , 1),
(2, 'Cachaça Garrafa', 'Nossa cachaça é feita através de processos produtivos de alta tecnologia e distribuída em larga escala todo o país. ', '965ml', '7.86', '1', 80,'51', '2020-06-08' , 2),
(3, 'Cerveja Lata', 'Essa vai bem no churrasco, na festa, na praia, no happy hour, na piscina... em qualquer lugar e em qualquer época. Com ela é Verão 100% do ano.', '350ml', '2.26', '0.4', 200,'Itaipava', '2021-01-08' , 3),
(4, 'Cerveja long neck', 'Nossa cerveja é a  mais vendida e a marca mais exportada do México. Esta cerveja do tipo Pilsen foi produzida pela primeira vez em 1925 pela Cervecería Modelo.', '330ml', '5.24', '0.4', 500,'Heineken', '2021-05-22' , 3),
(5, 'Energetico Lata', 'Red Bull Energy Drink é apreciado no mundo todo por atletas de elite, profissionais dinâmicos, estudantes ativos e motoristas.', '250ml', '7.01', '0.3', 30,'Red Bull', '2021-07-30' , 4),
(6, 'Gin Garrafa 750ml', 'Tanqueray é melhor standard gin no mercado brasileiro. Ele é tão bom que dá para tomar puro, não tem imperfeições.', '750ml', '103.77', '1.2', 30,'Tanqueray', '2020-03-08' , 5),
(7, 'Gin Garrafa', 'O Gin Bombay Sapphire é conhecido por provocar uma sensação sutil e complexa ao mesmo tempo. Sua característica é ser mais leve e seco do que outros gins disponíveis no mercado.', '750ml', '107.26', '1.2', 15,'Bombay Sapphire', '2019-06-08' , 5),
(8, 'Refrigerante Coca-Cola', 'Criado em 1886 em Atlanta, nos Estados Unidos, por John S. Pemberton, o sabor da Coca-Cola é o mesmo há mais de 130 anos.', '2L', '6.86', '2', 800,'Coca Cola', '2021-07-08' , 6),
(9, 'Refrigerante Dolly Guarana', 'Cuidando da qualidade dos produtos A Dolly é equipada com moderno laboratório que reune equipamentos de última geração.', '2L', '3.90', '2', 500,'Dolly', '2021-09-08' , 6),
(10, 'Refrigerante Guarana Antarctica', 'O primeiro refrigerante com sabor de guaraná feito com frutos direto da amazônia, sem conservantes e sem corantes artificiais.', '2L', '5..35', '2', 450,'Antarctica ', '2021-02-22' , 6),
(11, 'Vinho Tinto Chileno Cabernet Sauvignon', 'Coloração rubi com reflexos violáceos. Aromas de frutas vermelhas frescas, notas florais. Paladar confirma o olfato, com taninos suaves.', '750ml', '23.43', '1.1', 32,'Concha y Toro', '2018-08-08' , 7),
(12, 'Vodka Garrafa', 'A história da Smirnoff® nunca foi, digamos, linear. Produzimos nossa vodka com um alto teor de ousadia. Enfrentamos uma revolução. Sim, a Revolução Russa.', '998ml', '29.19', '1.1', 43,'Smirnoff ', '2020-03-08' , 8),
(13, 'Whisky Red Label', 'JOHNNIE WALKER RED LABEL® é o Blend Pioneiro, que lançou o nosso whisky no mundo. Muito versátil e universalmente atraente, com sabor intenso e vigoroso que se destaca mesmo quando misturado.', '1L', '83.49', '1.3', 27,'Johnnie Walker', '2021-04-08' , 9);



-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(2) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descricao`) VALUES
(1, 'Água Mineral'),
(2, 'Cachaça'),
(3, 'Cerveja'),
(4, 'Energético'),
(5, 'Gin'),
(6, 'Refrigente'),
(7, 'Vinho'),
(8, 'Vodka'),
(9, 'Whisky');


--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id_cidade` int(11) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `CEP` varchar(9) NOT NULL,
  `valorfrete_porPeso` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `cidades`
--

INSERT INTO `cidades` (`id_cidade`, `cidade`, `estado`, `CEP`, `valorfrete_porPeso`) VALUES
(1, 'Alegre', 'ES', '29500-000', '1'),
(2, 'Cachoeiro de Itapemirim', 'ES', '29300-000', '5'),
(3, 'Castelo', 'ES', '29360-000', '5');


-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `email` varchar(35) NOT NULL,
  `senha` varchar(35) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `id_cidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `cnpj`, `telefone`, `endereco`, `email`, `senha`, `admin`, `id_cidade`) VALUES
('2', 'Bar Juao', '19092453233343', '(28) 11111-1111', 'Rua Teste', 'teste@teste.com', 'teste', 0, 2),
('1', 'Bar do Alegre', '19092453233455', '(28) 11111-1111', 'Rua Ali', 'admin@admin.com', 'admin', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_compra` date NOT NULL,
  `valor_total` float NOT NULL,
  `valortotal_frete` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_compra`
--

CREATE TABLE `itens_compra` (
  `id_item` int(11) NOT NULL,
  `id_bebida` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_item` float NOT NULL,
  `id_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bebidas`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `bebidas`
--
ALTER TABLE `bebidas`
  ADD PRIMARY KEY (`id_bebida`);

--
-- Indexes for table `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id_cidade`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indexes for table `itens_compra`
--
ALTER TABLE `itens_compra`
  ADD PRIMARY KEY (`id_item`);

--
-- AUTO_INCREMENT for dumped tables

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bebidas`
--
ALTER TABLE `bebidas`
  MODIFY `id_bebida` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id_cidade` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `itens_compra`
--
ALTER TABLE `itens_compra`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;
  
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
