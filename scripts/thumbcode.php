<!DOCTYPE HTML>
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" type="text/css" href="http://simplydevio.us/main.css" media="screen" />
    <script src="../jquery.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://www.simplydevio.us/jscolor/jscolor.js"></script>
   
    
    <title>Thumbcode</title>
    <link rel="icon" href="http://www.simplydevio.us/new128.png" sizes="128x128">

    <!-- PAGE SPECIFIC CSS -->
    <style>
	.date{
		width:2px;
		background:#e03e56;
		display:inline-block;
		position:relative;

	}

	.info{
		display:none;
		position:absolute;
		bottom:-40px;
		font-size:13px;
		width:100px;
		text-align:center;
	}
	.date:hover{background:#888;}
	.date:hover .info{display:block;}
	</style>
    
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

	<div class="section w"><div class="tri tb"></div>

	    <div class="content" id="resource">

	    	<div id="left">
	        
		        <div class="title">Thumbcode</div>
		        <div class="map"><a href="http://www.simplydevio.us/scripts/index.php">Scripts</a> > Thumbcode</div>
		        
		        <div class="description">
		            <p>For Rising-Artists thumb features.</p>
		        </div>

				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<input type="text" name="thumb" style="width:500px;">
				<br>
				<input type="submit" value="Submit" name="submit" >
				<br>

				<?php

					if(isset($_POST['submit'])) 
					{ 
					    $thumbs = $_POST['thumb'];
					    $output = exec("python thumbcode.py $thumbs");
					    echo $output;
					}

				?>

				</form>
				<br><br><br>

			</div>
		</div>

</body>
</html>