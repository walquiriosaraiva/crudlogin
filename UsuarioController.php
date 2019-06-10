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
        $usuario = Usuario::all();
        return $this->view('grade_usuario', ['usuario' => $usuario]);
    }

    /**
     *
     */
    public function criar()
    {
        return $this->view('form');
    }

    /**
     * @param $dados
     */
    public function editar($dados)
    {
        $id = (int)$dados['id'];
        $usuario = Usuario::find($id);

        return $this->view('form', ['usuario' => $usuario]);
    }

    /**
     * @return bool|void
     */
    public function salvar()
    {
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

    /**
     * @param $dados
     */
    public function atualizar($dados)
    {
        $id = (int)$dados['id'];
        $usuario = Usuario::find($id);
        $usuario->usuario = $this->request->usuario;
        if($this->request->senha){
            $usuario->senha = $this->request->senha;
        }
        $usuario->email = $this->request->email;
        $usuario->tipo = $this->request->tipo;
        $usuario->save();

        return $this->listar();
    }

    /**
     * @param $dados
     */
    public function excluir($dados)
    {
        $id = (int)$dados['id'];
        $usuario = Usuario::destroy($id);
        return $this->listar();
    }

    /**
     *
     */
    public function login()
    {
        return $this->view('login');
    }

    public function acessar()
    {
        $usuario = new Usuario;
        $usuario->usuario = $this->request->usuario;
        $usuario->senha = $this->request->senha;

        $usuario = Usuario::findUsuario($this->request->usuario);
        $password = $usuario->senha;
        if(crypt($this->request->senha, $password) == $password){
            $_SESSION['crud']['login'] = $usuario;
            return $this->listar();
            //return $this->view('index');
        }
        return false;
    }
}