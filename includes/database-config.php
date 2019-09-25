$base_url = "http://localhost";
$websitename = "Toms Billing System";


$user = "root";
$pass = "root";
$pdo = new PDO('mysql:host=localhost;dbname=billing', $user, $pass);


class Database
{
  private $host = "localhost";
  private $db_name = "test";
  private $username = "test";
  private $password = "";
  private $db_name = "billing";
  private $username = "root";
  private $password = "root";
    public $conn;

    public function dbConnection()
	{
  {

	    $this->conn = null;
      $this->conn = null;
        try
		{
    {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);

			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
		catch(PDOException $exception)
		{
    catch(PDOException $exception)
    {
            echo "Connection Failed : " . $exception->getMessage();
        }

        return $this->conn;
    }
}
=

?>
