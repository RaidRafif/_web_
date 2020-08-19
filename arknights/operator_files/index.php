<?php

require 'functions.php';
$operators = query("SELECT * FROM operators");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Operator List</title>
</head>

<body>

  <h1>Operators List</h1>

  <table border="1" cellpadding="10" cellspacing="0">

    <tr>
      <!-- tr : Table row -->
      <th>No.</th> <!-- th : Table heading -->
      <th>Action</th>
      <th>Image</th>
      <th>Codename</th>
    </tr>

    <?= $id = 1; ?>
    <?php foreach ($operators as $temp) : ?>
      <tr>
        <!-- tr : Table row -->
        <td><?= $id++; ?></td> <!-- td : Table data -->
        <td>
          <a href="detail.php?id=<?= $temp['id']; ?>">Detail</a>
        </td>
        <td><img src="img/<?= $temp['image'] ?>" width=128></td>
        <td><?= $temp['codename']; ?></td>
      </tr>
    <?php endforeach; ?>

  </table>


</body>

</html>