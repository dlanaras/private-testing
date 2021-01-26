<?php
require_once 'marker.class.php';
require_once 'database.php';

if (isset($_REQUEST['name']) && isset($_REQUEST['lat']) && isset($_REQUEST['lng'])) {
  $newMarker = new Marker($_REQUEST['name'], $_REQUEST['lat'], $_REQUEST['lng']);
  $newMarker->create($connection);
}

header('Location: http://localhost/new/private-testing/oop/index.php');
