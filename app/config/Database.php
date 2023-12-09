<?php
namespace App\config;
use PDO;

class Database{
   private $server = "localhost";
   private $db_name = "senophp";
   private $user = "root";
   private $password = "root";
   public $con;
   public function __construct()
   {
     $this->con = new PDO("mysql:host=$this->server;dbname=$this->db_name", $this->user, $this->password);
   }
}