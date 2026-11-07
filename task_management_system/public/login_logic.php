<?php
include('connect.php');
if(isset($_POST['login']))
{
    $username= $_POST['username'];
    $password= $_POST['password'];
}

$stmt= $conn->prepare("SELECT email, password_hash FROM users WHERE email= ?");
/*if ($stmt === false) {
    die("Error preparing the statement: " . $conn->error); //Check error in $stmt
}*/
$stmt->bind_param("s", $username);
$stmt->execute();
$result= $stmt->get_result();

if($result->num_rows>0)
{
    $user= $result->fetch_assoc();
    $pass= $user['password_hash'];
    if(password_verify($password, $pass))
    {
        $sql= "SELECT id FROM users WHERE email= '$username'";
        $res= mysqli_query($conn, $sql);
        $row= mysqli_fetch_assoc($res);
        $_SESSION['user_id']= $row['id'];//$user['user_id'];
        $_SESSION['loggedin']= 1;
        header("Location: dashboard.php");
        exit();
    }
}

$_SESSION['errorMsg'] = "Invalid email or password.";
header("Location: login.php");
exit();

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
</body>
</html>