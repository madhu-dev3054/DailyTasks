<?php

session_start();

if(!isset($_SESSION['user_id'])){

    header("Location: login.php");

    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Profile</title>

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="container">

    <div class="profile-card">

<?php

if(!empty($_SESSION['profile_photo'])){

?>

<img src="assets/images/<?php echo $_SESSION['profile_photo']; ?>"
     class="profile-photo">

<?php

}
else{

?>

<img src="assets/images/default.png"
     class="profile-photo">

<?php

}

?>
    
        <h2>
            <?php echo $_SESSION['username']; ?>
        </h2>
  
        <p>
            <?php echo $_SESSION['email']; ?>
        </p>
    <div class="update-profile-btn">
        <a href="update-profile.php" class="edit-btn">Update Profile</a>
    </div>

    <div class="change-ps-btn">
        <a href="change-password.php" class="edit-btn">Change Password</a>
    </div>
    
    <div class="delete-btn">
      <a href="delete-account.php" class="delete-btn" onclick="return confirm('Are you sure?')">
         Delete Account </a>
    </div>
    <div class="delete-btn">
      <a  class="delete-btn" href="logout.php">
            Logout
        </a>
    </div>
 </div>

</div>

</body>
</html>