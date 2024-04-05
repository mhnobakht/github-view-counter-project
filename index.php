<?php

use Classes\Database;

require_once 'Autoloader.php';

$dbs = new Database();

$data = [
    'name' => 'ali',
    'email' => 'ali@gmail.com',
    'password' => md5('ali!@#123456789')
];

$result = $dbs->insert('users', $data);

var_dump($result);