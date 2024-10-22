<?php

namespace Classes;
use Academy01\AuthToken\AuthToken;
use Academy01\Semej\Semej;
use Locale;

class Link {
    protected $data;
    protected $connection;

    public function __construct($data)
    {
        $this->data = $data;
        $this->connection = new Database();

    }

    public function addLink() {
        $user_id= $_SESSION['user_id'];
        $title = $this->data;
        $uuid = uniqid('academy01_');
        $linkData = [
            'user_id' => $user_id,
            'title' => $title,
            'uuid' => $uuid
        ];

        $this->connection->insert('links', $linkData);

        Semej::set('success', 'OK', 'link created successfully.');

        header('Location: dashboard.php');die;

    }
}