<?php

class conexao
{

  /*
  Altere as variaveis a seguir caso necessario
  */

  private $host = 'localhost'; // servidor
  private $database = 'database'; // nome do banco
  private $user = 'root'; // usuario do banco
  private $pass = ''; // senha do usuario do banco

  private $con = false;


  public function connect() // estabelece conexao
  {
    try {
      $con = new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->user,$this->pass);
      $this->con = true;
      return $con;
    }
    catch (PDOException $e)
    {
      echo "Erro!: ".$e->getMessage(). "\n";
      die();
      return false;
    }
  }


  public function disconnect() // fecha conexao
  {
    if($this->con)
    {
      if(mysql_close())
      {
        $this->con = false;
        return true;
      }
      else
      {
        return false;
      }
    }
  }

}

?>
