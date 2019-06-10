<?php

/**
 * Class Password
 * @author Walquirio Saraiva Rocha <walquiriosaraiva@gmail.com>
 * @version 1.0
 */
class Password
{
    /**
     * @param $password
     * @param array $options
     * @return bool|string
     */
    public function create($password, $options = array()){
        return password_hash($password, PASSWORD_DEFAULT, $options);
    }

    /**
     * @param $password
     * @param $hash
     * @return bool
     */
    public function verify($password, $hash){
        return password_verify($password, $hash);
    }
}