<?php
session_start();
if (isset($_SESSION['login'])) {
  header('Location: index.php');
}

require 'functions.php';

// Check if Login button has been pressed
if (isset($_POST['login'])) {
  $login = login($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rhodes Island Login Systems</title>
</head>

<body>

  <h1>Rhodes Island Login Systems</h1>

  <!-- Show error message if wrong usename/password -->
  <?php if (isset($login['error'])) : ?>
    <p style="color: red; font-style: italic; font-size: 18px;"><?= $login['message']; ?></p>
  <?php endif; ?>

  <form action="" method="POST">

    <ul>
      <li>
        <label>
          Codename :
          <input type="text" name="username" autocomplete="off" autofocus required>
        </label>
      </li>

      <li>
        <label>
          Password :
          <input type="password" name="password" autocomplete="off" autofocus required>
        </label>
      </li>

      <br>
      <button type="submit" name="login"> Login </button>
      <button><a href="registration.php"> Sign up </a></button>
    </ul>

  </form>


</body>

</html>