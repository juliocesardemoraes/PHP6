-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.16-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema syspacientes
--

CREATE DATABASE IF NOT EXISTS syspacientes;
USE syspacientes;

--
-- Definition of table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL auto_increment,
  `idPessoa` int(11) default NULL,
  `data_entrada` varchar(10) default NULL,
  `comorbidade` varchar(100) default NULL,
  `grau` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pacientes`
--

/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` (`id`,`idPessoa`,`data_entrada`,`comorbidade`,`grau`) VALUES 
 (1,1,'17/09/2020','Pressão alta',2),
 (2,2,'17/09/2020','Diabetes',3),
 (5,4,'18/09/2020','Teste2222',6),
 (7,4,'18/09/2020','Teste333333333',5),
 (8,4,'18/09/2020','Teste4',10),
 (9,2,'25/09/2020','Teste',1),
 (10,5,'25/09/2020','Teste11111',1),
 (11,10,'25/09/2020','Vamos mais um',10),
 (12,11,'25/09/2020','Vamos mais um',10),
 (13,11,'25/09/2020','Vamos mais um',10),
 (14,11,'25/09/2020','Vamos mais um',10),
 (15,2,'25/09/2020','Teste Comorbidade',5),
 (16,2,'10/09/2020','adnfçlajdflaskjdfçlkadsjfçlkjasdçldfjkasls',9),
 (17,13,'10/08/2019','TesteTesteTeste',10);
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;


--
-- Definition of table `tipo_acesso`
--

DROP TABLE IF EXISTS `tipo_acesso`;
CREATE TABLE `tipo_acesso` (
  `id` int(11) NOT NULL auto_increment,
  `descricao` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_acesso`
--

/*!40000 ALTER TABLE `tipo_acesso` DISABLE KEYS */;
INSERT INTO `tipo_acesso` (`id`,`descricao`) VALUES 
 (1,'ADMIN'),
 (2,'USER'),
 (3,'PACIENTE');
/*!40000 ALTER TABLE `tipo_acesso` ENABLE KEYS */;


--
-- Definition of table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(50) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo_acesso` int(11) NOT NULL default '2',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`,`email`,`senha`,`nome`,`tipo_acesso`) VALUES 
 (1,'eduardohmferreira@gmail.com','admin','Eduardo Henrique',1),
 (2,'admin@admin.com','123456','ADMIN DA SILVA',2),
 (3,'admin2@admin.com.br','123456','NOVO ADMIN DA SILVAS',3);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
