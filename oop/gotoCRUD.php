<?php

require_once 'login.class.php';
require_once 'database.php';

if ($connection->connect_errno) {
    die($connection->connect_error);
}

header("Location: CRUD.php");
?>