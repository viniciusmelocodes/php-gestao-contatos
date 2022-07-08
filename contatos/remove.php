<?php
    require "database/database.php";

    $contato = buscarContato($conexao, $_GET['id']);
    excluirContato($conexao, $contato['id']);

    setcookie('mensagem', 'Contato '. $contato['nome'] . ' excluído com sucesso');
    
    header("Location: /contatos");
