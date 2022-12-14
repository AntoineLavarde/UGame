<head>
    <title>Register/Login</title>
    <link rel="stylesheet" href="pages/css/style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <form class="register" method="post">
        <h3>Register</h3>
        <label for="register_username">Username</label>
        <input type="text" placeholder="Username" name="register_username" required>
        <label for="register_password">Password</label>
        <input type="password" placeholder="Password" name="register_password" required>
        <label for="password_confirmation">Password Confirmation</label>
        <input type="password" placeholder="Password Confirmation" name="password_confirmation" required>
        <button type="submit">Register</button>
    </form>
    <form class="login" method="post">
        <h3>Login</h3>
        <label for="login_username">Username</label>
        <input type="text" placeholder="Username" name="login_username" required>
        <label for="login_password">Password</label>
        <input type="password" placeholder="Password" name="login_password" required>
        <button type="submit">Log In</button>
    </form>
</body>

<?php

    session_start();
    require_once('config.php');

    function generateRandomCoordinates() {
        return rand(0, 500);
    }

    function generateRandomColor() {
        return '#' . dechex(rand(0x000000, 0xFFFFFF));
    }

    if (isset($_REQUEST['register_username'], $_REQUEST['register_password'], $_REQUEST['password_confirmation'])) {
        $username = stripslashes($_REQUEST['register_username']);
        $username = mysqli_real_escape_string($database, $username);

        $result = mysqli_query($database, "SELECT `username` FROM `users` WHERE LOWER(`username`) = LOWER('$username')");
        $count = $result -> num_rows;

        if ($count < 1) {
            if ($_REQUEST['register_password'] === $_REQUEST['password_confirmation']) {
                $password = stripslashes(password_hash($_REQUEST['register_password'], PASSWORD_BCRYPT));
                $password = mysqli_real_escape_string($database, $password);

                $x_coordinate = generateRandomCoordinates();
                $x_coordinate_query = mysqli_query($database, "SELECT `x_coordinate` FROM `users` WHERE `x_coordinate` = '$x_coordinate'");

                $y_coordinate = generateRandomCoordinates();
                $y_coordinate_query = mysqli_query($database, "SELECT `y_coordinate` FROM `users` WHERE `y_coordinate` = '$y_coordinate'");

                while ($x_coordinate_query->num_rows > 0 || $y_coordinate_query->num_rows > 0) {
                    $x_coordinate = generateRandomCoordinates();
                    $y_coordinate = generateRandomCoordinates();
                    $x_coordinate_query = mysqli_query($database, "SELECT `x_coordinate` FROM `users` WHERE `x_coordinate` = '$x_coordinate'");
                    $y_coordinate_query = mysqli_query($database, "SELECT `y_coordinate` FROM `users` WHERE `y_coordinate` = '$y_coordinate'");
                }

                $color = generateRandomColor();
                $color_query = mysqli_query($database, "SELECT `color` FROM `users` WHERE `color` = '$color'");

                while ($color_query->num_rows > 0) {
                    $color = generateRandomColor();
                    $color_query = mysqli_query($database, "SELECT `color` FROM `users` WHERE `color` = '$color'");
                }

                mysqli_query($database, "INSERT INTO `users` (`username`, `password`, `x_coordinate`, `y_coordinate`, `color`) VALUES ('$username', '$password', '$x_coordinate', '$y_coordinate', '$color')");
            } else {

                ?>

                <script>alert("Passwords are not matching!");</script>

                <?php
            }

        } else {

            ?>

            <script>alert("Username already exists!");</script>

            <?php
        }
    }

    else if (isset($_REQUEST['login_username'], $_REQUEST['login_password'])) {
        $username = stripslashes($_REQUEST['login_username']);
        $username = mysqli_real_escape_string($database, $username);

        $password = stripslashes($_REQUEST['login_password']);
        $password = mysqli_real_escape_string($database, $password);

        $query = mysqli_query($database, "SELECT `username` FROM `users` WHERE `username` = '$username'");
        $count = $query -> num_rows;

        if ($count === 1) { #Print alert in JS if username doesn't exist
            $request = "SELECT * FROM `users` WHERE `username` = '$username'";

            $result = mysqli_query($database, $request);
            $data = mysqli_fetch_array($result);

            if (password_verify($password, $data['password'])) {
                $user = mysqli_fetch_assoc($result);
                $_SESSION['user'] = $data['username'];

                header('Location: index.php');
                die();
            } else {

                ?>

                <script>alert("Incorrect password!");</script>

                <?php
            }

        } else {

            ?>

            <script>alert("Username doesn't exist!");</script>

            <?php

        }
    }
?>