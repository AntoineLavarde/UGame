<?php
    session_start();
    require_once 'pages/config.php'; //bdd
?>
<html>
<head>
	<title>Main menu</title>
	<link rel="stylesheet" href="css/style.css">
    <link href="pages/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<head>
<body> 
<div>
  <?php
      $array = array("config","login","profil","screen");
      $dir = 'pages/';
    ?>
</div>
<center>
<?php
if(isset($_SESSION['user'])){
   $qs = ('SELECT * FROM users WHERE token = ?');
   $data = mysqli_query($database,$qs);
   require($dir . "screen.php");
?>
<div class="topright"><button class="button-account" onclick="window.location.href='pages/profil.php';" role="button"><span class="text">comptefefoezfezhfuzeofzehfzeuofhzeufzejfhuoezhfhzeufz</span></button></div>
<?php
}else{require($dir . "login.php");}
?>
</center>
</body>
</html>
