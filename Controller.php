<?php

/**
 * Class Controller
 * @author Walquirio Saraiva Rocha <walquiriosaraiva@gmail.com>
 * @version 1.0
 */
class Controller
{
    public $request;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->request = new Request;
    }

    /**
     * @param $arquivo
     * @param null $array
     */
    public function view($arquivo, $array = null)
    {
        if (!is_null($array)) {
            foreach ($array as $var => $value) {
                ${$var} = $value;
            }
        }
        ob_start();
        include "{$arquivo}.php";
        ob_flush();
    }
}