<head>
    <link rel="stylesheet" href="pages/css/map.css" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script rel="javascript" type="text/javascript" src="pages/script.js"></script>
</head>

<body>
    <?php

        session_start();
        require_once ('config.php');

        $data = mysqli_query($database, "SELECT * FROM `users`");

        $players = array();

        if (!empty($data)) {
            foreach ($data as $index => $column) {
                $players[$column['username']] = ["x" => $column['x_coordinate'], "y" => $column['y_coordinate'], "color" => $column['color'], "industry" => $column['industry'], "energy" => $column['energy'], "industry_level" => $column['industry_level'], "energetic_plant_level" => $column['energetic_plant_level']];
            }
        }

    ?>

    <div class="left">
        <img src="pages/icons/industry.png" alt="Industry" class="construction_picture"/>
        <?php

            $query = "SELECT * FROM `users` WHERE `username` = '$_SESSION[user]'";
            $result = mysqli_query($database, $query);
            $row = mysqli_fetch_assoc($result);

            $industry_cost_in_energy = 10 * ($row['industry_level'] + 1);
            $industry_cost_in_industry = 200 * ($row['industry_level'] + 1);

            echo "<p class='construction'>Industry</p>";
            echo "<p class='construction'>Cost</p>";
            echo "<p class='construction'>Energy : $industry_cost_in_energy</p>";
            echo "<p class='construction'>Industry : $industry_cost_in_industry</p>";
            echo "<button type='submit' class='buy_button' id='industry' onclick='buy_ressources()'>Buy</button>";

        ?>

        <img src="pages/icons/energetic_plant.png" alt="Energetic plant" class="construction_picture"/>

        <?php

            $energetic_plant_cost_in_industry = 200 * ($row['energetic_plant_level'] + 1);

            echo "<p class='construction'>Energetic Plant</p>";
            echo "<p class='construction'>Cost : $energetic_plant_cost_in_industry Industry</p>";
            echo "<button type='submit' class='buy_button' id='energetic_plant' onclick='buy_ressources()'>Buy</button>";

        ?>

        <img src="pages/icons/canon.png" alt="Canon" class="construction_picture"/>

        <?php

            echo "<p class='construction'>Canon</p>";
            echo "<p class='construction'>Cost</p>";
            echo "<p class='construction'>Energy : 2</p>";
            echo "<p class='construction'>Industry : 15</p>";
            echo "<button type='submit' class='buy_button' id='canon' onclick='buy_ressources()'>Buy</button>";

        ?>

        <img src="pages/icons/troop.png" alt="Offensive Troop" class="construction_picture"/>

        <?php

            echo "<p class='construction'>Offensive Troop</p>";
            echo "<p class='construction'>Cost : 10 Industry</p>";
            echo "<button type='submit' class='buy_button' id='offensive_troop' onclick='buy_ressources()'>Buy</button>";

        ?>

        <img src="pages/icons/troop.png" alt="Offensive Troop" class="construction_picture"/>

        <?php

            echo "<p class='construction'>Logistic Troop</p>";
            echo "<p class='construction'>Cost : 10 Industry</p>";
            echo "<button type='submit' class='buy_button' id='logistic_troop' onclick='buy_ressources()'>Buy</button>";

        ?>
    </div>
    <div class="top_left">
        <img src="pages/icons/ugame_logo.png" alt="UGame Logo" class="ugame_logo"/>
    </div>
    <div id="info">
    </div>
    <div class="top_right">
        <a href="pages/profil.php">
            <img src="pages/icons/user.png" alt="User" class="user">
        </a>
    </div>
    <div class="right">
    </div>
    <script>
        var infodiv = document.getElementById("info");
        function setInfo(name, x, y, industry, energy, industry_level, energetic_plant_level)
        {
            infodiv.innerHTML = "username: " + name + "<br />&emsp; &emsp; X: " + x + "&emsp; &emsp; Y: " + y + "&emsp; &emsp; industry: " + industry + "&emsp; &emsp; industry level: " + industry_level + "&emsp; &emsp; energy: " + energy + "&emsp; &emsp; energy level: " + energetic_plant_level;
        }
    </script>
    <div id="screen">
        <img src="pages/icons/grass.jpg" alt="Grass" class="grass"/>
        <?php foreach ($players as $name => $player) { ?>
            <div
                class="player_dot"
                style="top: <?=$player["y"] * 3; ?>; left: <?=$player["x"] * 3; ?>; background-color: <?=$player["color"]; ?>;"
                onmouseover="setInfo('<?=$name; ?>', <?=$player["x"]; ?>, <?=$player["y"]; ?>, <?=$player["industry"]; ?>, <?=$player["energy"]; ?>, <?=$player["industry_level"]; ?>, <?=$player["energetic_plant_level"]; ?>);"
                >
            </div>
        <?php } ?>
    </div>
</body>