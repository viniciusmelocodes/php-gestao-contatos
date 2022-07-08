<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestão de Contatos</title>

        <link rel="stylesheet" href="contatos/css/style.css">
    </head>
    <body>
        <h1>Gestão de Contatos</h1>        
        <span hidden class="erro" id="mensagem">            
        </span>
        <a href="/contatos/add.php"><button>Novo contato</button></a>
        <table>
            <tr>
                <th>Ações</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
            </tr>
            <?php foreach ($listaContatos as $contato) { ?>
                <tr>
                    <td>
                        <a href="/contatos/edit.php?id=<?php echo $contato['id']; ?>"><button>Editar</button></a>
                        <a href="/contatos/remove.php?id=<?php echo $contato['id']; ?>"><button>Remover</button></a>
                    </td>
                    <td><?php echo $contato['nome'] ?></td>
                    <td><?php echo $contato['telefone'] ?></td>
                    <td><?php echo $contato['email'] ?></td>                    
                </tr>
            <?php } ?>
        </table>
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