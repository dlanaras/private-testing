<?php
    include_once 'dbh.php';

    $prename = $_POST['prename'];
    $lastname = $_POST['lastname'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];

    $apprSQL = "INSERT INTO apprentices (prename, lastname, place_id, markers_id) VALUES ('$prename', '$lastname', '3', '3');";
    //$placSQL = "INSERT INTO places (name, latitude, longitude) VALUES ('4', 'Staefa','4','4');";
    mysqli_query($conn, $apprSQL); 
    
    header ("Location: ../index.php?submit=success")
    ?>