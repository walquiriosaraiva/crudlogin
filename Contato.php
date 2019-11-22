<?php

/**
 * Class Contato - baseado no modelo Active Record
 * @author Walquirio Saraiva Rocha <walquiriosaraiva@gmail.com>
 * @version 1.0
 */
class Contato
{
    private $atributos;

    public function __construct()
    {

    }

    /**
     * @param $atributo
     * @param $valor
     * @return $this
     */
    public function __set($atributo, $valor)
    {
        $this->atributos[$atributo] = $valor;
        return $this;
    }

    /**
     * @param $atributo
     * @return mixed
     */
    public function __get($atributo)
    {
        return $this->atributos[$atributo];
    }

    /**
     * @param $atributo
     * @return bool
     */
    public function __isset($atributo)
    {
        return isset($this->atributos[$atributo]);
    }

    /**
     * @return bool|int
     */
    public function save()
    {
        $colunas = $this->preparar($this->atributos);
        if (!isset($this->id)) :
            $query = "INSERT INTO contatos (" .
                implode(', ', array_keys($colunas)) .
                ") VALUES (" .
                implode(', ', array_values($colunas)) . ");";
        else :
            foreach ($colunas as $key => $value) :
                if ($key !== 'id') :
                    $definir[] = "{$key}={$value}";
                endif;
            endforeach;
            $query = "UPDATE contatos SET " . implode(', ', $definir) . " WHERE id='{$this->id}';";
        endif;

        if ($conexao = Conexao::getInstance()) :
            $stmt = $conexao->prepare($query);
            if ($stmt->execute()) :
                return $stmt->rowCount();
            endif;
        endif;
        return false;
    }

    /**
     * @param $dados
     * @return string
     */
    private function escapar($dados)
    {
        if (is_string($dados) & !empty($dados)) :
            return "'" . addslashes($dados) . "'";
        elseif (is_bool($dados)) :
            return $dados ? 'TRUE' : 'FALSE';
        elseif ($dados !== '') :
            return $dados;
        else :
            return 'NULL';
        endif;
    }

    /**
     * @param $dados
     * @return array
     */
    private function preparar($dados)
    {
        $resultado = array();
        foreach ($dados as $k => $v) :
            if (is_scalar($v)) :
                $resultado[$k] = $this->escapar($v);
            endif;
        endforeach;

        return $resultado;
    }

    /**
     * @return array|bool
     */
    public static function all()
    {
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("SELECT * FROM contatos;");
        $result = array();
        if ($stmt->execute()) :
            while ($rs = $stmt->fetchObject(Contato::class)) :
                $result[] = $rs;
            endwhile;
        endif;

        if (count($result) > 0) :
            return $result;
        endif;

        return false;
    }

    /**
     * @return bool|int
     */
    public static function count()
    {
        $conexao = Conexao::getInstance();
        $count = $conexao->exec("SELECT count(*) FROM contatos;");
        if ($count) :
            return (int)$count;
        endif;

        return false;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public static function find($id)
    {
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("SELECT * FROM contatos WHERE id = :id");
        $stmt->bindParam('id', $id);
        if ($stmt->execute()) :
            if ($stmt->rowCount() > 0) :
                $resultado = $stmt->fetchObject('Contato');
                if ($resultado) :
                    return $resultado;
                endif;
            endif;
        endif;

        return false;
    }

    /**
     * @param $id
     * @return bool
     */
    public static function destroy($id)
    {
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("DELETE FROM contatos WHERE id = :id");
        $stmt->bindParam('id', $id);
        if ($stmt->execute()) :
            return true;
        endif;

        return false;
    }
}