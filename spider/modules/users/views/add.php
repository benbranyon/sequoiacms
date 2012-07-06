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
		<?php echo '<form method="POST" enctype="multipart/form-data" action="/' . BASE_DIR . '/admin/users/add" >';?>
				<fieldset id="inputs">
					<p>
						<label for="username">User Name</label>
						<input id="username" name="username" type="text" class="admin2" placeholder="User Name" />
					</p>
					<p>
						<label for="first_name">First Name</label>
						<input id="first_name" name="first_name" type="text" class="admin2" placeholder="First Name" />
					</p>
					<p>
						<label for="last_name">Last Name</label>
						<input id="last_name" name="last_name" type="text" class="admin2" placeholder="Last Name" />
					</p>
					<p>
						<label for="email">E-mail</label>
						<input id="email" name="email" type="text" class="admin2" placeholder="E-mail" />
					</p>
					<br style="clear:both;"/>
					<p>
						<label for="password">Password</label>
						<input id="password" name="paddword" type="password" class="admin2" placeholder="Password"/>
					</p>
				</fieldset>
				<fieldset id="actions">
					<input type="submit" id="submit" value="Add User">
				</fieldset>
		</form>
	</section>
</div>