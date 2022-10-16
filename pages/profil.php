<?php

    session_start();
    require_once('config.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        die();
    }

?>

<head>
    <title>Profil</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="top_left">
        <a href="../index.php">
            <img src="icons/back_arrow.png" alt="Back Arrow" class="back_arrow"/>
        </a>
    </div>
    <div class="profil">
        <h3>Profil Informations</h3>
        <?php

            echo "<label for='username'>Username : $_SESSION[user]</label>";

        ?>
        <button onclick="window.location.href='update_profil.php';">Modify Profil Informations</button>
        <button onclick="window.location.href='disconnect.php';">Disconnect</button>
    </div>
</body>