<?php

$entity = array();
require_once('database.php');
require_once('entity.class.php');
$dbms = new Database("localhost", "root", "", "happyplace");
$entity = new Entity($dbms->getConnection(), "places");

print_r($entity->columns);


/*$name = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

$new = new stdClass();
$new->name = $_POST['id'];
$entity->save($new);

$update = $entity->load($_POST['id']);
$update->name = $_POST['prename'];
$entity->save($update);
*/

header("location: ./CRUD.php");
?>