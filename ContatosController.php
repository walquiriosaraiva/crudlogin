<?php

/**
 * Class ContatosController
 * @author Walquirio Saraiva Rocha <walquiriosaraiva@gmail.com>
 * @version 1.0
 */
class ContatosController extends Controller
{

    /**
     *
     */
    public function listar()
    {
        if ($_SESSION['crud']['login']) {
            $contatos = Contato::all();
            return $this->view('grade', ['contatos' => $contatos]);
        }
        return $this->view('login');
    }

    /**
     *
     */
    public function criar()
    {
        if ($_SESSION['crud']['login']) {
            return $this->view('form');
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
            $contato = Contato::find($id);

            return $this->view('form', ['contato' => $contato]);
        }
        return $this->view('login');
    }

    /**
     * @return bool|void
     */
    public function salvar()
    {
        if ($_SESSION['crud']['login']) {
            $contato = new Contato;
            $contato->nome = $this->request->nome;
            $contato->telefone = $this->request->telefone;
            $contato->email = $this->request->email;
            if ($contato->save()) {
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
            $contato = Contato::find($id);
            $contato->nome = $this->request->nome;
            $contato->telefone = $this->request->telefone;
            $contato->email = $this->request->email;
            $contato->save();

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
            Contato::destroy($id);
            return $this->listar();
        }
        return $this->view('login');
    }
}