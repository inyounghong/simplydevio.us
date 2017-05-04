
<html>
<head>
	<title>Hello</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
	<script>
		$(document).ready(function(){
			$("#submit").click(function(){
				$name = $("#name").val();

				try{
					$code = $("#code").val();
					$.ajax({
					  url: "https://www.deviantart.com/oauth2/token?grant_type=authorization_code&client_id=4082&client_secret=049014ae5d6c334d27ffd89a96f8e4fc&redirect_uri=http://www.simplydevio.us/api/test.php&code=" + $code,
					  method: "GET",
					  dataType: 'json'
					})
					.done(function(msg) {
						console.log("yo");
						alert("done");
					  $("#log").html(msg);
					});
				}
				catch (err){
					console.log("ysdfo");
					alert(window.location.href );
				}
				 
				
				
			});
		});
	</script>
</head>
<body>

	<?php
	$code = "";
		if (isset($_GET['code'])){
			$code = $_GET['code'];
		}
	?>
	<a href="https://www.deviantart.com/oauth2/authorize?response_type=code&client_id=4082&redirect_uri=http://www.simplydevio.us/api/test.php&scope=browse&state=mysessionid">Go</a>
	<input type="text" id="name">
	<input type="text" id="code" value="<?php echo $code ?>">
	<div class="button" id="submit">Submit</div>

	<div id="log">None</div>
</body>
</html>