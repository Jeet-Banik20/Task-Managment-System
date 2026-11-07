<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font-awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitcount+Grid+Single:wght@100..900&family=Jura:wght@300..700&family=Libertinus+Serif:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./user.css">
</head>

<body>
    <div class="my-div container">
        <!-- DISPLAY ERROR ALERT HERE -->
        <?php if (isset($_SESSION['errorMsg'])): ?>
            <div class="alert alert-danger alert-dismissible fade show fw-bold p-2" role="alert">
                <?php 
                    echo htmlspecialchars($_SESSION['errorMsg']); 
                    unset($_SESSION['errorMsg']); // Clear after showing
                ?>
                <button type="button" class="btn-close p-2 fs-5" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form id="loginForm" action="./login_logic.php" method="post">
            <div class="input-div">
                <label for="username">Enter username</label>
                <input type="email" placeholder="Email" name="username" required>
                <p class="loginError" id="usernameError"></p>
                <label for="password">Enter password</label>
                <input type="password" placeholder="Password" name="password" id="pass" required>
                <p class="loginError" id="passwordError"></p>
                <button type="button" class="icon-btn" id="eyebtn" onclick="eyeFun()">
                    <!-- Eye icon --> <i class="fa-solid fa-eye-slash" id="eye"></i>
                </button>
                <a class="singup-link-text" href="./singup.php">New user?</a>
            </div>
            <div class="btn-div">
                <button class="btn btn-success" type="submit" name="login">Login</button>
                <button class="btn btn-warning" type="reset">Clear</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS bundle (needed for closing alerts dynamically) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Own JS -->
    <script>
        //right click protection
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
    <script src="./script.js"></script>
</body>

</html>