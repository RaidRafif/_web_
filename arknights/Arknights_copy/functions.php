<?php 
    // Koneksi ke database
    // mysqli_connect("hostname", "username", "password", "database_names");
    $db = mysqli_connect("localhost", "root", "", "phpbasic");


    function query($query){
        global $db;
        $result = mysqli_query($db, $query);
        $ops = [];

        while($op = mysqli_fetch_assoc($result)){
            $ops[] = $op;
        }
        return $ops;
    }

    // Function to add a data
    function add($data){
        global $db;

        // Upload image function
        $img = upload();
        if( !$img ){
            return false;
        }

        // Others text data
        $name = htmlspecialchars($data["name"]);
        $codename = htmlspecialchars($data["codename"]);
        $gender = htmlspecialchars($data["gender"]);
        $birthplace = htmlspecialchars($data["birthplace"]);
        $race = htmlspecialchars($data["race"]);
        $class = htmlspecialchars($data["class"]);
        $rate = htmlspecialchars($data["rate"]);
        $infection_status = htmlspecialchars($data["infection_status"]);

        // Query insert data
        $query = "INSERT INTO operator
                    VALUES(
                    '', '$img', '$name', '$codename', '$gender', '$birthplace', 
                    '$race', '$class', '$rate', '$infection_status')";
        mysqli_query($db, $query);

        // return result message
        return mysqli_affected_rows($db);
    }

    function upload(){
        // Set some variables
        $name_file = $_FILES['image']['name'];
        $size_file = $_FILES['image']['size'];
        $error_file = $_FILES['image']['error'];
        $temp_file = $_FILES['image']['tmp_name'];

        // Check if there's some uploaded image
        if( $error_file === 4){
            echo "
                <script>
                alert('Please choose an image!');
                </script>
            ";
            return false;
        };
        
        // Check for extensions files
        $valid_extensions = ['jpg', 'jpeg', 'png'];
        $extensions = explode('.', $name_file);
        $extensions = strtolower(end($extensions));

        // Check wether file is the right extensions
        if(!in_array($extensions, $valid_extensions)){
            echo "
                <script>
                alert('Please only upload an image!');
                </script>
            ";
            return false;
        }

        // Check wether file is exceeded size
        if($size_file > 5000000){
            echo "
                <script>
                alert('Please only upload an image!');
                </script>
            ";
            return false;
        }

        // Valid files, uploading image
        move_uploaded_file($temp_file, "img/$name_file");
        return $name_file;
    }


    // Function to delete a data
    function delete($id){
        global $db;
        mysqli_query($db, "DELETE FROM operator WHERE id = $id");
        return mysqli_affected_rows($db);
    }

    // Function to change data
    function change($data){
        global $db;

        // Get data from every element in form
        $id = $data["id"];
        $img = htmlspecialchars($data["image"]);
        $name = htmlspecialchars($data["name"]);
        $codename = htmlspecialchars($data["codename"]);
        $gender = htmlspecialchars($data["gender"]);
        $birthplace = htmlspecialchars($data["birthplace"]);
        $race = htmlspecialchars($data["race"]);
        $class = htmlspecialchars($data["class"]);
        $rate = htmlspecialchars($data["rate"]);
        $infection_status = htmlspecialchars($data["infection_status"]);

        // Query insert data
        $query = "UPDATE operator SET
                    image = '$img',
                    name = '$name',
                    codename = '$codename',
                    gender = '$gender',
                    birthplace = '$birthplace',
                    race = '$race',
                    class = '$class',
                    rate = '$rate',
                    infection_status = '$infection_status'
                WHERE id = $id
                ";
        mysqli_query($db, $query);

        // return result message
        return mysqli_affected_rows($db);
    }

    // Function to search a data
    function search($keyword){
        $query = "SELECT * FROM operator WHERE
                    codename LIKE '$keyword%' OR
                    class LIKE '%$keyword%'
                ";
        return query($query);

    }
?>