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
<div id="button"> 
    <button type="button" onclick="alert('Gespeicherte Personen können nur vom Admin entfernt werden. Falls Sie Ihre Eingaben falsch eingegeben haben, und Sie diese abändern wollen, können Sie mir an die E-mail: dimitrislanaras04@outlook.com kontaktieren.')"><a href="register.php" target="_blank">Click Me!</a></button>
</div>
<?php 
    $sql = "SELECT * FROM apprentices;";
    $results = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($results);

    if ($check > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            echo $row['prename'] . "<br>" . $row['lastname'] . "<br>" ;
        }
    }
 //note for github link https://github.com/dlanaras/private-testing.git
?>
</body>
</html>
