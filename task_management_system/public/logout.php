<?php
if(isset($_POST['logout']))
{
    session_destroy();
    //echo "<h3 style='color:orange;'>You have been logged out successfully</h3>";
    header("Location: login.php");
    exit();
}
?>