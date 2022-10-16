<?php

    session_start();
    require('config.php');

    $query = "SELECT * FROM `users` WHERE `username` = '$_SESSION[user]'";
    $result = mysqli_query($database, $query);
    $row = mysqli_fetch_assoc($result);

    $construction = $_POST['construction'];

    function buyIndustry($database, $row, $construction) {
        $industry_cost_in_energy = 10 * ($row['industry_level'] + 1);
        $industry_cost_in_industry = 200 * ($row['industry_level'] + 1);

        if ($construction === 'industry') {
            if ($row['energy'] >= $industry_cost_in_energy && $row['industry'] >= $industry_cost_in_industry) {
                $energy = $row['energy'] - $industry_cost_in_energy;
                $industry = $row['industry'] - $industry_cost_in_industry;
                $industry_level = $row['industry_level'] + 1;
                mysqli_query($database, "UPDATE `users` SET `energy` = '$energy', `industry` = '$industry', `industry_level` = '$industry_level' WHERE `username` = '$_SESSION[user]'");
            }
        }

        $energetic_plant_cost_in_industry = 200 * ($row['energetic_plant_level'] + 1);

        if ($construction === 'energetic_plant') {
            if ($row['industry'] >= $energetic_plant_cost_in_industry) {
                $industry = $row['industry'] - $energetic_plant_cost_in_industry;
                $energetic_plant_level = $row['energetic_plant_level'] + 1;
                mysqli_query($database, "UPDATE `users` SET `industry` = '$industry', `energetic_plant_level` = '$energetic_plant_level' WHERE `username` = '$_SESSION[user]'");
            }
        }

        if ($construction === 'canon') {
            if ($row['energy'] >= 2 && $row['industry'] >= 15) {
                $energy = $row['energy'] - 2;
                $industry = $row['industry'] - 15;
                $canon_quantity = $row['canon_quantity'] + 1;
                mysqli_query($database, "UPDATE `users` SET `energy` = '$energy', `industry` = '$industry', `canon_quantity` = '$canon_quantity' WHERE `username` = '$_SESSION[user]'");
            }
        }

        if ($construction === 'offensive_troop') {
            if ($row['industry'] >= 10) {
                $industry = $row['industry'] - 10;
                $offensive_troop_quantity = $row['offensive_troop_quantity'] + 1;
                mysqli_query($database, "UPDATE `users` SET `industry` = '$industry', `offensive_troop_quantity` = '$offensive_troop_quantity' WHERE `username` = '$_SESSION[user]'");
            }
        }

        if ($construction === 'logistic_troop') {
            if ($row['industry'] >= 10) {
                $industry = $row['industry'] - 10;
                $logistic_troop_quantity= $row['logistic_troop_quantity'] + 1;
                mysqli_query($database, "UPDATE `users` SET `industry` = '$industry', `logistic_troop_quantity` = '$logistic_troop_quantity' WHERE `username` = '$_SESSION[user]'");
            }
        }
    }

    buyIndustry($database, $row, $construction);

?>