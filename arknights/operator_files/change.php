<?php

require 'functions.php';
$id = $_GET['id'];

$op = query("SELECT * FROM operators WHERE id = $id");

// Check wether submit button has been pressed
if (isset($_POST['change'])) {
  if (change($_POST) > 0) {
    echo "<script>
              alert('File succesfully changed');
              document.location.href = 'index.php';
            </script>";
  } else {
    echo "<script>
              alert('Failed to change file');
            </script>";
  }
}

// Check ID in URL
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <h1>Change Operator File</h1>

  <form action="" method="POST">

    <input type="hidden" name="id" value="<?= $op['id']; ?>">

    <ul>
      <li>
        <label>
          Image :
          <input type="text" name="image">
        </label>
      </li>

      <li>
        <label>
          Codename :
          <input type="text" name="codename" autocomplete="off" autofocus required value="<?= $op['codename']; ?>">
        </label>
      </li>

      <li>
        <label>
          Gender :
          <input type="text" name="gender" autocomplete="off" required value="<?= $op['gender']; ?>">
        </label>
      </li>

      <li>
        <label>
          Class :
          <input type="text" name="class" autocomplete="off" required value="<?= $op['class']; ?>">
        </label>
      </li>

      <li>
        <label>
          Combat Experience :
          <input type="text" name="combat_experience" autocomplete="off" value="<?= $op['combat_experience']; ?>">
        </label>
      </li>

      <li>
        <label>
          Birthplace :
          <input type="text" name="birthplace" autocomplete="off" value="<?= $op['birthplace']; ?>">
        </label>
      </li>

      <li>
        <label>
          Birthdate :
          <input type="text" name="birthdate" autocomplete="off" value="<?= $op['birthdate']; ?>">
        </label>
      </li>

      <li>
        <label>
          Race :
          <input type="text" name="race" autocomplete="off" value="<?= $op['race']; ?>">
        </label>
      </li>

      <li>
        <label>
          Height :
          <input type="text" name="height" autocomplete="off" value="<?= $op['height']; ?>">
        </label>
      </li>

      <li>
        <label>
          Infection Status :
          <input type="text" name="infection" autocomplete="off" required value="<?= $op['infection']; ?>">
        </label>
      </li>

      <button type="submit" name="change">Add File</button>
      <br><br>
      <a href="index.php">Back to list</a>


    </ul>

  </form>




</body>

</html>