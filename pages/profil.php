<?php
    $_SESSION['user']="Antoine";
    if(!isset($_SESSION['user'])){
        header('Location: login.php');
        die();
    }
    
include "config.php";
$query = ("SELECT * FROM users WHERE username ='" . $_SESSION['user']. "'");
$data = mysqli_query($database,$query);
?>
<link rel="stylesheet" href="../css/style.css">
<center>
<button class="button-menu" onclick="window.location.href='disconnect.php';" role="button"><span class="text">log out</span></button>
</center>
