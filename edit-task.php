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

$id = $_GET['id'];

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM tasks
        WHERE id='$id'
        AND user_id='$user_id'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);


if(isset($_POST['update_task'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

      $completed_at = NULL;
    if($status == "Completed"){
      $completed_at = date("Y-m-d H:i:s");
    }

    $due_date = $_POST['due_date'];
    $due_time = $_POST['due_time'];
    $due_date = $due_date . " " . $due_time;

    $update = "UPDATE tasks
                SET title='$title',
                description='$description',
                status='$status',
                due_date='$due_date',
                completed_at='$completed_at'
                WHERE id='$id'
                AND user_id='$user_id'";

    $run = mysqli_query($conn, $update);

    if($run){

        header("Location: dashboard.php");
    }
    else{

        echo "Task Not Updated";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Task</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="container">

    <h1>Edit Task</h1>

    <form method="POST" class="task-form">

        <input type="text"
               name="title"
               value="<?php echo $row['title']; ?>"
               required>

        <textarea name="description"
                  required><?php echo $row['description']; ?>
        </textarea>

         <label class="date-label">
    Update Delay Date
</label>

<input type="date"
       name="due_date"

       value="<?php

       if($row['due_date']){

           echo date(
               'Y-m-d',
               strtotime($row['due_date'])
           );
       }

       ?>">

    <label class="date-label">Update Time</label>
    <input type="time"
       name="due_time"

       value="<?php

       if($row['due_date']){

           echo date(
               'H:i',
               strtotime($row['due_date'])
           );
       }
      ?>">

        <select name="status">

            <option value="Pending"
            <?php
            if($row['status'] == "Pending"){
                echo "selected";
            }
            ?>>
                Pending
            </option>

            <option value="Completed"
            <?php
            if($row['status'] == "Completed"){
                echo "selected";
            }
            ?>>
                Completed
            </option>

        </select>

        <button type="submit"
                name="update_task">

            Update Task

        </button>

    </form>

</div>

<div id="toast"></div>

<script src="assets/js/script.js"></script>


</body>
</html>