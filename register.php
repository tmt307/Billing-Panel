<?php require_once('includes/navigation-bar.php'); ?>
<div class="uk-section uk-section-secondary uk-flex uk-flex-middle uk-animation-fade" uk-height-viewport>
    <div class="uk-width-1-1">
        <div class="uk-container">
            <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                <div class="uk-width-1-1@m">
                    <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-secondary uk-card-body uk-box-shadow-large">
                        <h3 class="uk-card-title uk-text-center">Login Portal</h3>
                        <form method="POST">
                            <fieldset class="uk-fieldset">

                                <div class="uk-margin">
                                    <div class="uk-position-relative">
                                        <span class="uk-form-icon"  uk-icon="icon: user"></span>
                                        <input name="email" class="uk-input" type="text" placeholder="Enter a username">
                                    </div>
                                </div>


                                <div class="uk-margin">
                                    <div class="uk-position-relative">
                                        <span class="uk-form-icon"  uk-icon="icon: mail"></span>
                                        <input name="email" class="uk-input" type="email" placeholder="Enter an email address">
                                    </div>
                                </div>

    

                                <div class="uk-margin">
                                    <div class="uk-position-relative">
                                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                        <input type="password" name="password" class="uk-input" type="password" placeholder="Enter a password">
                                    </div>
                                </div>

                            <div class="uk-margin">
                                    <div class="uk-position-relative">
                                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                        <input type="password" name="password" class="uk-input" type="password" placeholder="Confirm your password">
                                    </div>
                                </div>

                                <div class="uk-margin">
                                           <button type="submit" class="uk-button uk-button-primary">
                                  Register
                                    </button>  <a href="" class="uk-align-right"> Forgot your password? </a>
                                       </div>
    
                                    Already have an account?
                                    <p>
                                            <button type="submit" class="uk-button uk-button-default">
                                  Login
                                    </button> 
                             </p>
                                <hr />
                        
                                 
                                </center>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>