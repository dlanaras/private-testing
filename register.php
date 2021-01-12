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
        <input type="text" name="longitude" placeholder="Longitude">
        <br>
        <input type="text" name="latitude" placeholder="Latitude">
        <br>
        <input type="text" name="plcName" placeholder="Wohnort">
        <br>
        <button type="submit" name="submit">submit</button>
    </form>
</body>
</html>