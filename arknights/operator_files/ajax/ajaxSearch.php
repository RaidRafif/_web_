<?php

require '../functions.php';
$operator = search($_GET['keyword']);

?>

<table border="1" cellpadding="10" cellspacing="0">

  <tr>
    <th>No</th>
    <th>Action</th>
    <th>Image</th>
    <th>Codename</th>
    <th>Class</th>
  </tr>

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