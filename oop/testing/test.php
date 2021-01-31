<?php
require_once "database.php";
require_once "entity.class.php";

$dbms = new Database("localhost", "root", "", "happyplace");
$entity = new Entity($dbms->getConnection(), "places");


$update = $entity->load(2);
$update->name = "This isnt empty";
$entity->save($update);

//print_r($load->columns);

    

//var_dump($entity);


/*
$users = new Entity($link, "places");


$newRecord = new stdClass();
$newRecord->username = "THIS WORKED";
$users->save($newRecord);
*/
?>