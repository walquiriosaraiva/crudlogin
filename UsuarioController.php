<?php

/**
 * Class UsuarioController
 * @author Walquirio Saraiva Rocha <walquiriosaraiva@gmail.com>
 * @version 1.0
 */
class UsuarioController extends Controller
{
    /**
     *
     */
    public function listar()
    {
        if ($_SESSION['crud']['login']) {
            $usuario = Usuario::all();
            return $this->view('gradeUsuario', ['usuario' => $usuario]);
        }

        return $this->view('login');
    }

    /**
     *
     */
    public function criar()
    {
        if ($_SESSION['crud']['login']) {
            return $this->view('formUsuario');
        }
        return $this->view('login');
    }

    /**
     * @param $dados
     */
    public function editar($dados)
    {
        if ($_SESSION['crud']['login']) {
            $id = (int)$dados['id'];
            $usuario = Usuario::find($id);
            return $this->view('formUsuario', ['usuario' => $usuario]);
        }
        return $this->view('login');
    }

    /**
     * @return bool|void
     */
    public function salvar()
    {
        if ($_SESSION['crud']['login']) {
            $usuario = new Usuario;
            $usuario->usuario = $this->request->usuario;
            $usuario->senha = $this->request->senha;
            $usuario->email = $this->request->email;
            $usuario->tipo = $this->request->tipo;
            if ($usuario->save()) {
                return $this->listar();
            }
            return true;
        }
        return $this->view('login');
    }

    /**
     * @param $dados
     */
    public function atualizar($dados)
    {
        if ($_SESSION['crud']['login']) {
            $id = (int)$dados['id'];
            $usuario = Usuario::find($id);
            $usuario->usuario = $this->request->usuario;
            if ($this->request->senha) {
                $usuario->senha = $this->request->senha;
            }
            $usuario->email = $this->request->email;
            $usuario->tipo = $this->request->tipo;
            $usuario->save();

            return $this->listar();
        }
        return $this->view('login');
    }

    /**
     * @param $dados
     */
    public function excluir($dados)
    {
        if ($_SESSION['crud']['login']) {
            $id = (int)$dados['id'];

            foreach ($_SESSION['crud']['login'] as $sessao) {
                if (isset($sessao['id']) && $sessao['id'] == $id) {
                    $usuario = Usuario::all();
                    return $this->view('gradeUsuario', ['retorno' => array('erro' => 'Usuário não pode excluir a se mesmo'), 'usuario' => $usuario]);
                }
            }
            Usuario::destroy($id);
            return $this->listar();
        }
        return $this->view('login');
    }

    /**
     *
     */
    public function login()
    {
        return $this->view('login');
    }

    /**
     *
     */
    public function acessar()
    {
        if ($this->request->usuario && $this->request->senha) {
            $usuario = Usuario::findUsuario($this->request->usuario);
            if ($usuario) {
                $hash = $usuario->senha;
                $password = new Password();
                if ($password->verify($this->request->senha, $hash)) {
                    $_SESSION['crud']['login'] = array(
                        'id' => $usuario->id,
                        'usuario' => $usuario->usuario,
                        'cadastro' => $usuario->cadastro,
                        'email' => $usuario->email,
                        'tipo' => $usuario->tipo);
                    $this->sessao = $_SESSION['crud']['login'];
                    return $this->listar();
                }
            }
        }
        return $this->view('login', ['retorno' => array('erro' => 'Usuário ou senha inválido')]);
    }

    /**
     *
     */
    public function logout()
    {
        unset($_SESSION['crud']['login']);
        return $this->view('login');
    }
}