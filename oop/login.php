<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    .bg {
        background: url("https://images.cdn2.stockunlimited.net/preview1300/lock-icon_2002024.jpg") no-repeat center;
    }

    h1 {
        margine: 0 auto;
        font-size: 100px;
        color: Red;
        size: 100;
    }

    </style>
</head>
<body>
<div class="bg">
    <div>
    <h1>Enter your creditentials</h1>
    </div>
    <div id="map" class="map"></div>
    <form method="POST" action="insertToCrud.php">
    <div>
        <label for="username">Benutzername</label>
        <input id="username" name="usename" />
    </div>
    <div>
        <label for="password">Passwort</label>
        <input id="password" name="lat" />
    </div>
    <button type="submit">login</button>
    </form>
</div>
</body>
</html>