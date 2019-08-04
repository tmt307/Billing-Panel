<?php
require_once('includes/header.php');

require_once('class.user.php');

$user = new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
	$user->redirect('index.php');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
	$id = base64_decode($_GET['id']);
	$code = $_GET['code'];

	$statusY = "Y";
	$statusN = "N";

	$stmt = $user->runQuery("SELECT userID,userStatus FROM users WHERE userID=:uID AND tokenCode=:code LIMIT 1");
	$stmt->execute(array(":uID"=>$id,":code"=>$code));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	if($stmt->rowCount() > 0)
	{
		if($row['userStatus']==$statusN)
		{
			$stmt = $user->runQuery("UPDATE users SET userStatus=:status WHERE userID=:uID");
			$stmt->bindparam(":status",$statusY);
			$stmt->bindparam(":uID",$id);
			$stmt->execute();

			$msg = "

<div class='uk-alert-success' uk-alert>
	<a class='uk-alert-close' uk-close></a>
	   Your Account is Now Activated <i class='far fa-smile-beam'></i> 
	<br /> 
 	<a href='login.php'>Login here</a>
</div>

			       ";
		}
		else
		{
			$msg = "

<div class='uk-alert-danger' uk-alert>
	<a class='uk-alert-close' uk-close></a>
	 Your Account is already Activated <i class='far fa-smile-beam'></i> 
	<br /> 
 	<a href='login.php'>Login here</a>
</div>

   ";
		}
	}
	else
	{
		$msg = "
<div class='uk-alert-danger' uk-alert>
	<a class='uk-alert-close' uk-close></a>
	  <strong>Sorry! </strong>We can not find your account 
	<br />
 	<a href='register.php'>Register here</a>
</div>

			   ";
	}
}
?>
<div class="uk-section uk-section-secondary uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
	<div class="uk-width-1-1">
		<div class="uk-container">
			<div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
				<div class="uk-width-1-1@m">
					<div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-secondary uk-card-body uk-box-shadow-large">
						<h3 class="uk-card-title uk-text-center"><?php echo $websitename; ?> <br /> Account verification Status</h3>
							<?php if(isset($msg)) echo $msg;  ?>
							<div class="uk-margin">
								<p>  <a href="" class="uk-align-right"> Forgot your password? </a> </p>
								<br />
								<hr />
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
