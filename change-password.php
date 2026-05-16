<?php

session_start();

include 'config/db.php';

if(!isset($_SESSION['user_id'])){

    header("Location: login.php");
    exit();
}

$id = $_SESSION['user_id'];


// Get current user

$sql = "SELECT * FROM users WHERE id = $id";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);


if(isset($_POST['change_password'])){

    $old_password = $_POST['old_password'];

    $new_password = $_POST['new_password'];

    $confirm_password = $_POST['confirm_password'];


    // Check old password

    if($old_password != $user['password']){

        echo "Old Password Incorrect";
    }

    // Check confirm password

    elseif($new_password != $confirm_password){

        echo "Confirm Password Not Match";
    }

    else{

        // Update password

        $update = "UPDATE users
                   SET password='$new_password'
                   WHERE id=$id";

        $run = mysqli_query($conn, $update);

        if($run){

            echo "Password Changed Successfully";
        }
        else{

            echo "Password Not Changed";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Change Password</title>

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="container">

<div class="profile-card">

<h1>Change Password</h1>

<form method="POST"
      class="task-form-up"> <!--update-profile and change passwor class-->

<input type="password"
       name="old_password"
       placeholder="Enter old password"
       required>

<input type="password"
       name="new_password"
       placeholder="Enter new password"
       required>

<input type="password"
       name="confirm_password"
       placeholder="Confirm new password"
       required>

<button type="submit"
        name="change_password">

    Change Password

</button>

</form>

</div>

</div>

</body>
</html>