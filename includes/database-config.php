<?php

//Set your website settings
$base_url = "http://localhost";
$websitename = "Toms Billing System";


// //Set your Mail settings
// $mail_host = "server1.spartanhost.net"; //define Mail Host
// $SMTPdebugmode = 0; // Need Errors? Try Debug Mode
// $SMTPAuth = "true"; // Sets SMTP authentication. Utilizes the Username and Password variables
// $mail_security_type = "ssl";  // Sets SMTP authentication Type | TCP OR SSL
// $mail_port = "465"; // Set Mail Port

// $mail_username = "no-reply@fitnessplanner.net"; // mail server from email address/user
// $mail_password = "hDB9ePaVGHRf"; // mail server password

// $mail_setfrom = "no-reply@fitnessplanner.net2"; //hat 
// $mail_setfrom_name = "Fitness Planner2";

// $mail_addreplyto = "no-reply@fitnessplanner.net3";
// $mail_addreplyto_name = "Fitness Planner3";


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
?>
