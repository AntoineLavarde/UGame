<?php

  require_once ('config.php');

  function fetchDatabase($database) {
    return mysqli_query($database, "SELECT * FROM users");
  }

  $data = fetchDatabase($database);

  $players = array();

  if (!empty($data)) {
    foreach ($data as $index => $column) {
      $players[$column['username']] = ["x" => $column['x_coordinate'], "y" => $column['y_coordinate'], "color" => $column['color']];
    }
  }

?>

<style>
  body
  {
    background-color: gray;
  }

  #screen
  {
    position: absolute;
    top: 205px;
    left: calc((100% - 1500px) / 2);
    background-color: white;
    width: 1500px;
    height: 1500px;
  }

  #info
  {
     z-index: 1;
     width: 1500px;
     height: 205px;
     position: fixed;
     left: calc((100% - 1500px) / 2);
     top: 0px;
     background-color: black;
     color: white;
  }

  .left {
    position: fixed;
    top: 205px;
    left: calc((100% - 1905px) / 2);
    background-color: black;
    width: 203px;
    height: 775px;
  }

  .right {
    position: fixed;
    top: 205px;
    right: calc((100% - 1905px) / 2);
    background-color: black;
    width: 202px;
    height: 775px;
  }

  .player_dot
  {
    position: absolute;
    border-radius: 1px;
    box-shadow:
      0px 0px 10px black,
      0px 0px 10px black,
      0px 0px 10px black,
      0px 0px 10px black,
      0px 0px 10px black
    ;
    width: 3px;
    height: 3px;
  }
</style>
<div class="left">
</div>
<div id="info">
</div>
<div class="right">
</div>
<script>
  var infodiv = document.getElementById("info");
  function setInfo(name, x, y)
  {
    infodiv.innerHTML = name + "<br />X: " + x + "<br />Y: " + y;
  }
</script>
<div class="topright"><button class="button-account" onclick="window.location.href='pages/profil.php';" role="button"><span class="text">account</span></button></div>
<div id="screen">
  <?php foreach ($players as $name => $player) { ?>
    <div
       class="player_dot"
       style="top: <?=$player["y"] * 3; ?>; left: <?=$player["x"] * 3; ?>; background-color: <?=$player["color"]; ?>;"
       onmouseover="setInfo('<?=$name; ?>', <?=$player["x"]; ?>, <?=$player["y"]; ?>);"
    >
    </div>
  <?php } ?>
</div>