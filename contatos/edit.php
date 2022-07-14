<?php
    session_start();
    include_once "../configuracao/configuracao.php";
    include_once "../classes/Contato.php";
    include_once "../classes/RepositorioContatos.php";

    $temErros = false;
    $errosValidacao = [];

    $repositorioContatos = new RepositorioContatos($mysqli);

    $contato = new Contato();

    $temPost = count($_POST) > 0 ? true : false;

    if ($temPost) {
        $contato->setId($_POST['id']);

        if (array_key_exists('nome_contato', $_POST) && strlen($_POST['nome_contato']) > 0) {
            $contato->setNome($_POST['nome_contato']);
        } else {
            $temErros = true;
            $errosValidacao['nome'] = 'É necessário preencher o nome!';
        }

        if (array_key_exists('telefone_contato', $_POST) && strlen($_POST['telefone_contato']) > 0) {
            $contato->setTelefone($_POST['telefone_contato']);
        } else {
            $temErros = true;
            $errosValidacao['telefone'] = 'É necessário preencher o telefone!';
        }

        if (array_key_exists('email_contato', $_POST) && strlen($_POST['email_contato']) > 0) {
            $contato->setEmail($_POST['email_contato']);
        } else {
            $temErros = true;
            $errosValidacao['email'] = 'É necessário preencher o e-mail!';
        }
        
        if (!$temErros) {
            $repositorioContatos->atualizar($contato);
            header("Location: /contatos");
            die();
        }
    }
    
    if (count($errosValidacao) == 0) {
        $contato = $repositorioContatos->buscar($_GET['id']);
    }

    require "template-add-edit.php";
