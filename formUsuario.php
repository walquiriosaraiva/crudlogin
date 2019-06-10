<div class="container">
    <form action="?controller=UsuarioController&<?php echo isset($usuario->id) ? "method=atualizar&id={$usuario->id}" : "method=salvar"; ?>"
          method="post">
        <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Usuários</span>
            </div>
            <div class="card-body">
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Usuário:</label>
                <input type="text" class="form-control col-sm-8" name="usuario" id="usuario" required="required"
                       value="<?php
                       echo isset($usuario->usuario) ? $usuario->usuario : null;
                       ?>"/>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Email:</label>
                <input type="text" class="form-control col-sm-8" name="email" id="email" required="required"
                       value="<?php
                       echo isset($usuario->email) ? $usuario->email : null;
                       ?>"/>
            </div>

            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Tipo de usuário:</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="tipo" id="tipoA" value="A"
                        <?php echo isset($usuario->tipo) && $usuario->tipo == 'A' ? 'checked' : ''; ?>
                    />
                    <label class="form-check-label" for="defaultCheck1">Administrador</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="tipo" id="tipoC" value="C"
                        <?php echo isset($usuario->tipo) && $usuario->tipo == 'C' ? 'checked' : ''; ?>
                    />
                    <label class="form-check-label" for="defaultCheck1">Consulta</label>
                </div>
            </div>

            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Senha:</label>
                <input type="password" class="form-control col-sm-8" name="senha" id="senha" required="required"/>
            </div>


            <div class="card-footer">
                <input type="hidden" name="id" id="id"
                       value="<?php echo isset($usuario->id) ? $usuario->id : null; ?>"/>
                <button class="btn btn-success" type="submit">Salvar</button>
                <?php
                if (isset($usuario) && $usuario->id) { ?>
                    <a class="btn btn-secondary"
                       href="?controller=UsuarioController&method=editar&id=<?php echo $usuario->id; ?>">Limpar</a>
                <?php } else { ?>
                    <button class="btn btn-secondary" type="reset">Limpar</button>
                <?php } ?>
                <a class="btn btn-danger" href="?controller=UsuarioController&method=listar">Cancelar</a>
            </div>
        </div>
    </form>
</div>