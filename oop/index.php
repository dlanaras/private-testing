<?php
require_once "data.php";

?>
<!doctype html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/css/ol.css" type="text/css">
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    .map {
      height: 100vh;
      width: 100%;
    }

    form {
      position: absolute;
      padding: 1rem;
      top: 0;
      right: 0;
    }

    input {
      display: block;
    }

    label {
      display: block;
      margin-top: .5rem;
      font-size: .75rem;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/build/ol.js"></script>
  <title>ol example</title>
</head>

<body>
  <div id="map" class="map"></div>
  <form method="POST" action="insert.php">
    <div>
      <label for="lat">Latitude</label>
      <input id="lat" name="lat" />
    </div>
    <div>
      <label for="lng">Longitude</label>
      <input id="lng" name="lng" />
    </div>
    <button type="submit">Add Marker</button>
  </form>
  <script type="text/javascript">
    var markerPoints = [<?php
                        foreach ($markers as $marker) {
                          print $marker->toJson();
                          print ",\n\n";
                        }
                        ?>];

    var markers = [];

    for (let marker of markerPoints) {
      markers.push(new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([marker.lng, marker.lat]))
      }));
    }

    var markers = new ol.layer.Vector({
      source: new ol.source.Vector({
        features: markers
      }),
      style: new ol.style.Style({
        image: new ol.style.Icon({
          anchor: [0.5, 46],
          anchorXUnits: 'fraction',
          anchorYUnits: 'pixels',
          src: './marker.png'
        })
      })
    })

    var map = new ol.Map({
      target: 'map',
      layers: [
        new ol.layer.Tile({
          source: new ol.source.OSM()
        }),
        markers
      ],
      view: new ol.View({
        center: ol.proj.fromLonLat([8.5208324, 47.360127]),
        zoom: 10
      })
    });
  </script>
</body>

</html>
