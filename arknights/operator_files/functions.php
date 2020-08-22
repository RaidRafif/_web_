<?php

// Connection database function
function connection()
{
  return mysqli_connect('localhost', 'root', '', 'phpbasic');
}

// Query function
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

// Add user input to database function
function add($data)
{
  $db = connection();

  $image = upload();
  if (!$image) {
    return false;
  }

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

// Upload function
function upload()
{
  $name_file = $_FILES['image']['name'];
  $type_file = $_FILES['image']['type'];
  $size_file = $_FILES['image']['size'];
  $error_file = $_FILES['image']['error'];
  $tmp_file = $_FILES['image']['tmp_name'];

  // Check whether there is image
  if ($error_file == 4) {
    return 'default.jpg';
  }

  // Check extensions file
  $ext_list = ["jpeg", "jpg", "png"];
  $ext_file = strtolower(pathinfo($name_file, PATHINFO_EXTENSION));
  if (!in_array($ext_file, $ext_list)) {
    echo "<script>
            alert('jpg/jpeg/png extensions only allowed');
          </script>";
    return false;
  }

  // Check type files
  if ($type_file != 'image/jpeg' && $type_file != 'image/png') {
    echo "<script>
            alert('Please only upload images file');
          </script>";
    return false;
  }

  // Check size file
  if ($size_file > 10000000) {
    echo "<script>
            alert('File\'s size too big. Maximum 10MB');
          </script>";
    return false;
  }

  // File validated. Generating new file name and move from temporary
  $new_image = uniqid();
  $new_image .= '.';
  $new_image .= $ext_file;
  move_uploaded_file($tmp_file, 'img/' . $new_image);

  return $new_image;
}


// Delete user data function
function delete($id)
{
  $db = connection();

  // Deleting data from folder img
  $op = query("SELECT * FROM operators WHERE id = $id");
  if ($op['image'] != 'default.jpg') {
    unlink('img/' . $op['image']);
  }

  mysqli_query($db, "DELETE FROM operators WHERE id = $id") or die(mysqli_error($db));

  return mysqli_affected_rows($db);
}

// Change data function
function change($data)
{
  $db = connection();

  $id = htmlspecialchars($data['id']);
  $old_image = htmlspecialchars($data['old_image']);
  $codename = htmlspecialchars($data['codename']);
  $gender = htmlspecialchars($data['gender']);
  $class = htmlspecialchars($data['class']);
  $combat_experience = htmlspecialchars($data['combat_experience']);
  $birthplace = htmlspecialchars($data['birthplace']);
  $birthdate = htmlspecialchars($data['birthdate']);
  $race = htmlspecialchars($data['race']);
  $height = htmlspecialchars($data['height']);
  $infection = htmlspecialchars($data['infection']);

  $image = upload();
  if (!$image) {
    return false;
  }

  if ($image == 'default.jpg') {
    $image = $old_image;
  }

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

// Search data function
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
