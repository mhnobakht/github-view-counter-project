<?php

namespace Classes;
use Academy01\AuthToken\AuthToken;
use Academy01\Semej\Semej;
use Locale;

class Link {
    protected $data;
    protected $connection;

    public function __construct()
    {
        
        $this->connection = new Database();

    }

    public function addLink($data) {
        $this->data = $data;
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

    public function showLinks()
    {
        $user_id = $_SESSION['user_id'];

        $allLinks = $this->connection->selectAllWithCondition('links', "user_id = '$user_id'");

        return $allLinks;
    }
}