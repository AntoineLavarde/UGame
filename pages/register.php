<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <Title>Register</Title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body>
        <div class="register">
            <h1>Register</h1>
            <form action="register.php" method="POST">
                <label for="username">
                    <i class="fas fa-user"></i>
                </label>
                <input type="text" name="username" placeholder="Username" id="username" required>
                <label for="password">
                    <i class="fas fa-lock"></i>
                </label>
                <input type="password" name="password" placeholder="Password" id="password" required>
                <label for="passwordConfirmation">
                    <i class="fas fa-lock"></i>
                </label>
                <input type="password" name="passwordConfirmation" placeholder="Password Confirmation" id="passwordConfirmation" required>
                <input type="submit" value="Register">
            </form>
            <p>Already have an account ? Login right now :
                <a href="login.php">Login</a>
            </p>
        </div>
    </body>
</html>

<?php
    require('config.php');

    if (isset($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['passwordConfirmation'])) {

        if ($_REQUEST['password'] === $_REQUEST['passwordConfirmation']) {
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($database, $username);

            $password = stripslashes(password_hash($_REQUEST['password'], PASSWORD_BCRYPT));
            $password = mysqli_real_escape_string($database, $password);

            $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

            if (mysqli_query($database, $query)) {
                header('location: ../index.php');
            } else {
                echo "Error : " . $query . "<br>" . mysqli_error($database);
            }
        }
    }

    mysqli_close($database);
?>