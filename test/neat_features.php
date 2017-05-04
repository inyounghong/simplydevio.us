<html>

<head>

	<style>

	.warning{
		color:red;
	}

	.tex{
		font-family:'Courier New';
		font-size:11px;
	}

	</style>

</head>

<body>


	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

	Type in thumbcode numbers (the 000000000 in :thumb000000000:) each separated by a space.<br>
	<br>
	<textarea rows="10" cols="80" name="number" size="50"></textarea>

	<br><br>

	<input type="submit" value="Neat Feature" name="neat_feature" >

	<?php

	// Thumb Only button - Gives the la and twrap codes
	if(isset($_POST['neat_feature'])) 
	{ 
	    $number = $_POST['number'];
	    $output = exec("python neat_features.py $number");
	    echo $output;
	}

	?>


	</form>

</html>