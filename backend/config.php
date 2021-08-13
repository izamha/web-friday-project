<?php
    $conn = mysqli_connect("localhost", "root", "root", "phpChat");
    if ($conn) {
        echo "" . mysqli_connect_error();
    } else {
        echo "Error connecting";
    }
?>