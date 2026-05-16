<?php

session_start();

if(!isset($_SESSION['user_id'])){

    header("Location: login.php");

    exit();
}

?>

<?php

include 'config/db.php';

include 'includes/navbar.php';

if(isset($_POST['add_task'])){

    $user_id = $_SESSION['user_id'];

    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $due_date = $_POST['due_date'];
    $due_time = $_POST['due_time'];
    $due_date = $due_date . " " . $due_time;

    $sql = "INSERT INTO tasks(user_id, title, description, status,due_date) VALUES('$user_id',
            '$title', '$description', '$status', '$due_date')";

    $result = mysqli_query($conn, $sql);

    if($result){

        header("Location: dashboard.php");
    }
    else{

        echo "Task Not Added";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Task</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="container">

    <h1>Add New Task</h1>

    <form method="POST" class="task-form">

        <input type="text"
               name="title"
               placeholder="Enter task title"
               required>
        <textarea
                name="description"
                placeholder="Enter task description"
                required></textarea>

        <label class="date-label">Select Due Date</label>

            <input type="date"
                name="due_date"
                required>

            <label class="date-label">
                Select Time
            </label>

            <input type="time"
                name="due_time"
                required>

        <select name="status">

            <option value="Pending">
                Pending
            </option>

            <option value="Completed">
                Completed
            </option>

        </select>

        <button type="submit"
                name="add_task">

            Add Task

        </button>

    </form>

</div>

<div id="toast"></div>

<script src="assets/js/script.js"></script>


</body>
</html>