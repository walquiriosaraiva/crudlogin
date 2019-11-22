<?php

/**
 * Class Conexao
 * @author Walquirio Saraiva Rocha <walquiriosaraiva@gmail.com>
 * @version 1.0
 */
class Conexao
{
    private static $conexao;

    /**
     * Conexao constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return PDO
     */
    public static function getInstance()
    {
        if (is_null(self::$conexao)) {
            self::$conexao = new \PDO('mysql:host=localhost;port=3306;dbname=crudlogin', 'crudlogin', 'crudlogin');
            self::$conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$conexao->exec('set names utf8');
        }
        return self::$conexao;
    }
}