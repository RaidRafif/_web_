<?php

function connection()
{ // Koneksi ke database
  return mysqli_connect('localhost', 'root', '', 'phpbasic');
}

function query($query)
{ // Perintah untuk query
  $db = connection();
  $result = mysqli_query($db, $query);

  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $ops = [];
  while ($op = mysqli_fetch_assoc($result)) { // Menampung data ke dalam array
    $ops[] = $op;
  }
  return $ops;
}
