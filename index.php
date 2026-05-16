<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Daily Notes</title>

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="hero">

<h1>
    Welcome To Daly Notes
</h1>

<p>
    Manage your daily tasks easily.
</p>

<?php

if(isset($_SESSION['user_id'])){

?>

<a href="dashboard.php"
   class="add-btn">

   Go To Dashboard

</a>

<?php

}
else{

?>

<a href="login.php"
   class="add-btn">

   Add Task

</a>

<?php

}

?>

</div>

<?php include 'includes/footer.php'; ?>


</body>
</html>