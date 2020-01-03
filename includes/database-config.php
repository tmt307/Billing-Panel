<?php $base_url = "http://localhost";
$websitename = "Toms Billing System";

$termsofservice = "Terms of service (also known as terms of use and terms and conditions, commonly abbreviated as TOS or ToS, ToU or T&C) are the legal agreements between a service provider and a person who wants to use that service. The person must agree to abide by the terms of service in order to use the offered service.";


$accountfirstname="Toms";
$accountsurname="T";
$account1stlineofaddress="1 old road";
$account2ndlineofaddress="";
$accountstate="State";
$accountcity="City";
$accountpostcode="123 abc";
$accountnumber="01234 45212";
//  ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$user = "root";
$pass = "";
$pdo = new PDO('mysql:host=localhost;dbname=test', $user, $pass);


class Database
{
  private $host = "localhost";
  private $db_name = "test";
  private $username = "root";
  private $password = "";
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


?>