<?php
session_start();
$conn= mysqli_connect("localhost", "root", "") or die(mysqli_error($conn));
$select_db= mysqli_select_db($conn, "task_ms");
?>