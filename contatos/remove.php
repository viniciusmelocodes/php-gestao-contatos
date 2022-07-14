<?php
    include_once "../configuracao/configuracao.php";
    include_once "../classes/Contato.php";
    include_once "../classes/RepositorioContatos.php";

    $repositorioContatos = new RepositorioContatos($mysqli);

    $contato = $repositorioContatos->buscar($_GET['id']);
    $repositorioContatos->remover($contato->getId());

    setcookie('mensagem', 'Contato '. $contato->getNome() . ' excluído com sucesso');

    header("Location: /contatos");
