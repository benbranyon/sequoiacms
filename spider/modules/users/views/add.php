<div id="add-user">
	<div class="page-title">
		<h2>Add User</h2>
	</div>
	<nav id="shortcuts">
		<ul>
			<li><?php echo $html->link('Add User','/admin/users/add','Add User');?></li>
		</ul>
	</nav>
	<section class="title">Add User</section>
	<section class="form">
		<?php echo '<form method="POST" enctype="multipart/form-data" action="/' . BASE_DIR . '/users/add" >';?>
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
	</section>
</div>