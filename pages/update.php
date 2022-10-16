<?php
    session_start();
    require_once('config.php');
    $q="SELECT `energetic_plant_level`,`energy`,`username` FROM `users` WHERE `energetic_plant_level` > 0"; 
    $result= mysqli_query($database,$q);
    $count=  $result -> num_rows;

    if($count > 0){
        $players = array();
        foreach ($result as $index => $column){
            $players[$column['username']] = ["username" => $column['username'],"energy" => $column['energy'], "energetic_plant_level" => $column['energetic_plant_level']];
        }
        foreach($players as $name => $player){
            $energy=$player['energy']+5*(20*pow(2,($player["energetic_plant_level"]-1))); 
            $q="UPDATE `users` SET `energy`='$energy' WHERE `username`='$name'";
            mysqli_query($database,$q);
        }
    }
    $q="SELECT `industry_level`,`industry`,`username` FROM `users` WHERE `industry_level` > 0"; 
    $result= mysqli_query($database,$q);
    $count=  $result -> num_rows;

    if($count > 0){
        $joueurs = array();
        foreach ($result as $index => $column){
            $joueurs[$column['username']] = ["username" => $column['username'],"industry" => $column['industry'], "industry_level" => $column['industry_level']];
        }
        foreach($joueurs as $name => $joueur){
            $industry=$joueur['industry']+5*(5*pow(2,($joueur["industry_level"]-1))); 
            $q="UPDATE `users` SET `industry`='$industry' WHERE `username`='$name'";
            mysqli_query($database,$q);
        }
    }
    header('Location:../index.php');
?>
