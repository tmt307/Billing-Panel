<?php

//Set your website settings
$base_url = "http://localhost";
$websitename = "Toms Billing System";




class Database
{
  private $host = "104.194.207.83";
  private $db_name = "mrthomas_clibill";
  private $username = "mrthomas_clibill";
  private $password = "UmBafH95yZz4rUj";
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
