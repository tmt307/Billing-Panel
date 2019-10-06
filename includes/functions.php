<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once 'database-config.php';

class USER
{

	private $conn;

	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }

	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	public function lasdID()
	{
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}


	public function editaccount($username,$email)
	{
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO account_users(userName,userEmail)
			 VALUES(:user_name, :user_mail)");
			$stmt->bindparam(":user_name",$username);
			$stmt->bindparam(":user_mail",$email);
			$stmt->execute();
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function register($username,$email,$upass,$code)
	{
		try
		{
			$password = md5($upass);
			$stmt = $this->conn->prepare("INSERT INTO account_users(userName,userEmail,userPass,tokenCode)
			 VALUES(:user_name, :user_mail, :user_pass, :active_code)");
			$stmt->bindparam(":user_name",$username);
			$stmt->bindparam(":user_mail",$email);
			$stmt->bindparam(":user_pass",$password);
			$stmt->bindparam(":active_code",$code);
			$stmt->execute();
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function login($email,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM account_users WHERE userEmail=:email_id");
			$stmt->execute(array(":email_id"=>$email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

			if($stmt->rowCount() == 1)
			{
				if($userRow['account_userstatus']=="Y")
				{
					if($userRow['userPass']==md5($upass))
					{
						$_SESSION['account_usersession'] = $userRow['userID'];
						return true;
					}
					else
					{
						header("Location: index.php?error");
						exit;
					}
				}
				else
				{
					header("Location: index.php?inactive");
					exit;
				}
			}
			else
			{
				header("Location: index.php?error");
				exit;
			}
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}


	public function is_logged_in()
	{
		if(isset($_SESSION['account_usersession']))
		{
			return true;
		}
	}

	public function redirect($url)
	{
		header("Location: $url");
	}

	public function logout()
	{
		session_destroy();
		$_SESSION['account_usersession'] = false;
	}

	function send_mail($email,$message,$subject)
	{
		require_once('./mailer/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug  = 0;
		$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->SMTPSecure = "ssl";
		$mail->Host = 'server1.spartanhost.net';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = '465';								//Sets the default SMTP server port
		$mail->AddAddress($email);
		$mail->Username="no-reply@fitnessplanner.net";
		$mail->Password="S.E;(u$.Z+1G";
		$mail->SetFrom('no-reply@fitnessplanner.net','Fitness Planner');
		$mail->AddReplyTo("no-reply@fitnessplanner.net","Fitness Planner");
		$mail->Subject    = $subject;
		$mail->MsgHTML($message);
		$mail->Send();
	}
}


function table_fetch_rows($table, $where = '', $order_by = '', $limit_from = 0, $limit_to = 0)
{
	global $db;

	$sql = sprintf('SELECT * FROM %s', $table);

	if (strlen($where) > 0) {
		$sql .= sprintf(' WHERE %s', $where);
	}

	if (strlen($order_by) > 0) {
		$sql .= sprintf(' ORDER BY %s', $order_by);
	}

	if ($limit_from > 0 || $limit_to > 0) {
		$sql .= sprintf(' LIMIT %d, %d', $limit_from, $limit_to);
	}

	$r = mysqli_query($db,$sql) or die(mysqli_error($db));
	$rows = array();

	while ($row = mysqli_fetch_assoc($r)) {
		$rows[] = $row;
	}

	return $rows;
}


// PHP Image Upload Script 
 
    class imageUploader
    {
      const UPLOADS_FOLDER = '.';

      static function upload()
      {
        $imagefile = $_FILES;

        if( !isset($imagefile['files']['error']) )
          throw new RuntimeException('Invalid parameters.');

        //multiple uploads not permitted. you should queue file uploads from the client
        if(is_array($imagefile['files']['error']))
          throw new RuntimeException('Only one file allowed.');

        switch ($imagefile['files']['error']) {
          case UPLOAD_ERR_OK:
            break;
          case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
          case UPLOAD_ERR_INI_SIZE:
          case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
          default:
            throw new RuntimeException('Unknown errors.');
        }

        $max = ini_get('upload_max_filesize') * 1000 * 1000;
        if ($imagefile['files']['size'] > $max)
            throw new RuntimeException('Exceeded filesize limit.');

        //check the file type - but not the one sent by the browser instead use finfo
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($_FILES['files']['tmp_name']);
        $allowed = array('jpg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif');
        $ext = array_search($mime, $allowed, true);

        if(false === $ext)
          throw new RuntimeException('Invalid file format.');

        $path = sprintf( self::UPLOADS_FOLDER . '/%s.%s', sha1_file($imagefile['files']['tmp_name']), $ext );
        if (!move_uploaded_file( $imagefile['files']['tmp_name'],$path))
          throw new RuntimeException('Failed to move uploaded file.');
        else
          return true;
      }
    }
    
  