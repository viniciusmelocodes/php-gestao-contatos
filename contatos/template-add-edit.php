<?php
$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
<?php
if (count($params) > 0) {
    echo 'Editar';
} else {
    echo 'Adicionar';
}
?> contato
        </title>

        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>Gestão de Contatos</h1>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $contato->getId(); ?>" />
            <fieldset>
                <legend>
<?php
if (count($params) > 0) {
    echo 'Editar';
} else {
    echo 'Adicionar';
}
?> Contato
                </legend>
                <label>
                    Nome
                    <input type="text" name="nome_contato" id="nome_contato" value="<?php echo $contato->getNome(); ?>">
                    <?php
                    if ($temErros && array_key_exists('nome', $errosValidacao)) { ?>
                    <span class="erro">
                        <?php echo $errosValidacao['nome']; ?>
                    </span>
                    <?php } ?>
                </label>
                <label>
                    Telefone
                    <input type="text" name="telefone_contato" id="telefone_contato" value="<?php echo $contato->getTelefone(); ?>">
                    <?php
                    if ($temErros && array_key_exists('telefone', $errosValidacao)) { ?>
                    <span class="erro">
                        <?php echo $errosValidacao['telefone']; ?>
                    </span>
                    <?php } ?>
                </label>
                <label>
                    E-mail
                    <input type="email" name="email_contato" id="email_contato" value="<?php echo $contato->getEmail(); ?>">
                    <?php
                    if ($temErros && array_key_exists('email', $errosValidacao)) { ?>
                    <span class="erro">
                        <?php echo $errosValidacao['email']; ?>
                    </span>
                    <?php } ?>
                </label>
                <input type="submit" value="Salvar">
            </fieldset>
        </form>
        <a href="/contatos"><button>Voltar</button></a>
    </body>
</html>