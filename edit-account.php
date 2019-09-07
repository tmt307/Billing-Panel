
<?php require_once('includes/header.php'); ?>

<?php require_once('includes/navigation-bar.php'); ?>

 <div class="uk-width-1-2 uk-card uk-card-primary uk-card-body" >


<?php
ini_set('display_errors',1); error_reporting(E_ALL);
if (isset($_POST['btn-update'])) {
$id = $row['userID'];
$username = $_POST['username'];
$email = $_POST['email'];
$sql = "UPDATE users SET userName=:username, userEmail=:email WHERE userID=:userID";;
$stmt = $pdo->prepare($sql);
$stmt->execute(array(':username' => $username, 
                  ':email' => $email,
				  ':userID' => $id, 
));

header("LOCATION: edit-account.php?successful");

}
if(isset($_GET['successful']))
{

echo '<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>Your account details have been edited successfully.</p>
</div>';
}

?>
<h3>Edit Account Information </h3>
<form action="" method="post" >
<div class="uk-margin">
	<div class="uk-inline">
		<a class="uk-form-icon" href="#"  uk-icon="icon: user"></a>
		<input name="username" class="uk-input uk-form-width-large" type="text" value="
<?php echo isset($row['userName']) ? $row['userName'] : ''; ?>" placeholder="Full Name" >
	</div>
</div>
<div class="uk-margin">
	<div class="uk-inline">
		<a class="uk-form-icon" href="#"  uk-icon="icon: mail"></a>
		<input class="uk-input uk-form-width-large" type="text"  name="email" value="
<?php echo isset($row['userEmail']) ? $row['userEmail'] : ''; ?>" placeholder="Email" >
	</div>
</div>
<div class="uk-margin">
	<div class="uk-margin">
		<textarea class="uk-textarea  uk-form-width-large" rows="5" placeholder="Bio"></textarea>
	</div>
</div>
<input onclick="return confirm('Are you sure you want make theses changes?')" class="uk-button uk-button-primary" type="submit" name="btn-update" href="#">
</div>
</form>

<div class="uk-width-1-4 uk-card uk-card-default uk-card-body" >
<h3> Edit Profile Picture </h3>
<div class="js-upload" uk-form-custom>
	<input type="file" multiple>
	<button class="uk-button uk-button-default" type="button" ntabindex="-1">Select</button>
</div>
</div>
