<!DOCTYPE>
<html ng-app="mainApp">
<head>
    <title>SimplyDevio.us | Journal Skin and Profile Resources for DeviantART</title>
    <meta name="description" content="Customize your DeviantART profile with CSS. Make a DeviantART journal skin, profile directory, or gallery directory.">
    <meta name="keywords" content="deviantart, simplysilent, profile, directory, css, journal, skin">
    <meta name="author" content="SimplySilent">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/main.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="resources/css/greeting.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="libraries/minicolors/jquery.minicolors.css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="images/new128.png" sizes="128x128">

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

    <?php include 'includes/menu1.html' ?>
    <?php include 'resources/profile_greeting/php/uploadFont.php' ?>

    <!-- View -->
    <div ng-view></div>

    <?php include 'includes/new_footer.html'; ?>

    <!-- JS Libraries -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-sanitize.js"></script>


    <!-- JS Files -->
    <script src="mainApp.js"></script>
    <script src="mainController.js"></script>
    <script src="libraries/minicolors/jquery.minicolors.js"></script>
    <script src="libraries/minicolors/angular-minicolors.js"></script>

    <!-- <script src="js/app.js"></script> -->
    <script src="js/customOnChange.js"></script>

    <script src="resources/profile_greeting/profileGreetingCtrl.js"></script>
    <script src="resources/profile_directory/profileDirectoryCtrl.js"></script>

</body>
</html>
