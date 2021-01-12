
<?php
    include_once './private/dbh.php';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lernende registrieren</title>
</head>
<body>
    <form action="private/writer.php" method="POST">
        <input type="text" name="prename" placeholder="Vorname">
        <br>
        <input type="text" name="lastname" placeholder="Nachname">
        <br>
        <button>
    </form>
    <?php
            $apprSQL = "apprentices INSERT INTO apprentices (id, prename, lastname, place_id, markers_id) VALUES (4, 'Andrew', 'Longitude', '3', '1');";
            $placSQL = "INSERT INTO places (name, latitude, longitude) VALUES ('4', 'Staefa','4','4');";
            mysqli_query($conn, $apprSQL);
            mysqli_query($conn, $placSQL);
            
    ?>
</body>
</html>