<?php $base_url = "http://localhost";
$websitename = "Toms Billing System";
error_reporting(E_ALL);
ini_set('display_errors', 1);
$termsofservice = "Terms of service (also known as terms of use and terms and conditions, commonly abbreviated as TOS or ToS, ToU or T&C) are the legal agreements between a service provider and a person who wants to use that service. The person must agree to abide by the terms of service in order to use the offered service.";
error_reporting(E_ALL);

$accountfirstname="Thomas";
$accountsurname="Turner";
$account1stlineofaddress="29 Pinfold Hill";
$account2ndlineofaddress="";
$accountstate="West Yorkshire";
$accountcity="Leeds";
$accountpostcode="Ls15 0pw";
$accountnumber="01234 45212";
//  ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

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
} }

// try {
// // $pdo = new PDO('mysql:host=localhost;dbname=tish_database;charset=utf-8','root','');
// // } catch(PDOException $e){
// // echo 'Connection failed'.$e->getMessage();
// // }
?>