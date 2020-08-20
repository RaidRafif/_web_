<?php 

  require 'functions.php';
  
  $id = $_GET['id'];

  if (delete($id) > 0) {
    echo "<script>
            alert('File succesfully deleted');
            document.location.href = 'index.php';
          </script>";
  } else {
    echo "<script>
            alert('Failed to delete file');
          </script>";
  }
