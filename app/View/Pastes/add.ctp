<div class="pastes form">
<?php echo $this->Form->create('Paste'); ?>
	<fieldset>
		<legend><?php echo __('Add Paste'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('paste_data');
		echo 'Language: ' . $this->Form->select('type', $langs);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pastes'), array('action' => 'index')); ?></li>
	</ul>
</div>
