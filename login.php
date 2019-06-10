<!DOCTYPE html>
<html lang="pt-br" class="no-js">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso restrito</title>
    <meta name="description" content="Fullscreen Pageflip Layout with BookBlock"/>
    <meta name="keywords"
          content="fullscreen pageflip, booklet, layout, bookblock, jquery plugin, flipboard layout, sidebar menu"/>
    <meta name="author" content="Codrops"/>
    <link href='css/bootstrap.min.css' rel='stylesheet'/>
    <link href='css/all.css' rel='stylesheet'/>
    <script src='js/jquery-3.3.1.slim.min.js'></script>
    <script src='js/popper.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <style type='text/css'>
        body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
        }

        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            height: 400px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }

        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }

        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
        }
    </style>
</head>
<body>

<?php

$mensagem = '';
/*
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
*/

if(isset($_POST['acessar']) && $_POST['acessar'] == 'Acessar'):
    /*
    $pdo = Banco::conectar();
    $sql = "SELECT  seq_usuario,
                    nom_usuario, 
                    des_senha, 
                    dat_cadastro, 
                    sit_usuario, 
                    des_email, 
                    tip_usuario
                      FROM tb_usuario 
                      WHERE sit_usuario = 'A'
                      AND nom_usuario = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array(trim($_POST['nom_usuario'])));
    $result = $query->fetch(PDO::FETCH_ASSOC);
    Banco::desconectar();

    $password = $result['des_senha'];
    if(crypt($_POST['des_senha'], $password) == $password):
        session_start();
        $_SESSION['ebook']['login'] = $result;
        header("Location: index.php");
    else:
        $mensagem = '<div class="alert alert-danger" role="alert">Usuário ou senha inválido</div>';
    endif;
    */

endif;

?>
<div id="login">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="?controller=UsuarioController&method=acessar" method="post">
                        <h3 class="text-center text-info"><?php echo $mensagem; ?>Acesso restrito</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">Usuario:</label><br>
                            <input type="text" name="usuario" id="usuario" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Senha:</label><br>
                            <input type="password" name="senha" id="senha" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="acessar" id="acessar" class="btn btn-info btn-md" value="Acessar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
