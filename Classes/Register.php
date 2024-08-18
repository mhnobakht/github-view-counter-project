<?php

namespace Classes;

use Academy01\Semej\Semej;

class Register {

    protected $data;
    protected $connection;

    public function __construct($data)
    {
        $this->data = $data;
        $this->connection = new Database();
        if($this->checkPassword()) {

            $this->registerUser();

        }
    }


    protected function registerUser() {

        $userData = [
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => md5($this->data['password'])
        ];

        if($this->connection->insert('users', $userData)) {
            Semej::set('success', 'OK', 'User register successfully.');
        }else{
            Semej::set('danger', 'Error', 'register failed');
        }

        header('Location: register.php');die;

    }

    protected function checkPassword() {

        if($this->data['password'] === $this->data['confirm_password']) {
            return true;
        }else {
            return false;
        }

    }


}