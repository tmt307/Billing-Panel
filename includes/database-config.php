<?php

//Set your website settings
$base_url = "http://localhost";
$websitename = "Toms Billing System";




class Database
{
  private $host = "104.194.207.00";
  private $db_name = "000";
  private $username = "000";
  private $password = "00";
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
?>
