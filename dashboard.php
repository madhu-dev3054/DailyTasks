<?php

session_start();

if(!isset($_SESSION['user_id'])){

    header("Location: login.php");

    exit();
}

include 'config/db.php';

include 'includes/navbar.php';

$user_id = $_SESSION['user_id'];

/* TASK FILTER */

if(isset($_GET['status'])){

    $status = $_GET['status'];

    $sql = "SELECT * FROM tasks
            WHERE user_id='$user_id'
            AND status='$status'";
}
else{

    $sql = "SELECT * FROM tasks
            WHERE user_id='$user_id'";
}

$result = mysqli_query($conn, $sql);

/* 3. DASHBOARD CARDS  */

// TOTAL TASKS (ALL)
$total_query = "SELECT COUNT(*) as total 
                FROM tasks 
                WHERE user_id='$user_id'";

$total_result = mysqli_query($conn, $total_query);
$total_tasks = mysqli_fetch_assoc($total_result)['total'];

// COMPLETED TASKS (ALL)
$completed_query = "SELECT COUNT(*) as completed 
                    FROM tasks 
                    WHERE user_id='$user_id' 
                    AND status='Completed'";

$completed_result = mysqli_query($conn, $completed_query);
$completed_tasks = mysqli_fetch_assoc($completed_result)['completed'];

// PENDING TASKS (ALL)
$pending_tasks = $total_tasks - $completed_tasks;

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="container">

    <h1>Task Dashboard</h1>

    <!-- DASHBOARD CARDS -->

    <div class="dashboard-cards">

        <div class="card">

            <h2>Total Tasks</h2>

            <p><?php echo $total_tasks; ?></p>

        </div>

        <div class="card">

            <h2>Completed</h2>

            <p><?php echo $completed_tasks; ?></p>

        </div>

        <div class="card">

            <h2>Pending</h2>

            <p><?php echo $pending_tasks; ?></p>

        </div>

    </div>

    <!-- ADD BUTTON -->

    <a href="add-task.php" class="add-btn">

        <i class="fa-solid fa-plus"></i>

        Add Task

    </a>

    <div class="filter-buttons">

    <a href="dashboard.php" class="filter-btn">
        All
    </a>

    <a href="dashboard.php?status=Pending"
       class="filter-btn">
        Pending
    </a>

    <a href="dashboard.php?status=Completed"
       class="filter-btn">
        Completed
    </a>

</div>

    <!-- SEARCH -->

    <input
        type="text"
        id="searchInput"
        placeholder="Search task..."
        class="search-bar"
    >

    <!-- TABLE -->

    <div class="table-wrapper">

        <table>

            <tr>

                <th>S.No</th>

                <th>Title</th>

                <th>Description</th>

                <th>Created Date</th>

                <th>Due Date</th>

                <th>Status</th>

                <th>Completed At</th>

                <th>Action</th>
                

            </tr>

<?php

$sno = 1;

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

    <td><?php echo $sno; ?></td>

    <td>

        <?php echo $row['title']; ?>

    </td>

    <td>

        <?php echo $row['description']; ?>

    </td>

    <td>

<?php
echo date(
    "d M Y",
    strtotime($row['created_at'])
);
?>

</td>

<!--add the date-->
<td>

    <?php

        if($row['due_date']){

            echo date( "d M Y h:i A", strtotime($row['due_date']));
                if( $row['status'] == "Pending"&& strtotime($row['due_date']) < time()){
                     echo "<br><span class='overdue'>Overdue</span>";
                    }
            }
            else{

                echo "No Date";
            }

    ?>

</td>

<td>

            <?php

            if($row['status'] == "Pending"){

                echo "<span class='pending'>Pending</span>";
            }
            else{

                echo "<span class='completed'>Completed</span>";
            }

            ?>

</td>

<td>

<?php

if($row['completed_at']){

    echo date(
        "d M Y h:i A",
        strtotime($row['completed_at'])
    );
}
else{

    echo "-";
}

?>

</td>

    <td>

        <a
        href="edit-task.php?id=<?php echo $row['id']; ?>"
        class="edit-btn">

            <i class="fa-solid fa-pen"></i>

        </a>

        <a
        href="delete-task.php?id=<?php echo $row['id']; ?>"
        class="delete-btn">

            <i class="fa-solid fa-trash"></i>

        </a>

    </td>

</tr>

<?php

$sno++;

}

?>

        </table>

    </div>

</div>

<div id="toast"></div>

<script src="assets/js/script.js"></script>

</body>

</html>