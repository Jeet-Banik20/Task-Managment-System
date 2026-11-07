<?php
include('connect.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
date_default_timezone_set('Asia/Kolkata');

if(isset($_POST['save']))
{
    $task_name= $_POST['task_name'];
    $description= $_POST['description'];
    $due_date= $_POST['due_date'];
    $priority= $_POST['priority'];
    $status= $_POST['status'];
    $user_id= $_SESSION['user_id'];

    $stmt= $conn->prepare("INSERT INTO tasks(user_id, title, task_description, task_status, task_priority, due_date) VALUES(?, ?, ?, ?, ?, ?);");
    $stmt->bind_param("isssss", $user_id, $task_name, $description, $status, $priority, $due_date);
    $stmt->execute();
    $res= $stmt->get_result();
    /*if($res->num_rows>0)
    {
        header("Location: dashboard.php");
        exit();
    }*/
    header("Location: create_task.php");
    exit;
    $stmt->close();
    $conn->close();
}
?>

<?php
/*
error_reporting(E_ALL); // Report all errors, warnings, and notices
ini_set('display_errors', '1'); // Display errors in the browser
ini_set('display_startup_errors', '1'); // Display startup errors
*/
?>
