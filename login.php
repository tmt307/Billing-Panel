<?php require_once('includes/header.php'); 

session_start();
require_once 'includes/functions.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
    $user_login->redirect('login.php');
}

if(isset($_POST['btn-login']))
{
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if($user_login->login($email,$password))
    {
        $user_login->redirect('index.php');
    }
}


if(isset($_GET['inactive']))
{

$msg = "<div class='uk-alert-danger' uk-alert>
           <a class='uk-alert-close' uk-close></a>
         This Account is not activated, go to your inbox and activate it.<br /> 
 </div>";
}
?>


<?php
if(isset($_GET['error']))
{

$msg = "
<div class='uk-alert-danger' uk-alert>
           <a class='uk-alert-close' uk-close></a>
    <strong>You have entered incorrect login details, if you have forgot your password, you can reset your password below.<br /> 
 </div>";
}
?>



<div class="uk-section uk-section-default uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
    <div class="uk-width-1-1 uk-width-expand@m">
        <div class="uk-container">
            <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                <div class="uk-width-1-1@m">
                    <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                        <h3 class="uk-card-title uk-text-center">Login Portal</h3>
                        <?php
                        if(isset($msg))
                        {
                        echo $msg;
                        }
                        ?>
                        <form method="POST">
                            <fieldset class="uk-fieldset">
                                <div class="uk-margin">
                                    <div class="uk-position-relative">
                                        <span class="uk-form-icon"  uk-icon="icon: mail"></span>
                                        <input name="email" style="background-color: rgba(255,255,255,.1);"  class="uk-input" required type="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-position-relative">
                                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                        <input  type="password" style="background-color: rgba(255,255,255,.1);" name="password" required class="uk-input" type="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <a href="#">Forgot your password?</a>
                                </div>
                                <div class="uk-margin">
                                    <input type="submit" name="btn-login" value="login" class="uk-button uk-button-primary">
                                </div>
                            </form>
                            <hr />
                            <p>
                                Don't have an account yet?
                            </p>
                            <a href="register.php" class="uk-button  uk-button-default">
                                <span class="uk-form-icon" uk-icon="icon:  register"></span> Register
                            </a>
                            
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
