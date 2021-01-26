<?php

class Marker
{
  public $id;
  public $lat;
  public $lng;
  public $name;

  public function __construct($name, $lat, $lng, $id = null)
  {
    $this->name = $name;
    $this->lat = $lat;
    $this->lng = $lng;
    $this->id = $id;
  }

  public function toJson()
  {
    return json_encode([
      "id" => $this->id,
      "name" => $this->name,
      "lat" => $this->lat,
      "lng" => $this->lng
    ]);
  }

  public function create($connection)
  {
    $name = $connection->real_escape_string($this->$name);
    $lat = $connection->real_escape_string($this->lat);
    $lng = $connection->real_escape_string($this->lng);
    $sql = "INSERT INTO `places` (name, lat, lng) VALUES ('$name', '$lat', '$lng');";

    $result = $connection->query($sql);

    if (!$result) {
      die($connection->error);
    }
  }

  public static function fetchAll($connection)
  {
    $sql = "SELECT * FROM `places`";
    $result = $connection->query($sql);

    if (!$result) {
      die($connection->error);
    }

    $markersFromDatabase = $result->fetch_all(MYSQLI_ASSOC);
    $markers = [];

    foreach ($markersFromDatabase as $marker) {
      $markers[] = new Marker($marker['name'], $marker['lat'], $marker['lng'], $marker['id']);
    }

    return $markers;
  }
}
