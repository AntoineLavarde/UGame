<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header('Location: login.php');
        die();
    }
?>
<link rel="stylesheet" href="../css/style.css">
<center>
<button class="button-menu" onclick="window.location.href='disconnect.php';" role="button"><span class="text">log out</span></button>
</center>
