<?php

/**
 * Class Request
 * @author Walquirio Saraiva Rocha <walquiriosaraiva@gmail.com>
 * @version 1.0
 */
class Request
{
    protected $request;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->request = $_REQUEST;
    }

    /**
     * @param $nome
     * @return bool
     */
    public function __get($nome)
    {
        if (isset($this->request[$nome])) {
            return $this->request[$nome];
        }
        return false;
    }
}