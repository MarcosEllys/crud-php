<?php
    require_once 'config/pessoa.php';

    $crud = new Pessoa(); // instancia classe com as operaçoes
    $crud->excluir($_GET['id']); // exclui o registro com o id que foi passado

    header("Location: index.php"); // redireciona para a listagem
?>
