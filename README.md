CRUD em PHP
======================

Pequena aplicação CRUD extremamente simples utilizando o driver PDO.

Requirements:
  * <a href="https://www.mysql.com/">Mysql</a>
  * <a href="http://php.net/manual/pt_BR/ref.pdo-mysql.php">PDO Mysql driver</a>


  * [Proposito da aplicação](#about)
  * [Banco de dados](#bd)
  * [Pasta config](#config)
	  * [conexao.php](#conexao)
	  * [Classe Pessoa](#pessoa)

  ##about

  A aplicação trata das quatro operações básicas de manipulação de um objeto usuário, o motivo dessa aplicação é de maneira nenhuma definir o padrão de desenvolvimento, mais sim auxiliar todos os que estão tendo o primeiro contato OOP em PHP.

  ##bd

  Script SQL do Banco:

  ```
  -- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.8-log


/*!40101 SET OLD_CHARACTER_SET_CLIENT=CHARACTER_SET_CLIENT */;
/*!40101 SET OLD_CHARACTER_SET_RESULTS=CHARACTER_SET_RESULTS */;
/*!40101 SET OLD_COLLATION_CONNECTION=COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET OLD_UNIQUE_CHECKS=UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET OLD_FOREIGN_KEY_CHECKS=FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET OLD_SQL_MODE=SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

--
-- Create schema crud
--

CREATE DATABASE IF NOT EXISTS crud;
USE crud;

--
-- Definition of table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE `pessoa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pessoa`
--

/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;

/*!40101 SET SQL_MODE=OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=OLD_CHARACTER_SET_CLIENT */;
  ```

  ##config
  ###conexao

  Nesta pasta contém o arquivo de configuração do banco de dados conexao.php, nele você deve alterar somente os dados pertecente ao seu banco local

  ```
  private $host = 'localhost'; // servidor
  private $database = 'database'; // nome do banco
  private $user = 'root'; // usuario do banco
  private $pass = ''; // senha do usuario do banco

  ```

  ###pessoa

  Nesta classe contém as operção CRUD, exceto a leitura, caso ache necessário tome como base o método atualizar para listar um objeto específico.

  **Métodos:**

|Nome|Tipo|Parâmetro|Descriçao|
|--------|---------|---------|---------|
|inserir|**get**|**Obrigatorio**|Salva um registro novo|
|atualizar|**post**|**Obrigatorio**|Autaliza registro|
|excluir|**post**|**Obrigatorio**|Deleta reistro|