<?php
    include_once './private/dbh.php';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>map</title>
</head>
<body>
<?php 
    $sql = "SELECT * FROM apprentices;";
    $results = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($results);

    if ($results > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            echo $row['prename' AND 'lastname'] . "<br>";
        }
    }
 //note for github link https://github.com/dlanaras/private-testing.git
?>
</body>
</html>
