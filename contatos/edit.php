<?php
    session_start();
    require "database/database.php";
    require "helpers/helpers.php";

    $temErros = false;
    $errosValidacao = [];

    if (temPost()) {
        $contato = [];

        $contato['id'] = $_POST['id'];

        if (array_key_exists('nome_contato', $_POST) && strlen($_POST['nome_contato']) > 0) {
            $contato['nome'] = $_POST['nome_contato'];
        } else {
            $temErros = true;
            $errosValidacao['nome'] = 'É necessário preencher o nome!';
        }

        if (array_key_exists('telefone_contato', $_POST) && strlen($_POST['telefone_contato']) > 0) {
            $contato['telefone'] = $_POST['telefone_contato'];
        } else {
            $temErros = true;
            $errosValidacao['telefone'] = 'É necessário preencher o telefone!';
        }

        if (array_key_exists('email_contato', $_POST) && strlen($_POST['email_contato']) > 0) {
            $contato['email'] = $_POST['email_contato'];
        } else {
            $temErros = true;
            $errosValidacao['email'] = 'É necessário preencher o e-mail!';
        }
        
        if (!$temErros) {
            atualizarContato($conexao, $contato);
            header("Location: /contatos");
            die();
        }
    }
    
    if (count($errosValidacao) == 0) {
        $contato = buscarContato($conexao, $_GET['id']);
    }

    require "template-add-edit.php";
