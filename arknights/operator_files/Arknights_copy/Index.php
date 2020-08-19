<?php
    require 'functions.php';
    $operator = query("SELECT * FROM operator");

  // Check wether search button is pressed
    if( isset($_POST["search"]) ){
    $operator = search($_POST["keyword"]);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhodes Island Admin's Database</title>
</head>

<body>
    <h1>Daftar Operator</h1>

    <button><a href="add.php">Add Operator's File</a></button>
    <br><br>

    <form action="" method="post">

        <input type="text" name="keyword" size="50" placeholder="Insert keyword" autocomplete="off" autofocus>
        <button type="submit" name="search">Search File</button>

    </form>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No. </th>
            <th>Action</th>
            <th>Image</th>
            <th>Name</th>
            <th>Codename</th>
            <th>Gender</th>
            <th>Birthplace</th>
            <th>Race</th>
            <th>Class</th>
            <th>Rate</th>
            <th>Infection Status</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($operator as $temp) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="change.php?id=<?= $temp["id"] ?>">Change</a> |
                    <a href="delete.php?id=<?= $temp["id"] ?>" 
                    onclick="return confirm('Are you sure?');" >Delete</a>
                </td>
                <td><img src="<?= $temp["image"]; ?>" width="128"></td>
                <td><?= $temp["name"] ?></td>
                <td><?= $temp["codename"] ?></td>
                <td><?= $temp["gender"] ?></td>
                <td><?= $temp["birthplace"] ?></td>
                <td><?= $temp["race"] ?></td>
                <td><?= $temp["class"] ?></td>
                <td><?= $temp["rate"] ?></td>
                <td><?= $temp["infection_status"] ?></td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

    </table>

</body>

</html>