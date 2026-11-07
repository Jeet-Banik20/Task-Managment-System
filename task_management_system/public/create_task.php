<?php
include 'connect.php';

if($_SESSION['loggedin']!=1)
{
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./style.css">
</head>

<body class="bg-dark">
    <?php include('navbar.php') ?>
    <div class="container">
        <div class="task-card">
            <h3 class="form-title">Create Task</h3>

            <form action="./taskcreationlogic.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Task Name</label>
                    <input type="text" name="task_name" class="form-control" placeholder="Enter task name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Task Description</label>
                    <textarea name="description" class="form-control h-10" placeholder="Enter description"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Due Date</label>
                    <input type="date" name="due_date" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Priority Level</label>
                    <select name="priority" class="form-select" require>
                        <option value="" disabled selected hidden>Select priority</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <!-- <option value="">Select status</option> -->
                        <option value="pending" selected>Pending</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>

                <div class="btn-group">
                    <button type="submit" name="save" class="btn btn-primary w-100">Save</button>
                    <button type="reset" class="btn btn-secondary w-100">Clear</button>
                </div>
            </form>
            <div class="backToDash">
                <a href="dashboard.php"><button class="backToDashBtn">Back to dashboard</button></a>
            </div>
        </div>
    </div>
    <script>
        //right click protection
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
</body>

</html>