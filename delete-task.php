<?php

include 'config/db.php';

$id = $_GET['id'];

$sql = "DELETE FROM tasks WHERE id = $id";

$result = mysqli_query($conn, $sql);

if($result){

    header("Location: dashboard.php");
}
else{

    echo "Task Not Deleted";
}

?>