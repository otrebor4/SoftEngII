
<div class='main_body'>
	<form id='register' method='post' accept-charset='UTF-8'>
		<fieldset class='form_layout'>
			<legend>Register</legend>
			<p>
				<label for='name' > Your Full Name*: </label>
				<input type='text' name='name' id='name' maxlength="255" />
			</p>
			<p>
				<label for='email' >Email Address*:</label>
				<input type='text' name='email' id='email' maxlength="255" />
			</p>
			<p>
				<label for='phone' >Phone*:</label>
				<input type='text' name='phone' id='phone' maxlength="12" />
			</p>
			<p>
				<label for='address' >Address*:</label>
				<input type='text' name='address' id='address' maxlength="255" />
			</p>
			<p>
				<label for='password' >Password*:</label>
				<input type='password' name='password' id='password' maxlength="50" />
			</p>
			<p>
				<label for='confirm_password' >Confirm Password*:</label>
				<input type='password' name='confirm_password' id='confirm_password' maxlength="50" />
			</p>
			<input  id="submit" type='submit' name='submit' value='Register' />
		 
		</fieldset>
		<?php echo $post_error_msg; ?>
	</form>
</div>