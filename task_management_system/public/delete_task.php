<?php
include('connect.php');
$task_id= $_GET['id'];
$sql= "DELETE FROM tasks WHERE task_id= $task_id";
$res= mysqli_query($conn, $sql);
if($res=true)
{
    //echo "Task removed successfully";
    //echo "<script>alert('Task removed successfully');</script>";
    //header("refresh: 4, url:dashboard.php");
    header("Location:dashboard.php");
    exit;
}
else
{
    echo "Error!";
}
?>