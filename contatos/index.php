<?php
    include_once "../configuracao/configuracao.php";
    include_once "../classes/RepositorioContatos.php";

    $repositorioContatos = new RepositorioContatos($mysqli);

    $contatos = $repositorioContatos->buscar();

    require "template-index.php";
