<?php

// Function to connect to database
function connection()
{
  return mysqli_connect('localhost', 'root', '', 'phpbasic');
}

// Function to query
function query($query)
{
  $db = connection();
  $result = mysqli_query($db, $query);

  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $ops = [];
  while ($op = mysqli_fetch_assoc($result)) {
    $ops[] = $op;
  }

  return $ops;
}

// Function to add user input data to database
function add($data)
{
  $db = connection();

  $image = htmlspecialchars($data['image']);
  $codename = htmlspecialchars($data['codename']);
  $gender = htmlspecialchars($data['gender']);
  $class = htmlspecialchars($data['class']);
  $combat_experience = htmlspecialchars($data['combat_experience']);
  $birthplace = htmlspecialchars($data['birthplace']);
  $birthdate = htmlspecialchars($data['birthdate']);
  $race = htmlspecialchars($data['race']);
  $height = htmlspecialchars($data['height']);
  $infection = htmlspecialchars($data['infection']);

  $query = "INSERT INTO operators VALUES 
              (null, '$image', '$codename', '$gender', '$class', '$combat_experience', '$birthplace', '$birthdate', '$race', '$height', '$infection')";

  mysqli_query($db, $query) or die(mysqli_error($db));

  return mysqli_affected_rows($db);
}

// Function to delete user data
function delete($id)
{
  $db = connection();

  mysqli_query($db, "DELETE FROM operators WHERE id = $id") or die(mysqli_error($db));

  return mysqli_affected_rows($db);
}

function change($data)
{
  $db = connection();

  $id = htmlspecialchars($data['id']);
  $image = htmlspecialchars($data['image']);
  $codename = htmlspecialchars($data['codename']);
  $gender = htmlspecialchars($data['gender']);
  $class = htmlspecialchars($data['class']);
  $combat_experience = htmlspecialchars($data['combat_experience']);
  $birthplace = htmlspecialchars($data['birthplace']);
  $birthdate = htmlspecialchars($data['birthdate']);
  $race = htmlspecialchars($data['race']);
  $height = htmlspecialchars($data['height']);
  $infection = htmlspecialchars($data['infection']);

  $query = "UPDATE operators SET
              image = '$image',
              codename = '$codename',
              gender = '$gender',
              class = '$class',
              combat_experience = '$combat_experience',
              birthplace = '$birthplace',
              birthdate = '$birthdate',
              race = '$race',
              height = '$height',
              infection = '$infection'
            WHERE id = $id;
            ";

  mysqli_query($db, $query) or die(mysqli_error($db));

  return mysqli_affected_rows($db);
}

function search($keyword)
{
  $db = connection();

  $query = "SELECT * FROM operators WHERE
              codename LIKE '%$keyword%' OR
              class LIKE '$keyword%'
            ";

  $result = mysqli_query($db, $query);

  $ops = [];
  while ($op = mysqli_fetch_assoc($result)) {
    $ops[] = $op;
  }

  return $ops;
}

// Login functions
function login($data)
{

  $db = connection();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if ($user = query("SELECT * FROM users WHERE codename = '$username'")) {
    if (password_verify($password, $user['password'])) {
      // Setting up Session
      $_SESSION['login'] = true;

      header('Location: index.php');
      exit;
    }
  }
  return [
    'error' => true,
    'message' => 'Wrong username/password'
  ];
}

// Registration Function
function registration($data)
{
  $db = connection();

  $codename = htmlspecialchars(strtolower($data['codename']));
  $password_1 = mysqli_real_escape_string($db, $data['password_1']);
  $password_2 = mysqli_real_escape_string($db, $data['password_2']);

  // Check if the form empty or not
  if (empty($codename) || empty($password_1) || empty($password_2)) {
    echo "<script>
              alert('Codename/password required');
              document.location.href = 'registration.php';
          </script>";
    return false;
  }

  // Check whether codename unique
  if (query("SELECT * FROM users WHERE codename = '$codename'")) {
    echo "<script>
            alert('Codename already registered');
            document.location.href = 'registration.php';
          </script>";
    return false;
  }

  // Check whether password_1 === password_2
  if ($password_1 !== $password_2) {
    echo "<script>
            alert('Password does not match');
            document.location.href = 'registration.php';
          </script>";
    return false;
  }

  // Check minimum password
  if (strlen($password_1) < 8) {
    echo "<script>
            alert('Password too short, minimum 8 digit');
            document.location.href = 'registration.php';
          </script>";
    return false;
  }

  // Codename/password valid. Encrypt password
  $new_password = password_hash($password_1, PASSWORD_DEFAULT);

  $query = "INSERT INTO users VALUES
              (null, '$codename', '$new_password')";

  mysqli_query($db, $query) or die(mysqli_error($db));

  return mysqli_affected_rows($db);
}
