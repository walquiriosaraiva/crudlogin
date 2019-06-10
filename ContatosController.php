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
        $contatos = Contato::all();
        return $this->view('grade', ['contatos' => $contatos]);
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
        $id      = (int) $dados['id'];
        $contato = Contato::find($id);

        return $this->view('form', ['contato' => $contato]);
    }

    /**
     * @return bool|void
     */
    public function salvar()
    {
        $contato           = new Contato;
        $contato->nome     = $this->request->nome;
        $contato->telefone = $this->request->telefone;
        $contato->email    = $this->request->email;
        if ($contato->save()) {
            return $this->listar();
        }

        return true;
    }

    /**
     * @param $dados
     */
    public function atualizar($dados)
    {
        $id                = (int) $dados['id'];
        $contato           = Contato::find($id);
        $contato->nome     = $this->request->nome;
        $contato->telefone = $this->request->telefone;
        $contato->email    = $this->request->email;
        $contato->save();

        return $this->listar();
    }

    /**
     * @param $dados
     */
    public function excluir($dados)
    {
        $id      = (int) $dados['id'];
        Contato::destroy($id);
        return $this->listar();
    }
}