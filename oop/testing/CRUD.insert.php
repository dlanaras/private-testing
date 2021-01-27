
<?php
$entity = array();
require_once('database.php');
require_once('entity.class.php');
$dbms = new Database("happyplace", "root", "", "happyplace");
$entity = new Entity($dbms->getConnection(), "places");

print_r($entity->columns);

$new = new stdClass();
$new->name = "Unbekannte Ortschaft";
$entity->save($new);

$update = $entity->load(9556);
$update->name = "Affeltrangen OOOOO";
$entity->save($update);

?>