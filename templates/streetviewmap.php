<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Street View side-by-side</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map, #pano {
        float: left;
        height: 50%;
        width: 50%;
      }
      #gmaps {
        text-align: center;
      }
    </style>
  </head>
  <body>
      <div id="map"></div>
      <div id="pano"></div>
    <script>
    function initialize() {
      var fenway = {
        lat: 14.5844, 
        lng: 121.0400
      };

      var map = new google.maps.Map(document.getElementById('map'), {
        center: fenway,
        zoom: 14
      });

      var panorama = new google.maps.StreetViewPanorama(
        document.getElementById('pano'), {
          position: fenway,
          pov: {
            heading: 34,
            pitch: 10
          }
      });
      map.setStreetView(panorama);
    }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFhg2MIHwn2ZrTcqOraD9UXYzQ4Wx2MeQ&signed_in=true&callback=initialize">
    </script>
  </body>
</html>
