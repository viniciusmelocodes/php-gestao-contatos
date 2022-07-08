<?php

/* CREATE DATABASE `contatos` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */

/*
CREATE TABLE `contatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
*/

    $hostname = '127.0.0.1';
    $user = 'root';
    $password = 'root';
    $database = 'contatos';
    $port = '3307';
    
    $conexao = mysqli_connect(
        $hostname,
        $user,
        $password,
        $database,
        $port
    );
    
    if (mysqli_connect_errno($conexao)) {
        echo "Problemas para conectar no banco. Erro: ";
        echo mysqli_connect_error();
        die();
    }

    function buscarContatos($conexao)
    {
        $sqlBusca = 'SELECT * FROM contatos';
        $registros = mysqli_query($conexao, $sqlBusca);
        $contatos = [];
        while ($contato = mysqli_fetch_assoc($registros)) {
            $contatos[] = $contato;
        }
        return $contatos;
    }

    function buscarContato($conexao, $id)
    {
        $sqlBusca = 'SELECT * FROM contatos WHERE id = ' . $id;
        $resultado = mysqli_query($conexao, $sqlBusca);
        return mysqli_fetch_assoc($resultado);
    }

    function salvarContato($conexao, $contato)
    {
        $sqlGravar = "
            INSERT INTO contatos
            (nome, telefone, email)
            VALUES
            (
            '{$contato['nome']}',
            '{$contato['telefone']}',
            '{$contato['email']}'
            )
            ";
        mysqli_query($conexao, $sqlGravar);
    }

    function atualizarContato($conexao, $contato)
    {
        $sqlEditar = "
            UPDATE contatos SET
            nome = '{$contato['nome']}',
            telefone = '{$contato['telefone']}',
            email = '{$contato['email']}'
            WHERE id = {$contato['id']}
            ";
        mysqli_query($conexao, $sqlEditar);
    }

    function excluirContato($conexao, $id)
    {
        $sqlRemover = "DELETE FROM contatos WHERE id = {$id}";
        mysqli_query($conexao, $sqlRemover);
    }
