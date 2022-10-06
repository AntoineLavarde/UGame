<?php
    $database = mysqli_connect('localhost', 'UGameAdmin', 'Complicated-4-PASS', 'ugame');

    if (!$database) {
        die("Error ! Impossible to establish the connection with the database, status : " . mysqli_connect_error());
    }
?>
