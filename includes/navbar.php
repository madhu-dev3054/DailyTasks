<?php

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

?>

<nav class="navbar">

    <!-- LOGO -->

    <a href="<?php echo isset($_SESSION['user_id']) ? 'dashboard.php' : 'index.php'; ?>" class="logo">
        Daily Notes
    </a>

    <div class="nav-links">

<?php

if(isset($_SESSION['username'])){

?>

        <!-- USER INFO -->

        <span class="user-name">
            Welcome,
            <?php echo $_SESSION['username']; ?>
        </span>

        

        <!-- PRIVATE NAVBAR -->

        <a href="dashboard.php">
            Home
        </a>

        <a href="add-task.php">
            Add Task
        </a>

        <a href="profile.php">
            <img 
            src="assets/images/<?php echo $_SESSION['profile_photo']; ?>" 
            class="nav-profile" 
        >
        </a>

        <!--<a href="logout.php">
            Logout
        </a> -->

<?php

}
else{

?>

        <!-- PUBLIC NAVBAR -->

        <span class="guest-user">
            Guest User
        </span>

        <a href="index.php">
            Home
        </a>

        <a href="about.php">
            About
        </a>

        <a href="services.php">
            Services
        </a>

        <a href="contact.php">
            Contact
        </a>

        <a href="login.php">
            Login
        </a>

        <a href="register.php">
            Register
        </a>

<?php

}

?>

    </div>

</nav>