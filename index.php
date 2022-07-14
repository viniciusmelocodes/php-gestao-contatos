<?php
    $nomeApp = 'App Gestão de Contatos';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nomeApp ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.min.css" integrity="sha512-dhpxh4AzF050JM736FF+lLVybu28koEYRrSJtTKfA4Z7jKXJNQ5LcxKmHEwruFN2DuOAi9xeKROJ4Z+sttMjqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.min.css" integrity="sha512-S6hLYzz2hVBjcFOZkAOO+qEkytvbg2k9yZ1oO+zwXNYnQU71syCWhWtIk3UYDvUW2FCIwkzsTcwkEE58EZPnIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <center>
            <h1><?php echo $nomeApp ?></h1>
        </center>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span2">
                <!--Sidebar content-->
                <a href="/contatos" class="btn btn-primary">Gestão de contatos</a>
            </div>
            <div class="span10">
            <!--Body content-->
            </div>
        </div>
    </div>
</body>
</html>