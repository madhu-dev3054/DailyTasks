<?php

include 'config/db.php';

$message = "";

if(isset($_POST['send_message'])){

    $name = $_POST['name'];

    $email = $_POST['email'];

    $user_message = $_POST['message'];

    $sql = "INSERT INTO contacts(name, email, message)
            VALUES('$name', '$email', '$user_message')";

    if(mysqli_query($conn, $sql)){

        $message = "Message Sent Successfully";

    }
    else{

        $message = "Failed To Send Message";

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact - Daily Notes</title>

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<section class="contact-section">

    <h1 class="contact-title">
        Contact Us
    </h1>

    <p class="contact-text">
        Have questions or suggestions?
        Feel free to contact us anytime.
    </p>

    <div class="contact-container">

        <!-- CONTACT INFO -->

        <div class="contact-info">

            <h2>Get In Touch</h2>

            <p>📧 Email: dailynotes@gmail.com</p>

            <p>📞 Phone: +91 0000000000</p>

            <p>📍 Location: Ahmedabad, Gujarat</p>

        </div>

        <!-- CONTACT FORM -->

        <div class="contact-form">

            <?php

            if($message != ""){

                echo "<p>$message</p>";

            }

            ?>

            <form action="" method="POST">

                <input 
                    type="text"
                    name="name"
                    placeholder="Enter Your Name"
                    required
                >

                <input 
                    type="email"
                    name="email"
                    placeholder="Enter Your Email"
                    required
                >

                <textarea 
                    name="message"
                    placeholder="Write Your Message"
                    required
                ></textarea>

                <button type="submit" name="send_message">
                    Send Message
                </button>

            </form>

        </div>

    </div>

</section>

<?php include 'includes/footer.php'; ?>

</body>
</html>