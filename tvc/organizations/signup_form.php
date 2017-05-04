<form action="signup.php" method="post" class="signup_form">
	<h3>Organization</h3>
	<input type="text" name="organization_name" placeholder="Organization Name">
	<input type="text" name="number" placeholder="EIN Number">
	<h3>Contact Name</h3>
	<input type="text" name="first_name" placeholder="First">
	<input type="text" name="last_name" placeholder="Last">
	<h3>Address</h3>
	<input type="text" name="address" placeholder="Street Address" class="long">
	<input type="text" name="city" placeholder="City">
	<input type="text" name="zip_code" placeholder="Zip Code">
	<h3>Contact Information</h3>
	<input type="text" name="phone" placeholder="Phone Number">
	<input type="text" name="email" placeholder="Email">
	<input type="text" name="website" placeholder="Website"><br>
	<h3>Description of Work</h3>
	<textarea style="height:100px; width:450px;" name="entry"></textarea>
	<input type="submit" name="submit" value="Sign Up" class="button">
</form>