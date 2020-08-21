<?php

session_start();
if (!isset($_SESSION['login'])) { // Check if SESSION still running
  header('Location: login.php');
  exit;
}

require 'functions.php';

// Check wether submit button has been pressed
if (isset($_POST['submit'])) {
  if (add($_POST) > 0) {
    echo "<script>
              alert('File succesfully added');
              document.location.href = 'index.php';
            </script>";
  } else {
    echo "<script>
              alert('Failed to add file');
            </script>";
  }
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

  <h1>Add Operator File</h1>

  <form action="" method="POST">

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
          <input type="text" name="codename" autocomplete="off" autofocus required>
        </label>
      </li>

      <li>
        <label>
          Gender :
          <input type="text" name="gender" autocomplete="off" required>
        </label>
      </li>

      <li>
        <label>
          Class :
          <input type="text" name="class" autocomplete="off" required>
        </label>
      </li>

      <li>
        <label>
          Combat Experience :
          <input type="text" name="combat_experience" autocomplete="off">
        </label>
      </li>

      <li>
        <label>
          Birthplace :
          <input type="text" name="birthplace" autocomplete="off">
        </label>
      </li>

      <li>
        <label>
          Birthdate :
          <input type="text" name="birthdate" autocomplete="off">
        </label>
      </li>

      <li>
        <label>
          Race :
          <input type="text" name="race" autocomplete="off">
        </label>
      </li>

      <li>
        <label>
          Height :
          <input type="text" name="height" autocomplete="off">
        </label>
      </li>

      <li>
        <label>
          Infection Status :
          <input type="text" name="infection" autocomplete="off" required>
        </label>
      </li>

      <button type="submit" name="submit">Add File</button>
      <br><br>
      <a href="index.php">Back to list</a>


    </ul>

  </form>




</body>

</html>