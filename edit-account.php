
<?php require_once('includes/header.php'); ?>

<?php require_once('includes/navigation-bar.php'); ?>

 <div class="uk-width-3-4 uk-card uk-card-secondary uk-card-body" >

<h2> Editing Account </h2>


    <div class="uk-margin">
        <div class="uk-inline">
            <a class="uk-form-icon" href="#"  uk-icon="icon: lock"></a>
            <input class="uk-input" type="text"  placeholder="Full Name" >
        </div>
    </div>


    <div class="uk-margin">
        <div class="uk-inline">
            <a class="uk-form-icon" href="#"  uk-icon="icon: mail"></a>
            <input class="uk-input" type="text"  placeholder="Email" >
        </div>
    </div>


    <div class="uk-margin">
        <div class="uk-inline">
            <a class="uk-form-icon" href="#"  uk-icon="icon: lock"></a>
            <input class="uk-input" type="text"  placeholder="New Password" >
        </div>
    </div>


    <div class="uk-margin">
        <div class="uk-inline">
            <a class="uk-form-icon" href="#"  uk-icon="icon: lock"></a>
            <input class="uk-input" type="text"  placeholder="Confirm Password" >
        </div>
    </div>


    <div class="uk-margin">
        <div class="uk-inline">
            <a class="uk-form-icon" href="#"  uk-icon="icon: lock"></a>
            <input class="uk-input" type="text"  placeholder="Current Password" >
        </div>
    </div>

    <h3> Upload a new profile picture </h3>

<div class="js-upload" uk-form-custom>
    <input type="file" multiple>
    <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
</div>



</div>