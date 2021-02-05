<?php


namespace Src\Models;


use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer
{
    public function __construct()
    {
        /**
         * 1º Param: string = nome da tabela
         * 2º Param: array = com atributos obrigatorios na tabela
         * 3º Param: string = nome da chave primaria, deixei em branco caso seja "id"
         * 4º Param: bool = tabela possui campos timestamps?
         */
        parent::__construct("users", ["first_name", "last_name"], "id", true);
    }

}