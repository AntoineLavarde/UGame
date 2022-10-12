<?php
    session_start();
    require_once('pages/config.php'); //bdd
?>
<html>
<head>
	<title>UGame</title>
	<link rel="stylesheet" href="css/style.css">
    <link href="pages/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<head>
<body> 
<?php
$array = array("config","login","profil","screen","disconnect");
$dir = 'pages/';
//$_SESSION['user']='Antoine';
if(isset($_SESSION['user'])){
   $qs = ("SELECT * FROM users WHERE username ='" . $_SESSION['user']. "'");
   $data = mysqli_query($database,$qs);
   require($dir . "screen.php");
}else{
    require($dir . "login.php");
}
?>
</body>
</html>
