<?php

include 'config/db.php';

// ERROR MESSAGE VARIABLE --give me the some example with description for daily task . so i want to add thi my project dumt data 
$error = "";


if(isset($_POST['register'])){ 

    // GET FORM DATA
    $username = trim($_POST['register_username']); 

    $email = strtolower(trim($_POST['email']));

    $password = trim($_POST['password']);

    // USERNAME VALIDATION
    if(strlen($username) < 3){
        $error = "Username must be at least 3 characters";
    }

    // EMAIL VALIDATION
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Invalid email format";
    }

    // PASSWORD VALIDATION
    elseif (strlen($password) < 4){
        $error = "Password must be at least 4 characters";
    }

    else{

    // PASSWORD HASHING

    $hashed_password = password_hash(
        $password,
        PASSWORD_DEFAULT
    );
    

    // CHECK DUPLICATE EMAIL
    $check = $conn->prepare(
        "SELECT id FROM users WHERE email = ?"
    );

    $check->bind_param("s", $email);

    $check->execute();

    $result = $check->get_result();

        // IF EMAIL EXISTS
        if($result->num_rows > 0){

            $error = "Email already exists";

        }

    else{

        // INSERT USER

        $sql = "INSERT INTO users(username, email, password)
                VALUES(?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "sss",
            $username,
            $email,
            $hashed_password
        );

        $insert = $stmt->execute();

        // SUCCESS

            if($insert){

                header("Location: login.php");

                exit();

            }
            else{

                echo "Something went wrong";

            }

    }
    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Register</title>
    
    <!-- GLOBAL CSS --> 
    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

    <!--register.css--> 
    <link
    rel="stylesheet"
    href="assets/css/register.css"
>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    >

</head>

<body>

    <form method="POST" class="auth-form"  autocomplete="off">

        <h2>Register</h2>

        <!-- ERROR MESSAGE -->
        <?php if($error != ""){ ?>

            <div class="error-msg">
                <?php echo $error; ?>
            </div> 

        <?php } ?>


        <!-- USERNAME INPUT -->
        <input 
            type="text" 
            name="register_username" 
            placeholder="Enter username"
            required
            minlength="3"
            maxlength="20"
            autocomplete="new-password"
            value="<?php echo htmlspecialchars($register_username ?? ''); ?>"
        >
        
        <!-- EMAIL INPUT -->

        <input
            type="email" 
            name="email" 
            placeholder="Enter email"
            minlength="5"
            maxlength="50"
            autocomplete="off"
            required
            value="<?php echo htmlspecialchars($email ?? ''); ?>"
        >

        <input 
            type="password"
            name="password" 
            placeholder="Enter password" 
            required
            minlength="4"
            maxlength="50"
            autocomplete="new-password"
        >     

        <button type="submit" name="register">

            Register

        </button>

        <div class="login_link">

            <a href="login.php">

                Login Here

            </a>

        </div>

    </form>

</body>

</html>