<?php
require_once 'config/conexao.php';
require_once 'config/pessoa.php';

$con = new conexao(); // instancia classe de conxao
$con->connect(); // abre conexao com o banco

$result = $con->connect()->query("SELECT * FROM pessoa");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>CRUD genérico OO com PDO</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <a href="formulario.php" id="create">
    Novo Registro
  </a>

  <br>
  <br>

  <table>
    <tbody>
      <tr>
        <td>
          ID
        </td>
        <td>
          Nome
        </td>
        <td>
          Sobrenome
        </td>
        <td>
          Actions
        </td>
      </tr>
    </tbody>
    <?php
    while($row = $result->fetch(PDO::FETCH_OBJ))
    {
      ?>
      <tr>
        <td>
          <?php echo $row->id; ?>
        </td>
        <td>
          <?php echo $row->nome; ?>
        </td>
        <td>
          <?php echo $row->sobrenome; ?>
        </td>
        <td>
          <a href="formulario.php?id=<?php echo $row->id; ?>"  id="edit">
            Editar
          </a>
          <a href="excluir.php?id=<?php echo $row->id; ?>" id="delete">
            Excluir
          </a>
        </td>
      </tr>
      <?php
    }
    ?>
  </table>
  <?php $con->disconnect(); ?>
</body>
</html>
