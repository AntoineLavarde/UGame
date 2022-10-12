<?php
  $players = [
     "damdoshi" => ["x" => 50, "y" => 150, "color" => "red"],
     "metalman" => ["x" => 200, "y" => 300, "color" => "green"],
     "la tentacule pourpre" => ["x" => 490, "y" => 300, "color" => "purple"],
  ];
?>

<style>
  body
  {
    background-color: gray;
  }
  #info
  {
     z-index: 1;
     border: 1px solid black;
     width: 1500px;
     height: 100px;
     position: fixed;
     left: calc((100% - 1500px) / 2);
     top: 0px;
     background-color: white;
  }
  #screen
  {
    position: absolute;
    top: 110px;
    left: calc((100% - 1500px) / 2);
    background-color: white;
    border: 5px solid black;
    width: 1500px;
    height: 1500px;
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
<div id="info">
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
