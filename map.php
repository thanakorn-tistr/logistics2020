﻿<?php
$lat = $_REQUEST['lat'];
$long = $_REQUEST["long"];

echo<<<HTML

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title>Simple markers</title>
        <style>
            html, body, #map-canvas {
            height: 100%;
            margin: 0px;
            padding: 0px
            }
        </style>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <script>
            function initialize() {

HTML;

echo    "var myLatlng = new google.maps.LatLng($lat,$long);";

echo<<<HTML
              
              var mapOptions = {
                zoom: 17,
                center: myLatlng
              }
              var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            
              var marker = new google.maps.Marker({
                  position: myLatlng,
                  map: map,
                  title: 'Share Olanlab Com'
              });
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
    </head>
    <body>
        <div id="map-canvas"></div>
    </body>
</html>
HTML;
?>