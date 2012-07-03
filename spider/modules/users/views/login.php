<div id="admin-login">
	<?php echo '<form method="POST" enctype="multipart/form-data" action="/' . BASE_DIR . '/users/login" id = "login">';?>
	<form method="post" action="/admin/login" id="login">
		<h1  class="admin-login">Log In</h1>
		<fieldset id="inputs">
			<input id="username" name="username" type="text" placeholer="Username" autofocus required>
			<input id="password" name="password" type="password" placeholer="Password" required>
		</fieldset>
		<fieldset id="actions">
			<input type="submit" id="submit" value="Log in">
			<a href="">Forgot your password?</a>
		</fieldset>
	</form>
</div>