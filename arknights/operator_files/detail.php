<?php

require 'functions.php';

$id = $_GET['id'];
$op = query("SELECT * FROM operators WHERE id = $id")

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Operator Detail</title>
</head>

<body>

  <h1>Operator Detail</h1>

  <ul>
    <li><img src="img/<?= $op['image']; ?>" width="128"></li>
    <li>Codename : <?= $op['codename']; ?></li>
    <li>Gender : <?= $op['gender']; ?></li>
    <li>Class : <?= $op['class']; ?></li>
    <li>Combat Experience : <?= $op['combat_experience']; ?></li>
    <li>Birthplace : <?= $op['birthplace']; ?></li>
    <li>Birthdate : <?= $op['birthdate']; ?></li>
    <li>Race : <?= $op['race']; ?></li>
    <li>Height : <?= $op['height']; ?></li>
    <li>Infection : <?= $op['infection']; ?></li>
  </ul>



</body>

</html>