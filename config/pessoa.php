<?php

require_once 'conexao.php';

/** Classe CRUD - Create, Recovery, Update and Delete
* author - Rodolfo Leonardo Medeiros
* date - 25/09/2009
* Arquivo - codigo.php
* package crud
*/

class Pessoa
{

  private $table = "pessoa";
  private $con;

  public function __construct()
  {
    $con = new conexao();
    $con->connect();
    $this->con = $con;
  }

  /** Método inserir
  * method inserir
  * param string $campos
  * param string $valores
  * return void
  */
  public function inserir($valores)
  {
    try
    {
      $this->con->connect()->exec("INSERT INTO pessoa (nome,sobrenome) VALUES ($valores)");
    }
    catch (PDOExcepetion $e)
    {
      echo "Erro!: ".$e->getMessage()." \n";
    }
  }

  public function atualizar($camposvalores, $where = NULL)
  {
    try
    {
      $this->con->connect()->exec("UPDATE pessoa SET $camposvalores WHERE $where");
    }
    catch (PDOExcepetion $e)
    {
      echo "Erro!: ".$e->getMessage()." \n";
    }
  }

  /** Método excluir
  * method excluir
  * param string $where
  * example: $where = " codigo=2 AND nome='João' "
  * return void
  */
  public function excluir($id)
  {
    try
    {
      $this->con->connect()->exec("DELETE FROM pessoa WHERE id = $id");
    }
    catch (PDOExcepetion $e)
    {
      echo "Erro!: ".$e->getMessage()." \n";
    }
  }

}

?>
