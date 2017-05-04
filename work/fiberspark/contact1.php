<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Fiberspark | Contact Us</title>
    <meta name="description" content="Fiberspark: A better kind of Internet.">
    <meta name="keywords" content="Fiberspark, fiberoptic cables, Ithaca, NY">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <link href="css/uikit.min.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/modernizr.custom.71422.js"></script>
    <script src="js/uikit.min.js"></script>
    <script src="js/sticky.min.js"></script>
    <script src="js/pushy.min.js"></script>
  </head>
  <body class="contact uk-height-1-1">
	<?php require ("inc/navbar.html");?>
	<div class="wrap uk-width-large-3-5 uk-width-medium-4-5 uk-width-4-5 uk-container-center">
		<?php
		if (isset($_POST['inputEmail']) && strlen($_POST['inputEmail'])>2)
		  {
		  if(isset($_POST['inputName']) && isset($_POST['inputEmail']) && isset($_POST['inputPhone']) && isset($_POST['inputCompany'])
			&& isset($_POST['inputProperties']) && isset($_POST['inputSource']) && isset($_POST['inputMessage'])){
			  $name = $_POST['inputName'] ;
			  $email = $_POST['inputEmail'] ;
			  $phone = $_POST['inputPhone'] ;
			  $company = $_POST['inputCompany'] ;
			  $properties = $_POST['inputProperties'] ;
			  $source = $_POST['inputSource'] ;
			  $message = $_POST['inputMessage'] ;
			  if (isset($_POST['toSelf']))  $self = $_POST['toSelf']; //value "true"
			  else $self= "false";
		  }
			  $emailBody = "Fiberspark Get Started Inquiry. <br>
				  Name: ".$name." <br>
				  Email: ".$email." <br>
				  Phone: ".$phone." <br>
				  Company: ".$company." <br>
				  Properties: ".$properties." <br>
				  How user heard of Fiberspark: ".$source." <br>
				  User message, inquiry: ".$message." <br>";
		  $headers = "From: webform@fiberspark.com \n";
			// check if send copy to self is checked
			if ($self == "true") {
			  $headers .= "CC: " . $email . " \n";
			}

			$headers .= "MIME-Version: 1.0\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1 \n";
		  mail("lilyc5459@gmail.com", "FiberSpark Get Started Inquiry", $emailBody, $headers);
		  
		  ?>
		  
		  <div class="container-fluid">
				<div class="col-md-8 col-md-offset-2" id="sentConfirm">
				<div class="alert alert-success">
					<p class="bio">Email sent!</p>
				</div>
				</div>

		  </div>
		  
		  <?php
		  }
		else
		  {
		  ?>
		  <div class="container-fluid">
				<div class="col-md-8 col-md-offset-2">
				<h2 class="title">Collegetown Residents</h2>
				<p class="txt">Your landlord won't agree to have Fiberspark Internet unless they know that  you want it. Call them now, or fill out the form at <a href="https://fiberspark.typeform.com/to/Wh6HOD">this link</a> to show your demand.
				</p>
				<h2 class="title">Landlords</h2>
				<p class="txt">If you are a Collegetown landlord who wants to learn more about Fiberspark, please fill in the form below and we will be in touch in the next few days:</p>
				<br>
			</div>

			</div>

			<form action="start.php" id="toMail" class="uk-form uk-form-horizontal" method="post" name="toMail">
        <div class="uk-form-row">
          <label class="uk-form-label" for="form-to">To</label>
          <div class="uk-form-controls">
            <input type="text" id="form-to" placeholder="inquiry@fiberspark.com" disabled>
          </div>
        </div>
        <div class="uk-form-row">
          <label class="uk-form-label" for="inputName">Name</label>
          <div class="uk-form-controls">
            <input type="text" id="inputName" name="inputName" placeholder="First and Last" required type="text">
          </div>
        </div>
        <div class="uk-form-row">
          <label class="uk-form-label" for="inputEmail">Email</label>
          <div class="uk-form-controls">
            <input type="text" id="inputEmail" name="inputEmail" placeholder="Email Address" required type="email">
          </div>
        </div>
        <div class="uk-form-row">
          <label class="uk-form-label" for="inputPhone">Phone</label>
          <div class="uk-form-controls">
            <input type="text" id="inputPhone" name="inputPhone" placeholder="(10 digit) Phone Number" required type="tel" pattern="\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})">
          </div>
        </div>
        <div class="uk-form-row">
          <label class="uk-form-label" for="inputCompany">Company</label>
          <div class="uk-form-controls">
            <input type="text" id="inputCompany" name="inputCompany" placeholder="Company Name" required type="text">
          </div>
        </div>
        <div class="uk-form-row">
          <label class="uk-form-label" for="inputProperties">Properties</label>
          <div class="uk-form-controls">
            <input type="text" id="inputProperties" name="inputProperties" placeholder="Number of properties in Collegetown" required type="number">
          </div>
        </div>
        <div class="uk-form-row">
        	<label class="uk-form-label" for="inputSource">How did you hear about us?</label>
          <div class="uk-form-controls">
            <select id="inputSource" name="inputSource" required>
              <option selected disabled="disabled">Please select</option>
              <option value="WordOfMouth">Word-of-Mouth</option>
							<option value="Advertisement">Advertisement</option>
							<option value="SocialMedia_Internet">Social Media/Internet</option>
							<option value="Other">Other</option>
            </select>
          </div>
        </div>
        <div class="uk-form-row">
          <div class="uk-form-controls">
            <textarea id="inputMessage" name="inputMessage" cols="50" rows="7" placeholder="Enter message"></textarea>
          </div>
        </div>
        <div class="uk-form-row">
          <div class="uk-form-controls uk-form-controls-text">
            <input type="checkbox" id="toSelf" name="toSelf"> <label for="toSelf">Send copy to self (cc)</label><br>
          </div>
        </div>
        <div class="uk-form-row">
          <div class="uk-form-controls uk-form-controls-text">
            <button class="uk-button" name="submit" type="submit" value="submit">Send</button>
          </div>
        </div>
	    </form>
		</div>
		  <?php	 
		  }
			?>
		</div>
	</div>
	
	<!-- footer -->
	<?php require ("inc/footer.html");?>
</body>
</html>
