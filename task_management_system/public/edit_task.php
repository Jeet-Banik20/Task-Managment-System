<?php
include('connect.php');
date_default_timezone_set('Asia/Kolkata');

$task_id= $_GET['id'];
$sql= "SELECT * FROM tasks WHERE task_id= $task_id";
$res= mysqli_query($conn, $sql);
$row= mysqli_fetch_assoc($res);

if(isset($_POST['update']))
    {
        $task_name= $_POST['task_name'];
        $description= $_POST['description'];
        $due_date= $_POST['due_date'];
        $priority= $_POST['priority'];
        $status= $_POST['status'];
        $updateDate= date("Y-m-d");

        $stmt= $conn->prepare("UPDATE tasks SET title=?, task_description=?, task_status=?, task_priority=?, due_date= ?, updated_at= ? WHERE task_id= ?");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("ssssssi", $task_name, $description, $status, $priority, $due_date, $updateDate, $task_id);
        $stmt->execute();
        $_SESSION['msg']= "Task record updated successfully";
        header("Location: dashboard.php");
        exit();
    }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <div class="task-card">
            <h3 class="form-title">Edit Task</h3>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Task Name</label>
                    <input type="text" name="task_name" class="form-control" placeholder="Enter task name" value="<?php echo $row['title'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Task Description</label>
                    <textarea name="description" class="form-control h-10" placeholder="Enter description"><?php echo $row['task_description'] ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Due Date</label>
                    <input type="date" name="due_date" class="form-control" value="<?php echo $row['due_date'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Priority Level</label>
                    <select name="priority" class="form-select" require>
                        <option value="low" <?= $row['task_priority']=='low'?'selected':'' ?>>Low</option>
                        <option value="medium" <?= $row['task_priority']=='medium'?'selected':'' ?>>Medium</option>
                        <option value="high" <?= $row['task_priority']=='high'?'selected':'' ?>>High</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="pending" <?= $row['task_status']=='pending'?'selected':'' ?>>Pending</option>
                        <option value="in_progress" <?= $row['task_status']=='in_progress'?'selected':'' ?>>In Progress</option>
                        <option value="completed" <?= $row['task_status']=='completed'?'selected':'' ?>>Completed</option>
                    </select>
                </div>

                <div class="btn-group">
                    <button type="submit" name="update" class="btn btn-primary w-100">Upadte</button>
                    <button type="reset" class="btn btn-secondary w-100">Clear</button>
                </div>
            </form>
            <a href="dashboard.php" class="btn btn-dark w-100 mt-2">Back to Dashboard</a>
        </div>
    </div>
    <script>
        //right click protection
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
</body>

</html>