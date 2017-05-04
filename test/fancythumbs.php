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

	<input type="submit" value="Thumbs Only" name="thumbs_only" >
	<input type="submit" value="Even Column Code" name="even_cols" >
	<input type="submit" value="Uneven Column Code (Still testing)" name="uneven_cols" >

	<?php

	// Thumb Only button - Gives the la and twrap codes
	if(isset($_POST['thumbs_only'])) 
	{ 
	    $number = $_POST['number'];
	    $output = exec("python thumbcode_only.py $number");
	    echo $output;
	}

	// Even Column Code
	if(isset($_POST['even_cols'])) 
	{ 
	    $number = $_POST['number'];
	    $output = exec("python fancythumbs.py $number");
	    echo $output;
	    echo '<br><<i></i>/div><<i></i>/div><<i></i>div class="clear"><<i></i>/div></div>';
	}

	// Un-Even Column Code
	if(isset($_POST['uneven_cols'])) 
	{ 
	    $number = $_POST['number'];
	    $output = exec("python uneven_cols.py $number");
	    echo $output;
	}


	?>


	</form>

</html>