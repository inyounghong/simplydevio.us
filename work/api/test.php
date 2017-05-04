<?php header('Access-Control-Allow-Origin: *'); ?>
<html>
<head>
	<title>Hello</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
	
	<!-- CSS -->
	<link href="css/c3.min.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	
	<!-- Load d3.js and c3.js -->
	<script src="//d3js.org/d3.v3.min.js" charset="utf-8"></script>
	<script src="js/c3.min.js"></script>
	<script src="js/analyzer.js"></script>

</head>
<body>
	<?php
		// Get code from redirect url
		$code = "";
		if (isset($_GET['code'])){
			$code = $_GET['code'];
		}
	?>

	<a href="http://simplydevio.us/api/test.php">Back</a><br>
	
	<!-- Hidden values sent to Javascript -->
	<input type="text" id="code" value="<?php echo $code ?>" hidden>
	<input type="text" id="token" value="" hidden>
	
	<div class="container">
		<div class="button_wrap">
			<input type="text" id="username" value="animelovers21" placeholder="DeviantART Username">
			<a href="https://www.deviantart.com/oauth2/authorize?response_type=code&client_id=4082&redirect_uri=http://www.simplydevio.us/api/test.php&scope=browse&state=mysessionid" class="button">Go</a>
		</div>
	</div>
	

	<div class="container g">
		<div class="narrow">
			<div class="num_wrap">
				<div id="watcher_count" class="num"></div>
				Watchers
			</div>
			<div class="num_wrap">
				<div id="friend_count" class="num"></div>
				Friends
			</div>
		</div>
	</div>

	<div class="container">
		<h1>Watchers</h1>
		<div id="chart" class="chart"></div>
		<div id="is_watching" class="chart"></div>
	</div>

	<div class="container g">
		<h1>Friends</h1>
		<div id="friend_types" class="chart"></div>
		<div id="friend_watch_backs" class="chart"></div>
	</div>


</body>
</html>