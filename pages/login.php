<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <Title>Login</Title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body>
        <div class="login">
            <h1>Login</h1>
            <form action="login.php" method="POST">
                <label for="username">
                    <i class="fas fa-user"></i>
                </label>
                <input type="text" name="username" placeholder="Username" id="username" required>
                <label for="password">
                    <i class="fas fa-lock"></i>
                </label>
                <input type="password" name="password" placeholder="Password" id="password" required>
                <input type="submit" value="Login">
            </form>
            <p>New user ? Register right now :
                <a href="register.php">Register</a>
            </p>
        </div>
    </body>
</html>

<?php
    require('config.php');

    session_start();

    if (isset($_REQUEST['username'], $_REQUEST['password'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($database, $username);

        $password = stripslashes(password_hash($_REQUEST['password'], PASSWORD_BCRYPT));
        $password = mysqli_real_escape_string($database, $password);

        $query = "SELECT * FROM users WHERE username=$username";

        $result = mysqli_query($database, $query);
        $data = mysqli_fetch_array($result);

        if (mysqli_num_rows($result) != 0) {
            if (password_verify($password, $data['password'])) {
                $user = mysqli_fetch_assoc($result);
                $_SESSION['user'] = $data['token'];
                $_SESSION['userid'] = $data['id'];
                header('Location: ../index.php');
                die();
            } else {
                header('Location: ../index.php');
            }
        } else {
            header('Location: ../index.php');
        }
    }
?>