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

  if (query("SELECT * FROM users WHERE codename = '$username' && password = '$password'")) {
    // Setting up Session
    $_SESSION['login'] = true;

    header('Location: index.php');
    exit;
  } else {
    return [
      'error' => true,
      'message' => 'Wrong username/password'
    ];
  }
}
