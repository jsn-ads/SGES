-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.24-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para sges
CREATE DATABASE IF NOT EXISTS `sges` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sges`;

-- Copiando estrutura para tabela sges.contas
CREATE TABLE IF NOT EXISTS `contas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `valor` float NOT NULL,
  `situacao` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK__users` (`id_user`),
  CONSTRAINT `FK__users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sges.contas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `contas` DISABLE KEYS */;
/*!40000 ALTER TABLE `contas` ENABLE KEYS */;

-- Copiando estrutura para tabela sges.movimentacoes
CREATE TABLE IF NOT EXISTS `movimentacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL,
  `descricao` int(11) DEFAULT NULL,
  `data_movimentacao` date NOT NULL,
  `id_conta` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK__contas` (`id_conta`),
  CONSTRAINT `FK__contas` FOREIGN KEY (`id_conta`) REFERENCES `contas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sges.movimentacoes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `movimentacoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimentacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela sges.pessoas
CREATE TABLE IF NOT EXISTS `pessoas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `rua` varchar(200) DEFAULT NULL,
  `qd` varchar(5) DEFAULT NULL,
  `lt` varchar(5) DEFAULT NULL,
  `num` varchar(5) DEFAULT NULL,
  `bairro` varchar(200) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_pessoas_users` (`id_user`),
  CONSTRAINT `FK_pessoas_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sges.pessoas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT INTO `pessoas` (`id`, `nome`, `data_nasc`, `telefone`, `cep`, `rua`, `qd`, `lt`, `num`, `bairro`, `cidade`, `estado`, `id_user`) VALUES
	(11, 'Jose Alves de Souza Neto', '1989-11-20', '(62)9 9351-8323', '74.369-660', 'mmm10', '36', '38', '2', 'tres marias III', 'goiania', 'GO', 1);
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;

-- Copiando estrutura para tabela sges.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `token` varchar(200) NOT NULL,
  `navBar` varchar(200) DEFAULT NULL,
  `card` varchar(200) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  `Coluna 10` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sges.users: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`, `nome`, `token`, `navBar`, `card`, `created_at`, `update_at`, `Coluna 10`) VALUES
	(1, 'jsn@gmail.com', '$2y$10$t5ZuYh9R9pQGrk4DC/snO.EbAOWnRzeie8JBjUP.p9ogt..TVx3cW', 'Jose Neto', 'a31b0c5f8dc52194b916a9cbddb128bf', 'dark', '', NULL, NULL, NULL),
	(2, 'cris@gmail.com', '$2y$10$IKc6Pdsbj56TujZx8NxYPu15mPNAXhivE23B2UlIpraWZdgM.xZUq', 'Cristina ', 'ba6a4588bf0c3ed3e2ac85f0a260bc76', 'blue', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
