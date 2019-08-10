<?php
require_once('includes/header.php');

require_once('class.user.php');

$reg_user = new USER();

if ($reg_user->is_logged_in() != "") {
    $reg_user->redirect('index.php');
}


if (isset($_POST['btn-register'])) {
    $username      = trim($_POST['username']);
    $email_address = trim($_POST['email_address']);
    $password      = trim($_POST['password']);
    $confirm_password      = trim($_POST['confirm_password']);
    $code          = md5(uniqid(rand()));
    
    $stmt = $reg_user->runQuery("SELECT * FROM users WHERE userEmail=:email_id");
    $stmt->execute(array(
        ":email_id" => $email_address
    ));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($stmt->rowCount() > 0) {
        $msg = "

    <div class='uk-alert-danger' uk-alert>
    <a class='uk-alert-close' uk-close></a>
    Email already exists , Please try diffrent one.
    </div>


    ";
    } 

    elseif($password != $confirm_password){
        $msg = "

    <div class='uk-alert-danger' uk-alert>
    <a class='uk-alert-close' uk-close></a>
   Passwords doesn't match
    </div>


    ";    }

    else {
        if ($reg_user->register($username, $email_address, $password, $code)) {
            $id  = $reg_user->lasdID();
            $key = base64_encode($id);
            $id  = $key;
            
            $message = "
    Hello $username,
    <br />
    Welcome to $websitename<br/>
    To complete your registration  please , just click following link<br/>

    <a href='$base_url/verify.php?id=$id&code=$code'> Click here to activate your account.</a>
    <br /><br />
    Thanks,";
            
            $subject = "$websitename | Confirm Your Registration";
            
            $reg_user->send_mail($email_address, $message, $subject);
            $msg = "

    <div class='uk-alert-success' uk-alert>
    <a class='uk-alert-close' uk-close></a>
    We've sent an email to $email_address.
    Please click on the confirmation link in the email to create your account.
    </div>
    ";
        } else {
            echo "Opps, this is broken";
        }
    }
}
?>
<div class="uk-section uk-section-default uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
    <div class="uk-width-1-1">
        <div class="uk-container">
            <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                <div class="uk-width-1-1@m">
                    <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                        <h3 class="uk-card-title uk-text-center"><?php echo $websitename; ?>
                        <br /> Create An Account</h3>
                        <?php if(isset($msg)) echo $msg;  ?>
                        <form method="post">
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <div class="uk-position-relative">
                                <span class="uk-form-icon"  uk-icon="icon: user"></span>
                                <input name="username" class="uk-input" type="text" required placeholder="Enter a username">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-position-relative">
                                <span class="uk-form-icon"  uk-icon="icon: mail"></span>
                                <input name="email_address" class="uk-input" type="email" required placeholder="Enter an email address">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-position-relative">
                                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                <input type="password" name="password" class="uk-input" type="password" required placeholder="Enter a password">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div class="uk-position-relative">
                                <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                <input type="password" name="confirm_password" class="uk-input" type="password" required placeholder="Confirm your password">
                            </div>
                        </div>
            
                        <div class="uk-margin">
                            <input type="submit" value="Register" name="btn-register" class="uk-button uk-button-primary">
                            
                            <a href="" class="uk-align-right"> Forgot your password? </a>
                        </div>
                    </form>
                    <p>   Already have an account? </p>
                    <a href="login.php"><input type="button" class="uk-button uk-button-default" value="Login"></a>
                    <hr />
                    </fieldset>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
