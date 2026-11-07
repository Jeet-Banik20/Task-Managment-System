<?php

use FontLib\Table\Type\head;

include('connect.php');
?>


<?php
if(isset($_POST['singup']))
{
    $username= $_POST['username'];
    $password= $_POST['password'];
    $hashPassword= password_hash($password, PASSWORD_DEFAULT);
    $cnfmPass= $_POST['cnfmPass'];
}

if($password==$cnfmPass)
{
    $stmt= $conn->prepare("SELECT email FROM users WHERE email= ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $res= $stmt->get_result();

    if($res->num_rows!=0)
    {
        echo "<h3 style='color: gold;'>You are a existing user. Please try with login</h3>";
    }
    else
    {
        $sql= "INSERT INTO users SET email= '$username', password_hash= '$hashPassword'";
        mysqli_query($conn, $sql);
        header("Location: login.php");
        exit;
    }
}
else
{
    echo "<script>alert('Password and Confirm password not match');</script>";
    /*sleep(10);
    header("Location: singup.html", true, 301);
    exit;*/
}
?>