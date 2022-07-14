<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestão de Contatos</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.min.css" integrity="sha512-dhpxh4AzF050JM736FF+lLVybu28koEYRrSJtTKfA4Z7jKXJNQ5LcxKmHEwruFN2DuOAi9xeKROJ4Z+sttMjqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.min.css" integrity="sha512-S6hLYzz2hVBjcFOZkAOO+qEkytvbg2k9yZ1oO+zwXNYnQU71syCWhWtIk3UYDvUW2FCIwkzsTcwkEE58EZPnIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container">
            <center>
                <h1>Gestão de Contatos</h1>
            </center>
            <div class="container">
                <span hidden class="label label-success" id="mensagem"></span>
            </div>
            
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span2">
                        <!--Sidebar content-->
                        <a href="/contatos/add.php" class="btn btn-primary">Novo contato</a>
                    </div>
                    <div class="span10">
                    <!--Body content-->
                    <table class="table">
                        <tr>
                            <th>Ações</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>E-mail</th>
                        </tr>
                        <?php foreach ($contatos as $contato) { ?>
                            <tr>
                                <td>
                                    <a href="/contatos/edit.php?id=<?php echo $contato->getId(); ?>" class="btn btn-warning">Editar</a>
                                    <a href="/contatos/remove.php?id=<?php echo $contato->getId(); ?>" class="btn btn-danger">Remover</a>
                                </td>
                                <td><?php echo $contato->getNome(); ?></td>
                                <td><?php echo $contato->getTelefone(); ?></td>
                                <td><?php echo $contato->getEmail(); ?></td>                    
                            </tr>
                        <?php } ?>
                    </table>
                    </div>
                </div>
            </div>

            
        </div>        
    </body>
    
    <script>
        const getCookie = (name) => {
            return document.cookie.split(';').some(c => {
                return c.trim().startsWith(name + '=');
            });
        }

        const deleteCookie = (name, path, domain) => {
            if (getCookie(name)) {
                document.cookie = name + "=" +
                ((path) ? ";path=" + path : "") +
                ((domain) ? ";domain=" + domain : "") +
                ";expires=Thu, 01 Jan 1970 00:00:01 GMT";
            }
        }

        function getCookieByName(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }

        window.onload = function() {
            let mensagem = decodeURI(getCookieByName('mensagem'))
            if (mensagem != '' && mensagem != 'undefined') {                
                let span = document.getElementById('mensagem')
                span.style.display = 'block'
                span.innerHTML = mensagem
                deleteCookie('mensagem', '/contatos', 'localhost')
            }
        }
    </script>
</html>