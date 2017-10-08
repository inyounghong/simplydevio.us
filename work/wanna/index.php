<!DOCTYPE html>
<html>
<head>
    <title>Wanna | To-Do and Task List App</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Wanna is a beautiful and lightweight 'to-do' web app for keeping track of all those things you never quite got around to doing.">
    <link rel="stylesheet" type="text/css" href="css/jquery.gridster.css">
    <link rel="stylesheet" type="text/css" href="css/slider.css">
    <link rel="stylesheet" type="text/css" href="css/app2.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>

<body>

    <?php include 'includes/menu.html' ?>

    <main id="main">
        <div class="col left">
            <div class="slider_controls">
                <a href="#" id="next" class="control_next">></a>
                <a href="#" id="prev" class="control_prev"><</a>
            </div>

            <div id="slider">
              <ul>
                <li><img src="gifs/list1.gif"></li>
                <li><img src="gifs/list3.gif"></li>
                <li><img src="gifs/2lists.gif"></li>
              </ul>
            </div>
        </div>

        <div class="col right">
            <div class="info">
                <h1>wanna</h1>
                <h2>A "Want To Do" list for all those things you never quite got around to doing.</h2>
                <a href="app.php" class="launch">Give it a shot</a>
            </div>
        </div>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/slider.js"></script>
    </main>
</body>
</html>
