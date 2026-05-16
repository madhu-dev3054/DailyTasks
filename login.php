<?php

session_start();

include 'config/db.php';

if(isset($_POST['login'])){

        // REMOVE EXTRA SPACES
    $email = strtolower(trim($_POST['email']));
    $password = trim($_POST['password']);

       // EMAIL VALIDATION
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

        $_SESSION['error'] = "Invalid email format";

        header("Location: login.php");

        exit();

    }
        // PASSWORD VALIDATION
    if(strlen($password) < 4){

        $_SESSION['error'] =
            "Password must be at least 4 characters";

        header("Location: login.php");

        exit();

    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) > 0){

    $user = mysqli_fetch_assoc($result);

    if(password_verify($password, $user['password'])){

        $_SESSION['user_id'] = $user['id'];

        $_SESSION['username'] = $user['username'];

        $_SESSION['email'] = $user['email'];

        $_SESSION['profile_photo'] = $user['profile_photo'];

        header("Location: dashboard.php");

        exit();

    }
    else{

        $_SESSION['error'] =
            "Invalid Email or Password";

        header("Location: login.php");

        exit();

    }

}
else{

    $_SESSION['error'] =
        "Invalid Email or Password";

    header("Location: login.php");

    exit();

}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!--login.css--> 
        <link
        rel="stylesheet"
        href="assets/css/login.css"
    >

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<div class="login-container">


<form method="POST" class="auth-form">
   

         <!-- ERROR MESSAGE -->
    <?php if(isset($_SESSION['error'])){ ?>
        <div class="error-box">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php } ?>
      

    <h2>Login Form</h2>

    <input type="email"
           name="email"
           placeholder="Enter email"
           value="<?php echo htmlspecialchars($email ?? ''); ?>"
           required>

    

    <input type="password"
           name="password"
           placeholder="Enter password"
           required>



    <button type="submit" name="login">
        Login
    </button>

    <div class="login_link">
    <a href="register.php"> You Have Account ?</a>
    </div>

</form>



</body>
</html>