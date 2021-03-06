<?php
$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$url_components = parse_url($url);
$status = boolval($url_components['query'] == '') ? 'Adicionar' : 'Editar';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
<?php
    echo $status;
?> contato
        </title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.min.css" integrity="sha512-dhpxh4AzF050JM736FF+lLVybu28koEYRrSJtTKfA4Z7jKXJNQ5LcxKmHEwruFN2DuOAi9xeKROJ4Z+sttMjqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.min.css" integrity="sha512-S6hLYzz2hVBjcFOZkAOO+qEkytvbg2k9yZ1oO+zwXNYnQU71syCWhWtIk3UYDvUW2FCIwkzsTcwkEE58EZPnIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container">
            <center>
                <h1>Gestão de Contatos</h1>
            </center>
        </div>
        <div class="container">
            <form class="form-horizontal" method="POST">
                <input type="hidden" name="id" value="<?php echo $contato->getId(); ?>" />
                <fieldset>
                    <legend>
<?php
    echo $status;
?> Contato
                    </legend>
                    <div class="control-group">
                        <label class="control-label" for="nome">Nome</label>
                        <div class="controls">
                            <input type="text" name="nome_contato" id="nome_contato" value="<?php echo $contato->getNome(); ?>">
                            <?php
                        if ($temErros && array_key_exists('nome', $errosValidacao)) { ?>
                            <span class="label label-warning">
                                <?php echo $errosValidacao['nome']; ?>
                            </span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="telefone">Telefone</label>
                        <div class="controls">
                            <input type="text" name="telefone_contato" id="telefone_contato" value="<?php echo $contato->getTelefone(); ?>">
                            <?php
                        if ($temErros && array_key_exists('telefone', $errosValidacao)) { ?>
                            <span class="label label-warning">
                                <?php echo $errosValidacao['telefone']; ?>
                            </span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="email">E-mail</label>
                        <div class="controls">
                            <input type="email" name="email_contato" id="email_contato" value="<?php echo $contato->getEmail(); ?>">
                            <?php
                        if ($temErros && array_key_exists('email', $errosValidacao)) { ?>
                            <span class="label label-warning">
                                <?php echo $errosValidacao['email']; ?>
                            </span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                        <a href="/contatos" class="btn">Voltar</a>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>        
    </body>
</html>