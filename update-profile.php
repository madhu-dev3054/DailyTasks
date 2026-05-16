<?php

session_start();

include 'config/db.php';

if(!isset($_SESSION['user_id'])){

    header("Location: login.php");
    exit();
}

$id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id = $id";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

if(isset($_POST['update_profile'])){

    $username = $_POST['username'];

    $email = $_POST['email'];

    $old_image = $user['profile_photo'];

    // Check image selected or not

    if(!empty($_FILES['photo']['name'])){

        $image = $_FILES['photo']['name'];

        $tmp_name = $_FILES['photo']['tmp_name'];

        move_uploaded_file(
            $tmp_name,
            "assets/images/".$image
        );

    }
    else{

        $image = $old_image;
    }

    // Update query

    $update = "UPDATE users
               SET username='$username',
                   email='$email',
                   profile_photo='$image'
               WHERE id=$id";

    $run = mysqli_query($conn, $update);

    if($run){

        // Update session

        $_SESSION['username'] = $username;

        $_SESSION['email'] = $email;

        $_SESSION['profile_photo'] = $image;

        header("Location: profile.php");
    }
    else{

        echo "Profile Not Updated";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update Profile</title>

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="container">

    <div class="profile-card">

        <h1>Update Profile</h1>

<form method="POST" enctype="multipart/form-data" class="task-form-up">

<input type="text"
       name="username"
       value="<?php echo $user['username']; ?>"
       required>

<input type="email"
       name="email"
       value="<?php echo $user['email']; ?>"
       required>

<input type="file"

       name="photo">

<button type="submit"
        name="update_profile">

    Update Profile

</button>

</form>

    </div>

</div>

</body>
</html>