<?php

require 'functions.php';
$operator = query("SELECT * FROM operators");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Operator List</title>
</head>

<body>

  <h1>Operator List</h1>

  <table border="1" cellpadding="10" cellspacing="0">

    <tr>
      <th>No</th>
      <th>Action</th>
      <th>Image</th>
      <th>Codename</th>
      <th>Class</th>
    </tr>

    <?php $id = 0; ?>
    <?php foreach ($operator as $temp) : ?>
      <tr>
        <td><?= $id++; ?></td>
        <td><a href="detail.php?id=<?= $id; ?>">Detail</a></td>
        <td><img src="img/<?= $temp['image']; ?>" width="128"></td>
        <td><?= $temp['codename']; ?></td>
        <td><?= $temp['class']; ?></td>
      </tr>
    <?php endforeach; ?>


  </table>

</body>

</html>