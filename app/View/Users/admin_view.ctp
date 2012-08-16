<div class="row-fluid">
	<div class="span2"></div><!-- Temporary hack, until the next version of TwitterBootstrap fixes fluid-offsets -->
	<div class="span8 grayLighter body-container">
<h2><?php  echo __('User'); ?></h2>
<span class="pull-right"><?php echo $this->Html->link('Edit User', array('controller' => 'users', 'action' => 'edit', 'admin' => true, $user['User']['id']), array('class' => 'btn')); ?></span>
	<table class-"table table-striped table-bordered">
		<tr>
			<td><?php echo __('Id'); ?></td>
			<td><?php echo h($user['User']['id']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Username'); ?></td>
			<td><?php echo h($user['User']['username']); ?></td>
			
		</tr>
		<tr>
			<td><?php echo __('Password'); ?></td>
			<td><?php echo $this->Html->link('Change Password', array('controller' => 'users', 'action' => 'change_password', 'admin' => true, $user['User']['id'])); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Role'); ?></td>
			<td><?php echo h($user['User']['role']); ?></td>
		</tr>
			<td><?php echo __('Created'); ?></td>
			<td><?php echo h($user['User']['created']); ?></td>
		</tr>
		<tr>
			<td><?php echo __('Modified'); ?></td>
			<td><?php echo h($user['User']['modified']); ?></td>
		</tr>
	</table>
</div>
</div>
