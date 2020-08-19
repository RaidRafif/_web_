<?php 
    require 'functions.php';
    
    $id = $_GET["id"];

    if( delete($id) > 0 ){
        echo "
            <script>
            alert('Operator\'s file has been deleted!');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Failed to delete operator\'s file');
            document.location.href = 'index.php';
            </script>
        ";
    }
?>