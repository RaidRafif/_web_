<?php

function connection()
{
  return mysqli_connect('localhost', 'root', '', 'phpbasic');
}

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
