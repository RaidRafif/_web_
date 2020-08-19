<?php
// Koneksi dan memilih database
$db = mysqli_connect('localhost', 'root', '', 'phpbasic');


// Query ke tabel dalam database
$result = mysqli_query($db, "SELECT * FROM operators");


// Ubah data ke dalam array
$ops = [];
while ($op = mysqli_fetch_assoc($result)) {
  $ops[] = $op;
}

// Tampung ke variabel operator
$operators = $ops;

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
      <th>Class</th>
      <th>Rate</th>
      <th>Infection</th>
    </tr>

    <?= $id = 1; ?>
    <?php foreach ($operators as $temp) : ?>
      <tr>
        <!-- tr : Table row -->
        <td><?= $id++; ?></td> <!-- td : Table data -->
        <td>
          <a href="">Change</a> | <a href="">Delete</a>
        </td>
        <td><img src="img/<?= $temp['image'] ?>" width=128></td>
        <td><?= $temp['codename']; ?></td>
        <td><?= $temp['class']; ?></td>
        <td><?= $temp['rate']; ?></td>
        <td><?= $temp['infection']; ?></td>
      </tr>
    <?php endforeach; ?>

  </table>


</body>

</html>