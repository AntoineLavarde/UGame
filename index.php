<?php
    session_start();
    require_once('pages/config.php'); //bdd
?>
<html>
<head>
	<title>UGame</title>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="pages/css/style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
<head>
<body> 
<?php
$dir = 'pages/';
echo($_SESSION['user']);
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
