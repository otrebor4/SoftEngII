<div class='main_body'>
	<form id='login'  method='POST' accept-charset='UTF-8'>
		<fieldset class='form_layout'>
			<legend>Log in</legend>
			<p> 
				<label>E-Mail:</label>
				<input id="username" name="username" type="text">
			</p>
			<p>
				<label>Password: </label>
				<input id="password" name="password" type="password">
			</p>
			
			<input id="submit" type="submit" name="submit" value="Login">
			<br>
			<a>Not a member</a>
			<a href="?action=register">Sign up now</a>
			<br>
		</fieldset>
		<?php echo $post_error_msg; ?>
	</form>

</div>