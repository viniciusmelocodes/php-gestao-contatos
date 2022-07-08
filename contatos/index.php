<?php
    require "database/database.php";

    $listaContatos = buscarContatos($conexao);

    require "template-index.php";
