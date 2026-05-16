<?php

session_start();

include 'config/db.php';

if(!isset($_SESSION['user_id'])){

    header("Location: login.php");
    exit();
}

$id = $_SESSION['user_id'];


// Get user data first

$sql = "SELECT * FROM users WHERE id = $id";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);


// Delete profile image if exists

if(!empty($user['profile_photo'])){

    $image_path = "assets/images/" . $user['profile_photo'];

    if(file_exists($image_path)){

        unlink($image_path);
    }
}


// Delete user from database

$delete = "DELETE FROM users WHERE id = $id";

$run = mysqli_query($conn, $delete);


if($run){

    session_unset();

    session_destroy();

    header("Location: login.php");

    exit();

}
else{

    echo "Account Not Deleted";
}

?>