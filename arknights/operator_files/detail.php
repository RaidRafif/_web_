<?php
require 'functions.php';

$id = $_GET['id'];
$op = query("SELECT * FROM operators WHERE id = $id");


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Operator</title>
</head>

<body>

  <h1>Detail Operator</h1>

  <ul>
    <li><img src="img/<?= $op['image']; ?>" width="128"></li>
    <li>Codename : <?= $op['codename']; ?></li>
    <li>Class : <?= $op['class']; ?></li>
    <li>Rate : <?= $op['rate']; ?></li>
    <li>Infection : <?= $op['infection']; ?></li>
    <li><a href="">Change</a> | <a href="">Delete</a></li>
    <li><a href="index.php">Back to list</a></li>
  </ul>


</body>

</html>