<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script type="text/javascript" src="/js/location.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1g9Lz5V3kkO1zFc_Kxsw4bvwo1_q2Ueo&callback=initMap">
    </script>
  </body>
</html>