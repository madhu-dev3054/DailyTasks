<?php
   // creating to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "todo_db";

   //create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

   //Die if connection was not successfull
if (!$conn){
    die ("sorry we faild to connect:".mysqli_connect_error());
}

?>