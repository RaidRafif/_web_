<?php

require 'functions.php';

if (isset($_POST['registration'])) {
  if (registration($_POST) > 0) {
    echo "<script>
            alert('Operator codename successfully registered');
            document.location.href = 'login.php';
          </script>";
  } else {
    echo "<script>
            alert('Failed to add operator access account');
          </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
</head>

<body>

  <h1>Rhodes Island Registration Center</h1>

  <form action="" method="POST">

    <ul>
      <li>
        <label>
          Codename :
          <input type="text" name="codename" autocomplete="off" autofocus required>
        </label>
      </li>

      <li>
        <label>
          Password :
          <input type="password" name="password_1" autocomplete="off" required>
        </label>
      </li>

      <li>
        <label>
          Confirm Password :
          <input type="password" name="password_2" autocomplete="off" required>
        </label>
      </li>

      <button type="submit" name="registration"> Register </button>

    </ul>




  </form>

</body>

</html>