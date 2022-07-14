<?php
$mysqli = new mysqli(
    '127.0.0.1',
    'root',
    'root',
    'contatos',
    '3307'
);

if ($mysqli->connect_errno) {
    echo "Erro";
} else {
    // echo "Conexão efetuada com sucesso";
}
