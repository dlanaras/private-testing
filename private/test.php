<?php
/*
    include_once 'dbh.php';
    
    if(isset($_POST['submit'])) {
    $prename = $_POST['prename'];
    $lastname = $_POST['lastname'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $plcName = $_POST['plcName'];
    


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

    header ("Location: ../index.php?submit=success");
    }*/

    function echoString($input) {

        if (!$input or $input == "") {
            throw new Exception('Es wurde kein Element übergeben!');
        } else {
            echo $input . PHP_EOL;
        }
    }

    echo "Exception Handling" . PHP_EOL;

    try {
        echoString("Das wird noch ausgegeben");
        echoString("");
    } catch (Exception $ex) {
        echo "FAIL! ", $ex->getMessage() . PHP_EOL;
    }

    echo "Das wird wieder ausgegeben" . PHP_EOL;
    ?>

