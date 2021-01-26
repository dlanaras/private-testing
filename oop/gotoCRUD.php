<?php

require_once 'login.class.php';
require_once 'database.php';
require_once 'login.php';


$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

$login = new Login($username,$password);

$login->login($connection);

?>