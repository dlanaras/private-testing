<?php
    include_once 'dbh.php';

    $prename = $_POST['prename'];
    $lastname = $_POST['lastname'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $plcName = $_POST['plcName'];

    if(isset($_POST['submit']))
    $idcount = "SELECT COUNT(id) as countid FROM apprentices";
    $results = $conn->query($idcount);
    $row = $results->fetch_assoc();
    $id = $row["countid"]+1;

    if ($prename != "" && $lastname != "" && $longitude != "" && $latitude != "" && $plcName != "") {
        $placSQL = "INSERT INTO places (id, name, latitude, longitude) VALUES ($id, '$plcName', '$latitude','$longitude');";
        $markSQL = "INSERT INTO markers (id) VALUE ($id);";
        $apprSQL = "INSERT INTO apprentices (prename, lastname, place_id, markers_id) VALUES ('$prename', '$lastname', $id, $id);";
        mysqli_query($conn, $placSQL);
        mysqli_query($conn, $markSQL);
        mysqli_query($conn, $apprSQL); 
    }

    header ("Location: ../index.php?submit=success")
    ?>

