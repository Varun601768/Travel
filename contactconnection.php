<?php
    $db = mysqli_connect("localhost","root","","projectmeteor");
    if(!$db)
        {
            die("Connection failed: " . mysqli_connect_error());
        }
?>