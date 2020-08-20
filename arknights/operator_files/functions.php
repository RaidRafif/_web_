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

  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
}
