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

function buscarContatos($mysqli)
{
    $sqlBusca = 'SELECT * FROM contatos';
    $registros = $mysqli->query($sqlBusca);
    $contatos = [];

    foreach ($registros as $contato) {
        $contatos[] = $contato;
    }

    return $contatos;
}

function buscarContato($mysqli, $id)
{
    $sqlBusca = 'SELECT * FROM contatos WHERE id = ' . $id;
    $resultado = mysqli_query($mysqli, $sqlBusca);
    return mysqli_fetch_assoc($resultado);
}

function salvarContato($mysqli, $contato)
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
    mysqli_query($mysqli, $sqlGravar);
}

function atualizarContato($mysqli, $contato)
{
    $sqlEditar = "
            UPDATE contatos SET
            nome = '{$contato['nome']}',
            telefone = '{$contato['telefone']}',
            email = '{$contato['email']}'
            WHERE id = {$contato['id']}
            ";
    mysqli_query($mysqli, $sqlEditar);
}

function excluirContato($mysqli, $id)
{
    $sqlRemover = "DELETE FROM contatos WHERE id = {$id}";
    mysqli_query($mysqli, $sqlRemover);
}
