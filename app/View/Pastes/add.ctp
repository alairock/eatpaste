<div class="body-block">
<?php echo $this->Form->create('Paste'); ?>
<?php
		echo $this->Form->input('title', array('placeholder' => 'Title', 'label' => false));
		echo $this->Form->input('paste_data', array('placeholder' => 'Paste your code here!', 'label' => false));
		echo 'Language: ' . $this->Form->select('type', $langs, array('default' => 'php'));
	?>
<?php echo $this->Form->end(__('Submit')); ?>
</div>