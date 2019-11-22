<h1>Usuários</h1>
<hr>
<?php

if (isset($retorno) && $retorno['erro']):
    $mensagem = '<div class="alert alert-danger" role="alert">' . $retorno['erro'] . '</div>';
endif;

?>
<div class="container">
    <h3 class="text-center text-info"><?php echo isset($mensagem) ? $mensagem : ''; ?></h3>
    <table class="table table-bordered table-striped" style="top:40px;">
        <thead>
        <tr>
            <th>Usuário</th>
            <th>E-mail</th>
            <th>Data</th>
            <th>Perfil</th>
            <th><a href="?controller=UsuarioController&method=criar" class="btn btn-success btn-sm">Novo</a>
                <a href="?" class="btn btn-info btn-sm">Home</a>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($usuario) && $usuario) :
            foreach ($usuario as $usuarios) :
                if ($usuarios->cadastro) :
                    $data = new DateTime($usuarios->cadastro);
                else:
                    $data = new DateTime(date('Y-m-d'));
                endif;

                ?>
                <tr>
                    <td><?php echo $usuarios->usuario; ?></td>
                    <td><?php echo $usuarios->email; ?></td>
                    <td><?php echo $data->format("d/m/Y H:i:s"); ?></td>
                    <td><?php echo $usuarios->tipo == 'A' ? 'Administrador' : 'Consulta'; ?></td>
                    <td>
                        <a href="?controller=UsuarioController&method=editar&id=<?php echo $usuarios->id; ?>"
                           class="btn btn-primary btn-sm">Editar</a>
                        <a href="?controller=UsuarioController&method=excluir&id=<?php echo $usuarios->id; ?>"
                           class="btn btn-danger btn-sm">Excluir</a>
                    </td>
                </tr>
            <?php
            endforeach;
        else :
            ?>
            <tr>
                <td colspan="5">Nenhum registro encontrado</td>
            </tr>
        <?php
        endif;
        ?>
        </tbody>
    </table>
</div>