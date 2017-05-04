<form action="signup.php" method="post" class="signup_form"> 
	<h3>Name</h3>
	<input type="text" name="first_name" placeholder="First">
	<input type="text" name="last_name" placeholder="Last">
	<h3>Contact Information</h3>
	<input type="text" name="phone" placeholder="Phone Number">
	<input type="text" name="email" placeholder="Email">
	<h3>Grade Level</h3>
	<select>
		<option value="9">9th Grade</option>
		<option value="10">10th Grade</option>
		<option value="11">11th Grade</option>
		<option value="12">12th Grade</option>
	</select>
	<h3>School</h3>
	<select>
		<option value="tracy">Tracy High School</option>
		<option value="west">West High School</option>
		<option value="kimball">Kimball High School</option>
		<option value="millenium">Millenium High School</option>
		<option value="mountain">Mountain House High School</option>
	</select>
	<input type="submit" value="Sign Up" class="button">
</form>