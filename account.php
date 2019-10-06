
<?php require_once('includes/header.php'); ?>

<?php require_once('includes/navigation-bar.php'); ?>

 <div class="uk-width-1-2 uk-card uk-card-primary uk-card-body" >


<?php 
  $target_dir = "uploads/";
  $filename = $row['userID'] . '-avatar.png';

$target_file = $target_dir . basename("$filename");
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["btn-update"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Your new profile avatar has been uploaded successfully";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} 

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

header("LOCATION: account.php?successful");

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

<div class="uk-width-1-3 uk-card uk-card-default uk-card-body" >
<h3> Edit Profile Picture </h3>
<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</div>
