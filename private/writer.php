<?php
    include_once 'dbh.php';

    $prename = $_POST['prename'];
    $lastname = $_POST['lastname'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $plcName = $_POST['plcName'];

    $apprSQL = "INSERT INTO apprentices (prename, lastname, place_id, markers_id) VALUES ('$prename', '$lastname', '1', '2');";
    $placSQL = "INSERT INTO places (latitude, longitude) VALUES ('$plcName', '$latitude','$longitude');";
    mysqli_query($conn, $apprSQL); 
    mysqli_query($conn, $placSQL);
    header ("Location: ../index.php?submit=success")
    ?>