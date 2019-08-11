
<?php require_once('includes/header.php'); ?>

<?php require_once('includes/navigation-bar.php'); ?>

 <div class="uk-width-1-2 uk-card uk-card-primary uk-card-body" >


<?php if(isset($_POST['btn-login']))
{
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if($user_login->login($email,$password))
    {
        $user_login->redirect('index.php');
    }
} ?>

<h3>Edit Account Information </h3>
<div class="uk-margin">
	<div class="uk-inline">
		<a class="uk-form-icon" href="#"  uk-icon="icon: lock"></a>
		<input class="uk-input uk-form-width-large" type="text" value="<?php echo $row['userName']; ?>" placeholder="Full Name" >
	</div>
</div>
<div class="uk-margin">
	<div class="uk-inline">
		<a class="uk-form-icon" href="#"  uk-icon="icon: mail"></a>
		<input class="uk-input uk-form-width-large" type="text"  value="<?php echo $row['userEmail']; ?>" placeholder="Email" >
	</div>
</div>
<div class="uk-margin">
	<div class="uk-margin">
		<textarea class="uk-textarea  uk-form-width-large" rows="5" placeholder="Bio"></textarea>
	</div>
</div>
<a class="uk-button uk-button-default" href="#">Submit</a>
</div>

<div class="uk-width-1-4 uk-card uk-card-default uk-card-body" >
<h3> Edit Profile Picture </h3>
<div class="js-upload" uk-form-custom>
	<input type="file" multiple>
	<button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
</div>
</div>