

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Fiberspark | Coverage Area</title>

  <meta name="description" content="Fiberspark: A better kind of Internet.">
  <meta name="keywords" content="Fiberspark, fiberoptic cables, Ithaca, NY">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/navbar.css" rel="stylesheet" /> 
  <link href="css/footer.css" rel="stylesheet" />
  <link href="css/main.css" rel="stylesheet" />

  <style type="text/css">
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }

  #map_canvas {
    height: 100%;
  }

  @media print {
    html, body {
      height: auto;
    }

    #map_canvas {
      height: 650px;
    }
  }

  #legend,#blurb { 
    z-index: 100; 
    position: absolute; 
    margin: 10px 0px 0px 80px; 
    background-color: #EEE; 
    border-radius:10px; 
    padding: 5px; 
  }
  </style>

  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_TAqdYZGR1rLwA3iYPMiqlNnhEUAqOzA&sensor=false"></script>
  <script type="text/javascript">
  function initialize() {
    var myOptions = {
      center: new google.maps.LatLng(42.440688,-76.485636),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      zoom: 11
    }

    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    var ctaLayer = new google.maps.KmlLayer('https://www.google.com/maps/ms?ie=UTF8&t=m&source=embed&dg=feature&authuser=0&msa=0&output=kml&msid=207017794187842887064.0004f59e8cb4d94168eef');
    ctaLayer.setMap(map);

    var legend = document.getElementById('legend');
    var blurb = document.getElementById('blurb');
    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(legend);
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(blurb);

  }
  </script>
</head>

<body onload="initialize()" style="padding-top:90px;">
  	
  	<?php require ("inc/navbar.html");?>

   	<!-- Map goes here here -->	
	  <div id="map_canvas"></div>
    <div id="legend"><img src="img/icon.png" style="float:left"/><p style="font-size:16px;margin:0;float:right;width:70%">Click icons for property details</p></div>  
    <div id="blurb"><p style="font-size:24px;font-weight:200%;margin:0;">Marked properties are participating in our network buildout!</p></div>  


    <!-- js -->
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</body>
</html>
