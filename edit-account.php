
<?php require_once('includes/header.php'); ?>

<?php require_once('includes/navigation-bar.php'); ?>

 <div class="uk-width-1-2 uk-card uk-card-primary uk-card-body" >


<?php
if (isset($_POST['btn-update'])) {
	$username = trim($_POST['username']);
    $email_address = trim($_POST['email_address']);
    $password      = trim($_POST['password']);
    echo $username;##
    // $stmt = 
      }
    // $stmt = $reg_user->runQuery("SELECT * FROM users WHERE userEmail=:email_id");
    // $stmt->execute(array(
    //     ":email_id" => $email_address
    // ));
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<h3>Edit Account Information </h3>
<form action="#" method="post" >
<div class="uk-margin">
	<div class="uk-inline">
		<a class="uk-form-icon" href="#"  uk-icon="icon: lock"></a>
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
<input value="Submit" class="uk-button uk-button-default" type="submit" name="btn-update" href="#">
</div>
</form>

<div class="uk-width-1-4 uk-card uk-card-default uk-card-body" >
<h3> Edit Profile Picture </h3>
<div class="js-upload" uk-form-custom>
	<input type="file" multiple>
	<button class="uk-button uk-button-default" type="button" ntabindex="-1">Select</button>
</div>
</div>
