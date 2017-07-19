<?php header( 'Location: /#!/tutorials/get-link-to-profile-widget' ) ; ?>

<!DOCTYPE html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Tutorial on how to link profile widgets on DeviantART">
    <meta name="keywords" content="deviantart, simplysilent, profile, directory, css, journal">
    <meta name="author" content="SimplySilent">
    <link rel="stylesheet" type="text/css" href="../css/main.css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700' rel='stylesheet' type='text/css'>

    <script src="../js/jquery.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    <title>Linking Widgets Tutorial</title>
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
<?php include '../menu1.html' ?>

    <!-- Start White Section -->
	<div class="section" id="resource">

            <td id="left">

                <div class="title">Linking Widgets Tutorial</div>

                <div class="description">

                    <p>Step-by-step tutorial for creating links to widgets on DeviantART.
                    Works best with a <a href="profile_directory.php">Profile Directory</a>.
                    </p>

                </div>

                <br><br>
                <div class="tutorial">
                    <p>Go to your <a href="http://me.deviantart.com">profile page</a> and right click anywhere on the page.
                        Click the option most similar to <i>Inspect Element</i>.</p>

                    <img src="images/11.png">

                    <p>You will get a pop-up at the bottom of the page containg a lot of HTML gibberish.
                        Ignore everything except for the little magnifying glass (Chrome) or an arrow (Firefox) in the top left corner of the pop-up screen.
                    </p>
                    <img src="images/12.png">
                    <img src="images/16.png">

                    <p>Click the magnifiying glass/arrow and then click the <i>icon</i> of the widget you want to link to.</p>
                    <img src="images/13.png">

                    <p>The HTML gibberish will jump to a specific part in the code that creates the icon.
                    A couple of lines above the highlighted code, there will be a <span>&lt;div id=""&gt;</span> with a unique nine digit code that refers to your widget.</p>
                    <img src="images/14.png">

                    <p>Copy that nine digit code and create links using the following format:
                        <code>&lt;a href="http://<b>username</b>.deviantart.com/#<b>000000000</b>"></code>
                    </p>

                    <br><br>
                    Still confused? Feel free to contact <a href="http://simplysilent.deviantart.com">SimplySilent</a> for additional help.
                </div>

    </div>

</div>

<?php include '../includes/footer.html'; ?>

</body>
</html>
