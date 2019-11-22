<h1>Contatos</h1>
<hr>
<div class="container">
    <table class="table table-bordered table-striped" style="top:40px;">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
            <th><a href="?controller=ContatosController&method=criar" class="btn btn-success btn-sm">Novo</a>
                <a href="?" class="btn btn-info btn-sm">Home</a>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($contatos) && $contatos) :
            foreach ($contatos as $contato) :
                ?>
                <tr>
                    <td><?php echo $contato->nome; ?></td>
                    <td><?php echo $contato->telefone; ?></td>
                    <td><?php echo $contato->email; ?></td>
                    <td>
                        <a href="?controller=ContatosController&method=editar&id=<?php echo $contato->id; ?>"
                           class="btn btn-primary btn-sm">Editar</a>
                        <a href="?controller=ContatosController&method=excluir&id=<?php echo $contato->id; ?>"
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