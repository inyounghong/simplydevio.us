<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Gallery Directory creator for DeviantART">
    <meta name="keywords" content="deviantart, simplysilent, profile, gallery, directory, css, journal">
    <meta name="author" content="SimplySilent">
    <link rel="stylesheet" type="text/css" href="../../css/main.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/greeting.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../../libraries/minicolors/jquery.minicolors.css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Profile Greeting Creator</title>
    <link rel="icon" href="../images/new128.png" sizes="128x128">

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-45010841-2', 'simplydevio.us');
      ga('send', 'pageview');
    </script>
</head>
<body>

	<?php include '../../includes/menu1.html' ?>
    <?php include 'php/uploadFont.php' ?>

    <!-- Main view -->
    <div ng-view></div>

    <!-- Footer -->
    <?php include '../../includes/new_footer.html'; ?>

    <!-- JS Libraries-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.min.js"></script>

    <!-- JS Files -->
    <script src="../../libraries/minicolors/jquery.minicolors.js"></script>
    <script src="../../libraries/minicolors/angular-minicolors.js"></script>
    <script src="js/app.js"></script>
    <script src="js/customOnChange.js"></script>
    <script src="js/profileGreetingCtrl.js"></script>

</body>
</html>
