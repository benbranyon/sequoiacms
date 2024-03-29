<div id="manage-users">
	<div class="page-title">
		<h2>Manage Users</h2>
	</div>
	<nav id="shortcuts">
		<ul>
			<li><?php echo $html->link('Add User','/admin/users/add','Add User');?></li>
		</ul>
	</nav>
	<section class="title"><h4>Users</h4></section>
	<table class="admin1">
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Group</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($users as $user):?>
			<tr>
				<td><?php echo $user['first_name'];?></td>
				<td><?php echo $user['last_name'];?></td>
				<td><?php echo $user['email'];?></td>
				<td><?php echo $user['group'];?></td>
				<td>
					<?php echo $html->link('Add User','/admin/users/edit','Edit');?>
				</td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>