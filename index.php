<?php
    include_once './private/dbh.php';
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>map</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/css/ol.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/build/ol.js"></script>
</head>
<body>
<div id="button"> 
    <button type="button" onclick="alert('Gespeicherte Personen können nur vom Admin entfernt werden. Falls Sie Ihre Eingaben falsch eingegeben haben, und Sie diese abändern wollen, können Sie mir an die E-mail: dimitrislanaras04@outlook.com kontaktieren.')"><a href="register.php" >Register</a></button>
</div>
<div id="map" class="map">
    <script type="text/javascript">
      var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            /*
["http://a.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png","http://b.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png","http://c.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png"]
["http://a.tile3.opencyclemap.org/landscape/{z}/{x}/{y}.png","http://b.tile3.opencyclemap.org/landscape/{z}/{x}/{y}.png","http://c.tile3.opencyclemap.org/landscape/{z}/{x}/{y}.png"]
["http://a.tile.openstreetmap.org/{z}/{x}/{y}.png","http://b.tile.openstreetmap.org/{z}/{x}/{y}.png","http://c.tile.openstreetmap.org/{z}/{x}/{y}.png"]
["http://otile1.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png","http://otile2.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png","http://otile3.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png","http://otile4.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png"]
["http://a.tile.stamen.com/watercolor/{z}/{x}/{y}.png","http://b.tile.stamen.com/watercolor/{z}/{x}/{y}.png","http://c.tile.stamen.com/watercolor/{z}/{x}/{y}.png","http://d.tile.stamen.com/watercolor/{z}/{x}/{y}.png"]
["http://a.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png","http://b.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png","http://c.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png"]
*/
            source: new ol.source.XYZ({
                urls : ["http://a.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png","http://b.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png","http://c.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png"]
            })

            /*source: new ol.source.OSM()*/
          }),
          new ol.layer.Vector({
            source: new ol.source.Vector({
              format: new ol.format.GeoJSON(),
              url: './assets/data/countries.geojson' // GeoCountries file from github
            })
          })
        ],
        view: new ol.View({
          center: ol.proj.fromLonLat([8.5208324, 47.360127]),
          zoom: 10
        })
      });
    </script>
</div>
<?php 
    //$sql = "SELECT * FROM apprentices; JOIN places ON place_id = id; JOIN markers ON markers_id";

    $apprSQL = "SELECT * FROM apprentices;";
    $placSQL = "SELECT * FROM places;";
    $apprResults = mysqli_query($conn, $apprSQL);
    $placResults = mysqli_query($conn, $placSQL);
    /* $apprCheck = mysqli_num_rows($apprResults);
    $placCheck = mysqli_num_rows ($placResults);


    if ($apprCheck AND $placCheck > 0) {
        while ($apprRow = mysqli_fetch_assoc($apprResults) AND $placRow = mysqli_fetch_assoc($placResults)) {
            echo $apprRow['prename'] . "<br>" . $apprRow['lastname'] . "<br>" . $placRow['name'] . "<br>" . $placRow['latitude'] ."<br>" . $placRow['longitude'] . "<br>";
        }
    }*/
 //note for github link https://github.com/dlanaras/private-testing.git
?>
</body>
</html>
