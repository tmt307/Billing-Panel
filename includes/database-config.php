<?php

//Set your website settings
$base_url = "http://localhost";
$websitename = "Toms Billing System";

$user = "root";
$pass = "root";
$pdo = new PDO('mysql:host=localhost;dbname=billing', $user, $pass);


class Database
{
  private $host = "localhost";
  private $db_name = "billing";
  private $username = "root";
  private $password = "root";
    public $conn;

    public function dbConnection()
  {

      $this->conn = null;
        try
    {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);

      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    catch(PDOException $exception)
    {
            echo "Connection Failed : " . $exception->getMessage();
        }

        return $this->conn;
    }
}


// try {
// // $pdo = new PDO('mysql:host=localhost;dbname=tish_database;charset=utf-8','root','');

// // } catch(PDOException $e){
// // echo 'Connection failed'.$e->getMessage();
// // }

?>
