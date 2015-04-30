<?php
    require_once 'config/conexao.php';
    require_once 'config/pessoa.php';

    $con = new conexao(); // instancia classe de conxao
    $con->connect(); // abre conexao com o banco
    $getId = $_GET['id'];  //pega id para ediçao caso exista
    if($getId){ //se existir recupera os dados e tras os campos preenchidos

        $result = $con->connect()->query("SELECT * FROM pessoa WHERE id = + $getId");
        $row = $result->fetch(PDO::FETCH_OBJ);
    }

    if(isset ($_POST['cadastrar'])){  // caso nao seja passado o id via GET cadastra
        $nome = $_POST['nome'];  //pega o elemento com o pelo NAME
        $sobrenome = $_POST['sobrenome']; //pega o elemento com o pelo NAME
        $crud = new Pessoa();  // instancia classe com as operaçoes
        $crud->inserir("'$nome','$sobrenome'");
        header("Location: index.php"); // redireciona para a listagem
    }

    if(isset ($_POST['editar'])){ // caso  seja passado o id via GET edita
        $nome = $_POST['nome']; //pega o elemento com o pelo NAME
        $sobrenome = $_POST['sobrenome']; //pega o elemento com o pelo NAME
        $crud = new Pessoa(); // instancia classe com as operaçoes
        $crud->atualizar("nome='$nome',sobrenome='$sobrenome'", "id='$getId'");
        header("Location: index.php"); // redireciona para a listagem
    }

?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>CRUD genérico OO com PDO</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="" method="post">

            <p>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $row->nome;  ?>" required autofocus maxlength="15" placeholder="Nome">
            <span class='hint'>Somente o primeiro nome.</span>
            </p>
            <p>
            <label for="sobrenome">Sobrenome:</label>
            <input type="text" name="sobrenome" value="<?php echo $row->sobrenome;  ?>" required maxlength="15" placeholder="Sobrenome">
            <span class='hint'>Somente o segundo nome.</span>
            </p>
            <?php
                if(!$row->id){
            ?>
                <input type="submit" name="cadastrar" value="Cadastrar">
            <?php }else{  ?>
                <input type="submit" name="editar" value="Editar">
            <?php } ?>
        </form>
    </body>
</html>
<?php $con->disconnect(); ?>
