<?php
include('connect.php');

/*$sql = "SELECT * FROM tasks";
$result = mysqli_query($conn, $sql);*/
if ($_SESSION['loggedin'] != 1) {
    header("Location: login.php");
    exit();
} else {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM tasks WHERE user_id= '$user_id'";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Font-awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./style.css">
</head>

<body class="bg-dark">
    <?php include('navbar.php') ?>
    <div class="container mt-4">
        <div class="container btn-group">
            <form action="task_rep.php" method="post">
                <button class="print-btn"><i id="printIcon" class="fa-solid fa-print"></i><br><span>Print Task</span></button>
            </form>
            <h1 id="headTitle" class="heading">Task List</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center border-secondary">
                <thead class="bg-secondary">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Due Date</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td><?php echo ucfirst($rows['title']); ?></td>
                                <td><?php echo ucfirst($rows['task_description']); ?></td>
                                <td id="status"><?php $stsText = str_replace("_", " ", ucfirst($rows['task_status']));
                                                if ($stsText == "Pending")
                                                    echo "<div style='color: #ad0415; background-color: #f8d7da;'>$stsText</div>";
                                                else if ($stsText == "Completed")
                                                    echo "<div style='color: #027e44; background-color: #d1e7dd;'>$stsText</div>";
                                                else
                                                    echo "<div style='color: #b98c03; background-color: #fff3cd;'>$stsText</div>"; ?>
                                </td>
                                <td><?php echo ucfirst($rows['task_priority']); ?></td>
                                <td class="table-active"><?php echo date('d-m-Y', strtotime($rows['due_date'])); ?></td>
                                <td><?php echo date('d-m-Y', strtotime($rows['created_at'])); ?></td>
                                <td><?php if ($rows['updated_at'] != NULL) {
                                        echo date('d-m-Y', strtotime($rows['updated_at']));
                                    } else {
                                        echo date('d-m-Y', strtotime($rows['created_at']));
                                    } ?></td>
                                <td>
                                    <a href="edit_task.php?id=<?php echo $rows['task_id'] ?>"><button class="btn btn-warning">Edit</button></a>
                                    <a href="delete_task.php?id=<?php echo $rows['task_id'] ?>"><button class="btn btn-danger">Remove</button></a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script>
        //right click protection
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
    <script src="./script.js"></script>
</body>

</html>