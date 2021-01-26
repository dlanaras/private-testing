<?php
require_once 'marker.class.php';
require_once 'database.php';

$markers = Marker::fetchAll($connection);
