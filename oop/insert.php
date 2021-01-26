<?php
require_once 'marker.class.php';
require_once 'database.php';

if (isset($_REQUEST['lat']) && isset($_REQUEST['lng'])) {
  $newMarker = new Marker($_REQUEST['lat'], $_REQUEST['lng']);
  $newMarker->create($connection);
}

header('Location: /');
