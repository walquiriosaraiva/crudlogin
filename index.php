<?php

include_once "funcoes.php";
error_reporting(E_ALL);
ini_set('display_errors', true);
session_start();

spl_autoload_register(function ($class) {
    if (file_exists("$class.php")) {
        require_once "$class.php";
        return true;
    }
});

?>
<!DOCTYPE html>
<html lang='pt-br'>
<header>
    <meta charset="utf-8">
    <title>Sistema de CRUD</title>
    <link href='css/bootstrap.min.css' rel='stylesheet'/>
    <link href='css/all.css' rel='stylesheet'/>
    <script src='js/jquery-3.3.1.slim.min.js'></script>
    <script src='js/popper.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
</header>
<body>

<?php

if (isset($_GET) && $_GET) {
    $controller = isset($_GET['controller']) ? ((class_exists($_GET['controller'])) ? new $_GET['controller'] : NULL) : null;
    $method = isset($_GET['method']) ? $_GET['method'] : null;

    if ($controller && $method) {
        if (method_exists($controller, $method)) {
            $parameters = $_GET;
            unset($parameters['controller']);
            unset($parameters['method']);
            call_user_func(array($controller, $method), $parameters);
        } else {
            echo "Método não encontrado!";
        }
    } else {
        ?>
        <div class="container">
            Controller não encontrado!<br/><br/>
            <a href="?controller=UsuarioController&method=listar" class="btn btn-success">Home</a></div>
        <?php
    }
} else if (isset($_SESSION['crud']) && $_SESSION['crud']['login']) { ?>
    <h1>CRUD</h1>
    <hr>
    <div class="container">
        Bem-vindo ao sistema! <?php echo $_SESSION['crud']['login']['usuario']; ?><br/><br/>
        <a href="?controller=ContatosController&method=listar" class="btn btn-success">Modulo de contatos</a>
        <a href="?controller=UsuarioController&method=listar" class="btn btn-success">Modulo de usuário</a>
        <a href="?controller=UsuarioController&method=logout" class="btn btn-danger">Sair</a></div>
    <?php
} else {
    header("Location: ?controller=UsuarioController&method=login");
}
?>


</body>
</html>