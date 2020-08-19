<?php 
    require 'functions.php';

    // Get data from URL
    $id = $_GET["id"];

    // Query operator's data based on ID
    $op = query("SELECT * FROM operator WHERE id = $id")[0];

    // Check wether submit button has been pressed
    if(isset($_POST["submit"])){
        // Check wether data successfuly changed
        if(change($_POST) > 0){
        echo "
            <script>
            alert('Operator file successfully changed!');
            document.location.href = 'index.php';
            </script>
        ";
        } else {
        echo 
            "<script>
            alert('Failed to change operator file');
            document.location.href = 'index.php';
            </script>
        ";
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Operator's File</title>
    </head>
    <body>
    <h1>Edit Operator's Files</h1>

    <form action="" method="post">

        <input type="hidden" name="id" value="<?= $op["id"] ?>">
        <ul>
        <!-- Image form -->
        <li>
            <label for="image">Image : </label>
            <input type="text" name="image" id="image" value="<?= $op["image"] ?>">
        </li>
        
        <!-- Name form -->
        <li>
            <label for="name">Name : </label>
            <input type="text" name="name" id="name" value="<?= $op["name"] ?>">
        </li>
        
        <!-- Codename form -->
        <li>
            <label for="codename">Codename : </label>
            <input type="text" name="codename" id="codename" value="<?= $op["codename"] ?>" required>
        </li>
        
        <!-- Gender form -->
        <li>
            <label for="gender">Gender : </label>
            <input type="text" name="gender" id="gender" value="<?= $op["gender"] ?>">
        </li>
        
        <!-- Birthplace form-->
        <li>
            <label for="birthplace">Birthplace : </label>
            <input type="text" name="birthplace" id="birthplace" value="<?= $op["birthplace"] ?>">
        </li>
        
        <!-- Race form -->
        <li>
            <label for="race">Race : </label>
            <input type="text" name="race" id="race" value="<?= $op["race"] ?>">
        </li>
        
        <!-- Class form -->
        <li>
            <label for="class">Class : </label>
            <input type="text" name="class" id="class" value="<?= $op["class"] ?>">
        </li>
        
        <!-- Rate form -->
        <li>
            <label for="rate">Rate : </label>
            <input type="text" name="rate" id="rate" value="<?= $op["rate"] ?>">
        </li>
        
        <!-- Infection status form -->
        <li>
            <label for="infection_status">Infection Examination : </label>
            <input type="text" name="infection_status" id="infection_status" value="<?= $op["infection_status"] ?>">
        </li>

        <!-- Submit button -->
        <button type="submit" name="submit">Change File</button>
        </ul>

    </form>

</body>
</html>