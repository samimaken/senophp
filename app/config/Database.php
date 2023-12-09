<?php

namespace App\config;

use PDO;

class Database
{

    private $server = "localhost";
    private $db_name = "senophp";
    private $user = "root";
    private $password = "root";
    public $con;
    public function __construct()
    {
        $this->server = env('DB_HOST');
        $this->db_name = env('DB_NAME');
        $this->user = env('DB_USER');
        $this->password = env('DB_PASSWORD');
        $this->con = new PDO("mysql:host=$this->server;dbname=$this->db_name", $this->user, $this->password);
    }
}
