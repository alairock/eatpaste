<div class="body-block">
	<h2><?php echo __('Pastes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<?php
	foreach ($pastes as $paste): ?>
	<tr>
		<td><?php echo $this->Html->link(h($paste['Paste']['title']), array('action' => 'view', $paste['Paste']['id'])); ?>&nbsp;</td>
		<td><?php echo h($paste['Paste']['type']); ?>&nbsp;</td>
		<td><?php echo date('M d, Y h:i:s a', strtotime(h($paste['Paste']['created']))); ?>&nbsp;</td>
		<?php if (isset($auth) and $auth): ?>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $paste['Paste']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', 'admin' => true, $paste['Paste']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', 'admin' => true, $paste['Paste']['id']), null, __('Are you sure you want to delete # %s?', $paste['Paste']['id'])); ?>
		</td>
		<?php endif; ?>
	</tr>
	<?php endforeach; ?>
	</table>


	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'nav-button'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'nav-button'));
	?>
	</div>
<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}')
	));
	?>
</div>
