<?php 
    require 'functions.php';

    if(isset($_POST["submit"])){

        if(add($_POST) > 0){
        echo "
            <script>
            alert('Operator file has been added!');
            document.location.href = 'index.php';
            </script>
        ";
        } else {
        echo 
            "<script>
            alert('Failed to add operator file');
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
    <title>Add Operator's File</title>
    </head>
    <body>
    <h1>Add Operator's Files</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
        <!-- Image form -->
        <li>
            <label for="image">Image : </label>
            <input type="file" name="image" id="image">
        </li>
        
        <!-- Name form -->
        <li>
            <label for="name">Name : </label>
            <input type="text" name="name" id="name" autocomplete="off">
        </li>
        
        <!-- Codename form -->
        <li>
            <label for="codename">Codename : </label>
            <input type="text" name="codename" id="codename" autocomplete="off" required>
        </li>
        
        <!-- Gender form -->
        <li>
            <label for="gender">Gender : </label>
            <input type="text" name="gender" id="gender" autocomplete="off">
        </li>
        
        <!-- Birthplace form-->
        <li>
            <label for="birthplace">Birthplace : </label>
            <input type="text" name="birthplace" id="birthplace" autocomplete="off">
        </li>
        
        <!-- Race form -->
        <li>
            <label for="race">Race : </label>
            <input type="text" name="race" id="race" autocomplete="off">
        </li>
        
        <!-- Class form -->
        <li>
            <label for="class">Class : </label>
            <input type="text" name="class" id="class" autocomplete="off">
        </li>
        
        <!-- Rate form -->
        <li>
            <label for="rate">Rate : </label>
            <input type="text" name="rate" id="rate" autocomplete="off">
        </li>
        
        <!-- Infection status form -->
        <li>
            <label for="infection_status">Infection Examination : </label>
            <input type="text" name="infection_status" id="infection_status" autocomplete="off">
        </li>

        <!-- Submit button -->
        <button type="submit" name="submit">Add File</button>
        </ul>

    </form>

</body>
</html>