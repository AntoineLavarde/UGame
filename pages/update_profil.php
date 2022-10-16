<head>
    <title>Update profil</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>

<body>
    <form class="update_profil" method="post">
        <h3>Update Profil</h3>
        <label for="username">Username</label>
        <input type="text" placeholder="Username" name="username">
        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password">
        <label for="password_confirmation">Password Confirmation</label>
        <input type="password" placeholder="Password Confirmation" name="password_confirmation">
        <button type="submit">Confirm</button>
    </form>
</body>

<?php

    session_start();
    require_once('config.php');

    if (isset($_REQUEST['username'], $_REQUEST['password'], $_REQUEST['password_confirmation'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($database, $username);

        $result = mysqli_query($database, "SELECT `username` FROM `users` WHERE LOWER(`username`) = LOWER('$username')");
        $count = $result -> num_rows;
        if ($count < 1) { #Print alert in JS if username already exists
            if ($_REQUEST['password'] === $_REQUEST['password_confirmation']) {
                $password = stripslashes(password_hash($_REQUEST['password'], PASSWORD_BCRYPT));
                $password = mysqli_real_escape_string($database, $password);

                mysqli_query($database, "UPDATE `users` SET (`username`, `password`) VALUES ('$username', '$password') WHERE `username` = '$_SESSION[user]'");
            }
        }

        header('Location: profil.php');
    }

    else if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($database, $username);

        $result = mysqli_query($database, "SELECT `username` FROM `users` WHERE LOWER(`username`) = LOWER('$username')");
        $count = $result -> num_rows;

        if ($count < 1) { #Print alert in JS if username already exists
            mysqli_query($database, "UPDATE `users` SET `username` = '$username' WHERE `username` = '$_SESSION[user]'");

            $_SESSION['user'] = $username;
        }

        header('Location: profil.php');
    }

    else if (isset($_REQUEST['password'], $_REQUEST['password_confirmation'])) {
        if ($_REQUEST['password'] === $_REQUEST['password_confirmation']) {
            $password = stripslashes(password_hash($_REQUEST['password'], PASSWORD_BCRYPT));
            $password = mysqli_real_escape_string($database, $password);

            mysqli_query($database, "UPDATE `users` SET `password` = '$password' WHERE `username` = '$_SESSION[user]'");
        }

        header('Location: profil.php');
    }

    die();

?>