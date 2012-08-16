<div class="row-fluid">
	<div class="span2"></div><!-- Temporary hack, until the next version of TwitterBootstrap fixes fluid-offsets -->
	<div class="span8 grayLighter body-container">
	<?php echo $this->Form->create('Paste'); ?>
	<?php
			echo '<span class="pull-right">Language: ' . $this->Form->select('type', $langs, array('default' => 'php')) . '</span>';
			echo $this->Form->input('title', array('placeholder' => 'Title', 'label' => false));
			echo $this->Form->input('paste_data', array('placeholder' => 'Paste your code here!', 'label' => false, 'class' => 'pastebody', 'rows' => '15'));
		?>
	<?php echo $this->Form->submit(__('Submit'), array('class' => 'pull-right btn btn-success')); ?>
	</div>
</div>
<div class="row-fluid">&nbsp;</div>
<div class="row-fluid">
	<div class="span2"></div><!-- Temporary hack, until the next version of TwitterBootstrap fixes fluid-offsets -->
	<div class="span8 grayLighter body-container">
		<h3>Widgets</h3>
	</div>
</div>