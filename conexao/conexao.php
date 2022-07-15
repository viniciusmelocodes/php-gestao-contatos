<?php
$mysqli = new mysqli(
    BD_HOSTNAME,
    BD_USERNAME,
    BD_PASSWORD,
    BD_DATABASE,
    BD_PORT
);

if ($mysqli->connect_errno) {
    echo "Erro";
} else {
    // echo "Conexão efetuada com sucesso";
}
