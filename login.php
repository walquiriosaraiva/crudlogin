<!DOCTYPE html>
<html lang="pt-br" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso restrito</title>
    <meta name="description" content="Página login"/>
    <meta name="keywords"
          content="fullscreen pageflip, booklet, layout, bookblock, jquery plugin, flipboard layout, sidebar menu"/>
    <meta name="author" content="webbsb"/>
    <link href='css/bootstrap.min.css' rel='stylesheet'/>
    <link href='css/all.css' rel='stylesheet'/>
    <link href='css/custom_login.css' rel='stylesheet'/>
    <script src='js/jquery-3.3.1.slim.min.js'></script>
    <script src='js/popper.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
</head>
<body>

<?php

if (isset($retorno) && $retorno['erro']):
    $mensagem = '<div class="alert alert-danger" role="alert">' . $retorno['erro'] . '</div>';
endif;

?>
<div id="login">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="?controller=UsuarioController&method=acessar"
                          method="post">
                        <h3 class="text-center text-info"><?php echo isset($mensagem) ? $mensagem : ''; ?>Acesso
                            restrito</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">Usuario:</label><br>
                            <input type="text" name="usuario" id="usuario" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Senha:</label><br>
                            <input type="password" name="senha" id="senha" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="acessar" id="acessar" class="btn btn-info btn-md"
                                   value="Acessar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
