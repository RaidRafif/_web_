<?php

require 'functions.php';
$operator = query("SELECT * FROM operators");

// Check search button
if (isset($_POST['search'])) {
  $operator = search($_POST['keyword']);
}

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

  <a href="add.php">Add Operator File</a>
  <br><br>

  <table border="1" cellpadding="10" cellspacing="0">

    <tr>
      <th>No</th>
      <th>Action</th>
      <th>Image</th>
      <th>Codename</th>
      <th>Class</th>
    </tr>

    <form action="" method="POST">
      <input type="text" name="keyword" size='36' placeholder="Enter operator codename" autocomplete="off" autofocus>
      <button type='submit' name='search'> Search </button>
    </form>

    <?php if (empty($operator)) : ?>
      <tr>
        <td colspan="5">
          <p style="font-style: italic; text-align: center;">Operator file not found</p>
        </td>
      </tr>
    <?php endif; ?>

    <?php $id = 1; ?>
    <?php foreach ($operator as $temp) : ?>
      <tr>
        <td><?= $id; ?></td>
        <td><a href="detail.php?id=<?= $temp['id']; ?>">Detail</a></td>
        <td><img src="img/<?= $temp['image']; ?>" width="128"></td>
        <td><?= $temp['codename']; ?></td>
        <td><?= $temp['class']; ?></td>
      </tr>
      <?php $id++; ?>
    <?php endforeach; ?>

  </table>

</body>

</html>