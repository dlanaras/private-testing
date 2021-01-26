<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    .bg {
        /* I know that this looks horibble */
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
    <form method="POST" action="gotoCRUD.php">
    <div>
        <label for="username">Benutzername</label>
        <input type="username" id="username" name="username" />
    </div>
    <div>
        <label for="password">Passwort</label>
        <input type="password" id="password" name="password" />
    </div>
    <button type="submit">login</button>
    </form>
</div>
</body>
</html>