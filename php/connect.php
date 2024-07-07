
<?php
// Kêt nối với database
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'phim1080';

    $conn = new mysqLi($server,$user,$pass,$database );

    if ($conn) {
        echo"";
    }
    else 
    {
        echo"('Connection failed: ' . mysqli_connect_error())";
    }
?>