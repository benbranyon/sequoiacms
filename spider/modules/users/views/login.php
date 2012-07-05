<div id="admin-login-wrapper">
	<?php echo '<form method="POST" enctype="multipart/form-data" action="/' . BASE_DIR . '/users/login" id = "login">';?>
		<h1  class="admin-login">Log In</h1>
		<fieldset id="inputs">
			<p>
				<label for="username">Username</label>
				<input id="username" name="username" type="text" class="admin1" placeholer="Username" autofocus required>
			</p>
			<br style="clear:both;"/>
			<p>
				<label for="password">Password</label>
				<input id="password" name="password" type="password" class="admin1" placeholer="Password" required>
			</p>
		</fieldset>
		<fieldset id="actions">
			<input type="submit" id="submit" value="Log in">
			<a href="">Forgot your password?</a>
		</fieldset>
	</form>
</div>