<?php
    include_once "../configuracao/configuracao.php";
    include_once "../conexao/conexao.php";
    include_once "../classes/RepositorioContatos.php";

    $repositorioContatos = new RepositorioContatos($pdo);

    $contatos = $repositorioContatos->buscar();

    require "template-index.php";
